<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Collection;

use App\Http\Requests;
use App\Http\Requests\StoreBriefRequest;
use App\Http\Requests\UpdateBriefRequest;

use Storage;

use App\Brief;
use App\Client;
use App\ProjectStatus;
use App\Department;
use App\Attachment; // may not be needed

use Response;

// use App\Mail\SubmittedBriefMail;

class BriefAddEditController extends Controller
{
    //
    public function new() 
    {
        $clients = Client::isactive()->latest()->get();
        $projectstatus = ProjectStatus::all();
        $departments = Department::isactive()->get();

    	return view ('briefsheets.newbrief', compact('clients', 'projectstatus', 'departments'));
    }

    public function postNewBrief(StoreBriefRequest $request, \Illuminate\Mail\Mailer $mailer)
    {
        // if ($request->hasFile('attachments')) {
        //     echo '<p>there is a file</p>';
        // } else {
        //     echo '<p>there is no file</p>';
        // }        

        // if ($request->file('attachments')->isValid()) {
        //     echo '<p>the file is valid</p>';
        // } else {
        //     echo '<p>the file is NOT valid</p>';
        // }

        // echo '<p>count: '.count($request->file('attachments')).'</p>';
        // echo '<pre>';
        // print_r($request->file('attachments'));

        // return;

        // $path = $request->attachments->store('default', 'test.php', 'local');
        // $file = $request->file('attachments');
        // Storage::disk('local')->put('temp/'.$file->getClientOriginalName(), file_get_contents($file));


        $action					= $request->input('action');
        $is_draft				= ($action == 'Submit') ? 0 : 1;
        $user_id				= $request->user()->id;
        $client_id 				= $request->input('client');
        $projectstatus_id 		= $request->input('projectstatus');
        $jobnumber 				= $request->input('jobnumber');
        $old_jobnumber 			= $request->input('oldjobnumber');
        $budget 				= $request->input('budget');
        $projectmanager 		= $request->input('pmanager');
        $jobname 				= $request->input('jobname');
        $keydeliverables 		= $request->input('keydeliverables');
        $quoted_required_by_at 	= $this->convertTo_MysqlDate($request->input('quotereq'));
        $proposal_required_by_at 	= $this->convertTo_MysqlDate($request->input('proposedreq'));
        $firststage_required_by_at = $this->convertTo_MysqlDate($request->input('stagereq'));
        $project_delivered_by_at 	= $this->convertTo_MysqlDate($request->input('projdelivered'));
        $summary 				= $request->input('summary');
        $disciplines_required_ids 	= $this->convertTo_CommaSeparatedIds($request->input('department'));
        $objectives_or_measures = $request->input('objmeasure');
        $content 				= $request->input('context');
        $targetaudience_and_insight = $request->input('targetaudience_insight');
        $targetaudience_think 	= $request->input('targetaudience_think');
        $targetaudience_feel 	= $request->input('targetaudience_feel');
        $targetaudience_do 		= $request->input('targetaudience_do');
        $keymessages_or_propositions = $request->input('keymsg_propositions');
        $creative = $request->input('creative');
        $budget_timings_and_outputs = $request->input('budget_timings_outputs_req');

        $brief = new Brief();
        $brief->user_id = $user_id;
        $brief->client_id = $client_id;
        $brief->jobnumber = $jobnumber;
        $brief->old_jobnumber = $old_jobnumber;
        $brief->jobname = $jobname;
        $brief->projectstatus_id = $projectstatus_id;
        $brief->is_draft = $is_draft;
        $brief->projectmanager = $projectmanager;
        $brief->budget = $budget;
        $brief->keydeliverables = $keydeliverables;
        if ( !empty($quoted_required_by_at) )
        	$brief->quoted_required_by_at = $quoted_required_by_at;
        if ( !empty($proposal_required_by_at) )
        	$brief->proposal_required_by_at = $proposal_required_by_at;
        if ( !empty($firststage_required_by_at) )
        	$brief->firststage_required_by_at = $firststage_required_by_at;
        if ( !empty($project_delivered_by_at) )
        	$brief->project_delivered_by_at = $project_delivered_by_at;
        $brief->summary = $summary;
        $brief->disciplines_required_ids = $disciplines_required_ids;
        $brief->objectives_or_measures = $objectives_or_measures;
        $brief->content = $content;
        $brief->targetaudience_and_insight = $targetaudience_and_insight;
        $brief->targetaudience_think = $targetaudience_think;
        $brief->targetaudience_feel = $targetaudience_feel;
        $brief->targetaudience_do = $targetaudience_do;
        $brief->keymessages_or_propositions = $keymessages_or_propositions;
        $brief->creative = $creative;
        $brief->budget_timings_and_outputs = $budget_timings_and_outputs;
        //$brief->attachment_ids = $xxxx;

        $brief->save();

        $arr_attachment_ids = array();

        $files = $request->file('attachments');
        if ( !empty($files) ) {
        	foreach ($files as $file):
        		$filename = $file->getClientOriginalName();
                $filetype = $file->getClientMimeType();

		        $attachments = new Attachment();
		        $attachments->user_id = $user_id;
		        $attachments->brief_id = $brief->id;
		        $attachments->filename = $filename;
                $attachments->filetype = $filetype;
		        $attachments->disk = 'local';
		        $attachments->directory = 'brief-'.$brief->id.'/user-'.$user_id.'/';
		        $attachments->save();

		        $arr_attachment_ids[] = $attachments->id;

        		Storage::disk('local')->put($attachments->directory.$filename, file_get_contents($file));
        	endforeach;
        }

        $brief->attachment_ids = implode($arr_attachment_ids,',');
        $brief->save();

        // Send email to selected departments
        if ( $is_draft == 0 && !empty($request->input('department')) ) {
            $departments_to_be_email = Department::find($request->input('department'));

            foreach ($departments_to_be_email as $department) {
                $mailer
                    ->to($department->email)
                    ->send(new \App\Mail\SubmittedBriefMail($brief,$department->name));

            }
        }

        return redirect()->route('briefsheets')->with('new_brief_success', 'Successfully created new brief sheet: '.$jobname.'.');
    }

