<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreBriefAmendRequest;

use Storage;

use App\Brief;
// use App\Client;
// use App\ProjectStatus;
use App\Department;
use App\Amendment;
use App\Attachment;

class BriefController extends Controller
{
    public function index() 
    {
        $briefs = Brief::isactive()->get();

    	return view ('briefsheets.index', compact('briefs'));
    }

    public function submitted($id) 
    {
        $brief = Brief::find($id); // add isactive validation in the future
        $departments = Department::isactive()->get();

    	return view ('briefsheets.submittedbrief', compact('brief', 'departments'));
    }

    public function postNewAmend(StoreBriefAmendRequest $request) 
    {
        $user_id = $request->user()->id;
        $brief_id = $request->input('brief_id');
        $is_internal = ($request->input('internal')) ? 1 : 0;
        $content = trim($request->input('content'));
        $department_ids = $this->convertTo_CommaSeparatedIds($request->input('department'));

        // echo '<p>user_id: '.$user_id.'</p>';
        // echo '<p>brief_id: '.$brief_id.'</p>';
        // echo '<p>is_internal: '.$is_internal.'</p>';
        // echo '<p>content: '.$content.'</p>';
        // echo '<p>department_ids: '.$department_ids.'</p>';
        // echo '<p>attachment_ids: '.$attachment_ids.'</p>';

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

                $attachments = new Attachment();
                $attachments->user_id = $user_id;
                $attachments->brief_id = $brief_id;
                $attachments->amendment_id = $amend->id;
                $attachments->filename = $filename;
                $attachments->disk = 'local';
                $attachments->directory = 'brief-'.$brief_id.'/'.$user_id.'/';
                $attachments->save();

                $arr_attachment_ids[] = $attachments->id;

                Storage::disk('local')->put($attachments->directory.$filename, file_get_contents($file));
            endforeach;
        }

        $amend->attachment_ids = implode($arr_attachment_ids,',');
        $amend->save();

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
