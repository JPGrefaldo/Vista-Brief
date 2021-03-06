<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreBriefAmendRequest;

use Storage;
use PDF;

use App\Brief;
use App\Department;
use App\Amendment;
use App\Attachment;


class BriefController extends Controller
{
  public function index() 
  {
    $briefs = Brief::isactive()->latest()->paginate(20);
    $clients = \App\Client::isactive()->orderby('name','ASC')->get();
    $projectstatus = \App\ProjectStatus::all();
    $departments = Department::all();

  	return view ('briefsheets.index', compact('briefs', 'clients', 'projectstatus', 'departments'));
  }

  public function submitted($id) 
  {
    $brief = Brief::find($id); // add isactive validation in the future
    if ($brief) { // if brief is draft redirect to draft page
      if ($brief->is_draft == 1) {
        return redirect()->route('formeditbrief', $id);
      }
    }
    $departments = Department::isactive()->get();

    // insert the classNames string to the attachment collection data
    foreach ($brief->attachmentsNotAmend as $attachment) {
      $classNames = app('App\Http\Controllers\FileTypeIconController')->getIconClassNames($attachment->file_ext);
      $attachment->classNames = $classNames;
    }

    // insert the classNames string to the amends-attachment collection data
    foreach($brief->amendments as $amendment) {
      foreach ($amendment->attachments as $attachment) {
        $classNames = app('App\Http\Controllers\FileTypeIconController')->getIconClassNames($attachment->file_ext);
        $attachment->classNames = $classNames;
      }
    }

  	return view ('briefsheets.submittedbrief', compact('brief', 'departments'));
  }

  public function postNewAmend(StoreBriefAmendRequest $request, \Illuminate\Mail\Mailer $mailer) 
  {
    $user_id = $request->user()->id;
    $brief_id = $request->input('brief_id');
    $is_internal = ($request->input('internal')) ? 1 : 0;
    $content = trim($request->input('content'));
    $department_ids = $this->convertTo_CommaSeparatedIds($request->input('department'));

    $amend = new Amendment();
    $amend->user_id = $user_id;
    $amend->brief_id = $brief_id;
    $amend->is_internal = $is_internal;
    $amend->content = $content;
    $amend->department_ids = $department_ids;
    $amend->save();

    $arr_attachment_ids = array();
    $files = $request->file('attachments');
    if ( !empty($files) ) {
      foreach ($files as $file):
        $filename = $file->getClientOriginalName();
        $filetype = $file->getClientMimeType();
        // $file_ext = $file->getClientOriginalExtension();
        $file_ext = $file->extension();

        $attachments = new Attachment();
        $attachments->user_id = $user_id;
        $attachments->brief_id = $brief_id;
        $attachments->amendment_id = $amend->id;
        $attachments->filename = $filename;
        $attachments->filetype = $filetype;
        $attachments->file_ext = $file_ext;
        $attachments->disk = 'local';
        $attachments->directory = 'brief-'.$brief_id.'/user-'.$user_id.'/';
        $attachments->save();

        $arr_attachment_ids[] = $attachments->id;

        Storage::disk('local')->put($attachments->directory.$filename, file_get_contents($file));
      endforeach;
    }

    $amend->attachment_ids = implode($arr_attachment_ids,',');
    $amend->save();

    // Send email to selected departments
    $brief = Brief::find($brief_id);

    if ( !empty($request->input('department')) ) {
      $departments_to_be_email = Department::find($request->input('department'));
      $email_recipient = array();

      foreach ($departments_to_be_email as $department) {
        foreach (explode(',',$department->email) as $email) {
          if (!empty($email)) {
            // $mailer
            //   ->to($email)
            //   ->send(new \App\Mail\AmendedBriefMail($brief,$department->name));
            array_push($email_recipient, $email);
          }
          $department_to_be_email_to_user[] = $department->name;
        }
      }

      if (isset($department_to_be_email_to_user) && 
          is_array($department_to_be_email_to_user)) {
        $department_to_be_email_to_user = implode(', ', $department_to_be_email_to_user);
      } else {
        $department_to_be_email_to_user = "";
      }

      if(!empty($request->user()->email)) {
        array_push($email_recipient, $request->user()->email);
      }
      
      $mailer
        ->to($email_recipient)
        ->send(new \App\Mail\AmendedBriefMail($brief,$department_to_be_email_to_user));
    }

    return redirect()->route('submittedbriefsheet', [$brief_id])->with('new_amend_success', 'New Amend created.');
  }

  private function convertTo_CommaSeparatedIds($id_input) 
  {
    if ( !is_array($id_input) ) :
      return trim($id_input);
    endif;

    return implode($id_input, ',');
  }
}