    public function formEditBrief($id) 
    {
    	$brief = Brief::find($id);
        $clients = Client::isactive()->latest()->get();
        $projectstatus = ProjectStatus::all();
        $departments = Department::isactive()->get();

    	return view ('briefsheets.draftedbrief', compact('brief','clients','projectstatus','departments'));
    }

    public function postEditBrief(UpdateBriefRequest $request) 
    {
    	$action					= $request->input('action');
        $is_draft				= ($action == 'Submit') ? 0 : 1;
        $user_id				= $request->user()->id;
        $client_id 				= $request->input('client');
        $projectstatus_id 		= $request->input('projectstatus');
        $jobnumber 				= $request->input('jobnumber');
        $old_jobnumber 			= $request->input('oldjobnumber');
        $budget 				= $request->input('budget');
        $projectmanager 		= $request->input('pmanager');
        $jobname 				= $request->input('jobname');
        $keydeliverables 		= $request->input('keydeliverables');
        $quoted_required_by_at 	= $this->convertTo_MysqlDate($request->input('quotereq'));
        $proposal_required_by_at 	= $this->convertTo_MysqlDate($request->input('proposedreq'));
        $firststage_required_by_at = $this->convertTo_MysqlDate($request->input('stagereq'));
        $project_delivered_by_at 	= $this->convertTo_MysqlDate($request->input('projdelivered'));
        $summary 				= $request->input('summary');
        $disciplines_required_ids 	= $this->convertTo_CommaSeparatedIds($request->input('department'));  
        $objectives_or_measures = $request->input('objmeasure');
        $content 				= $request->input('context');
        $targetaudience_and_insight = $request->input('targetaudience_insight');
        $targetaudience_think 	= $request->input('targetaudience_think');
        $targetaudience_feel 	= $request->input('targetaudience_feel');
        $targetaudience_do 		= $request->input('targetaudience_do');
        $keymessages_or_propositions = $request->input('keymsg_propositions');
        $creative = $request->input('creative');
        $budget_timings_and_outputs = $request->input('budget_timings_outputs_req');

        $brief = Brief::find($request->brief_id);
        $brief->user_id = $user_id;
        $brief->client_id = $client_id;
        $brief->jobnumber = $jobnumber;
        $brief->old_jobnumber = $old_jobnumber;
        $brief->jobname = $jobname;
        $brief->projectstatus_id = $projectstatus_id;
        $brief->is_draft = $is_draft;
        $brief->projectmanager = $projectmanager;
        $brief->budget = $budget;
        $brief->keydeliverables = $keydeliverables;
        if ( !empty($quoted_required_by_at) )
        	$brief->quoted_required_by_at = $quoted_required_by_at;
        if ( !empty($proposal_required_by_at) )
        	$brief->proposal_required_by_at = $proposal_required_by_at;
        if ( !empty($firststage_required_by_at) )
        	$brief->firststage_required_by_at = $firststage_required_by_at;
        if ( !empty($project_delivered_by_at) )
        	$brief->project_delivered_by_at = $project_delivered_by_at;
        $brief->summary = $summary;
        $brief->disciplines_required_ids = $disciplines_required_ids;
        $brief->objectives_or_measures = $objectives_or_measures;
        $brief->content = $content;
        $brief->targetaudience_and_insight = $targetaudience_and_insight;
        $brief->targetaudience_think = $targetaudience_think;
        $brief->targetaudience_feel = $targetaudience_feel;
        $brief->targetaudience_do = $targetaudience_do;
        $brief->keymessages_or_propositions = $keymessages_or_propositions;
        $brief->creative = $creative;
        $brief->budget_timings_and_outputs = $budget_timings_and_outputs;
        //$brief->attachment_ids = $xxxx;

        $brief->save();

        $arr_attachment_ids = array();

        $files = $request->file('attachments');
        if ( !empty($files) ) {
        	foreach ($files as $file):
        		$filename = $file->getClientOriginalName();

		        $attachments = new Attachment();
		        $attachments->user_id = $user_id;
		        $attachments->brief_id = $brief->id;
		        $attachments->filename = $filename;
		        $attachments->disk = 'local';
		        $attachments->directory = 'brief-'.$brief->id.'/user-'.$user_id.'/';
		        $attachments->save();

		        $arr_attachment_ids[] = $attachments->id;

        		Storage::disk('local')->put($attachments->directory.$filename, file_get_contents($file));
        	endforeach;
        }

        $new_arr_attachment_ids = $this->mergeTwo_array($arr_attachment_ids, explode(',', $brief->attachment_ids));
        $brief->attachment_ids = implode($new_arr_attachment_ids,',');
        $brief->save();

        return redirect()->route('briefsheets')->with('update_brief_success', 'Successfully updated brief sheet: '.$jobname.'.');
    }

    public function postNewClient(Request $request) 
    {
    	$messages = [
            'name.required'     =>  'Client name must not be empty.',
            'name.unique'		=> 	'Client name is already taken.'
        ];

        $validator = Validator::make($request->all(),[
            'name'      =>  'bail|required|unique:clients,name',
        ], $messages);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errors = json_decode($errors);

            return response()->json([
                'success'   => false,
                'message'   => $errors
            ], 422);
        }
        
        $client = new Client();
        $client->name = $request->input('name');
        $client->save();

        return 'success';
    }

    public function getClients()
    {
    	return response()->json(Client::isactive()->get());
    }

    private function convertTo_MysqlDate($str_input)
    {
    	if ( empty($str_input) ) :
    		return trim($str_input);
    	endif;

    	return date('Y-m-d', strtotime($str_input));
    }

    private function convertFrom_Mysqldate($str_input) 
    {
    	if ( empty($str_input) ) :
    		return trim($str_input);
    	endif;

    	return date('m/d/Y', strtotime($str_input));
    }

    private function convertTo_CommaSeparatedIds($id_input) 
    {
    	if ( !is_array($id_input) ) :
    		return trim($id_input);
    	endif;

    	return implode($id_input, ',');
    }

    private function mergeTwo_array($arr1, $arr2) {
    	return array_merge($arr1, $arr2);
    }
}



		// echo '<p>is_draft: '.$is_draft.'</p>';
  //       echo '<p>user_id: '.$user_id.'</p>';
  //       echo '<p>client_id: '.$client_id.'</p>';
  //       echo '<p>project_status_id: '.$projectstatus_id.'</p>';
  //       echo '<p>job_number: '.$jobnumber.'</p>';
  //       echo '<p>old_job_number: '.$old_jobnumber.'</p>';
  //       echo '<p>budget: '.$budget.'</p>';
  //       echo '<p>project_manager: '.$projectmanager.'</p>';
  //       echo '<p>job_name: '.$jobname.'</p>';
  //       echo '<p>key_deliverables: '.$keydeliverables.'</p>';
  //       echo '<p>quote_required_by: '.$quoted_required_by_at.'</p>';
  //       echo '<p>proposed_required_by: '.$proposal_required_by_at.'</p>';
  //       echo '<p>first_stage_required_by: '.$firststage_required_by_at.'</p>';
  //       echo '<p>projects_delivered_by: '.$project_delivered_by_at.'</p>';
  //       echo '<p>summary: '.$summary.'</p>';
  //       echo '<p>department_ids: '.$disciplines_required_ids.'</p>';
  //       echo '<p>objectives_measures: '.$objectives_or_measures.'</p>';
  //       echo '<p>context: '.$content.'</p>';
  //       echo '<p>target_audience_insight: '.$targetaudience_and_insight.'</p>';
  //       echo '<p>target_audience_think: '.$targetaudience_think.'</p>';
  //       echo '<p>target_audience_feel: '.$targetaudience_feel.'</p>';
  //       echo '<p>target_audience_do: '.$targetaudience_do.'</p>';
  //       echo '<p>key_mesgs_propositions: '.$keymessages_or_propositions.'</p>';
  //       echo '<p>creative: '.$creative.'</p>';
  //       echo '<p>budget_timings_outputs_required: '.$budget_timings_and_outputs.'</p>';