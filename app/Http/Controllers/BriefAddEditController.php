<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

use App\Http\Requests;
use App\Http\Requests\StoreBriefRequest;

use Storage;

use App\Client;
use App\ProjectStatus;
use App\Department;

use Response;

class BriefAddEditController extends Controller
{
    //
    public function new() 
    {
        $clients = Client::isactive()->get();
        $projectstatus = ProjectStatus::all();
        $departments = Department::isactive()->get();

    	return view ('briefsheets.newbrief', compact('clients', 'projectstatus', 'departments'));
    }

    public function postNewBrief(StoreBriefRequest $request) 
    {
        if ($request->hasFile('attachments')) {
            echo '<p>there is a file</p>';
        } else {
            echo '<p>there is no file</p>';
        }
        

        // if ($request->file('attachments')->isValid()) {
        //     echo '<p>the file is valid</p>';
        // } else {
        //     echo '<p>the file is NOT valid</p>';
        // }

        // $path = $request->attachments->store('default', 'test.php', 'local');
        // $file = $request->file('attachments');
        // Storage::disk('local')->put('temp/'.$file->getClientOriginalName(), file_get_contents($file));


        $client_id 				= $request->input('client');
        $project_status_id 		= $request->input('projectstatus');
        $job_number 			= $request->input('jobnumber');
        $old_job_number 		= $request->input('oldjobnumber');
        $budget 				= $request->input('budget');
        $project_manager 		= $request->input('pmanager');
        $job_name 				= $request->input('jobname');
        $key_deliverables 		= $request->input('keydeliverables');
        $quote_required_by 		= $this->convertTo_MysqlDate($request->input('quotereq'));
        $proposed_required_by 	= $this->convertTo_MysqlDate($request->input('proposedreq'));
        $first_stage_required_by = $this->convertTo_MysqlDate($request->input('stagereq'));
        $projects_delivered_by 	= $this->convertTo_MysqlDate($request->input('projdelivered'));
        $summary 				= $request->input('summary');
        $department_ids 		= $this->convertTo_CommaSeparatedIds($request->input('department'));  
        $objectives_measures 	= $request->input('objmeasure');
        $context 				= $request->input('context');
        $target_audience_insight = $request->input('targetaudience_insight');
        $target_audience_think 	= $request->input('targetaudience_think');
        $target_audience_feel 	= $request->input('targetaudience_feel');
        $target_audience_do 	= $request->input('targetaudience_do');
        $key_mesgs_propositions = $request->input('keymsg_propositions');
        $creative = $request->input('creative');
        $budget_timings_outputs_required = $request->input('budget_timings_outputs_req');

        echo '<p>client_id: '.$client_id.'</p>';
        echo '<p>project_status_id: '.$project_status_id.'</p>';
        echo '<p>job_number: '.$job_number.'</p>';
        echo '<p>old_job_number: '.$old_job_number.'</p>';
        echo '<p>budget: '.$budget.'</p>';
        echo '<p>project_manager: '.$project_manager.'</p>';
        echo '<p>job_name: '.$job_name.'</p>';
        echo '<p>key_deliverables: '.$key_deliverables.'</p>';
        echo '<p>quote_required_by: '.$quote_required_by.'</p>';
        echo '<p>proposed_required_by: '.$proposed_required_by.'</p>';
        echo '<p>first_stage_required_by: '.$first_stage_required_by.'</p>';
        echo '<p>projects_delivered_by: '.$projects_delivered_by.'</p>';
        echo '<p>summary: '.$summary.'</p>';
        echo '<p>department_ids: '.$department_ids.'</p>';
        echo '<p>objectives_measures: '.$objectives_measures.'</p>';
        echo '<p>context: '.$context.'</p>';
        echo '<p>target_audience_insight: '.$target_audience_insight.'</p>';
        echo '<p>target_audience_think: '.$target_audience_think.'</p>';
        echo '<p>target_audience_feel: '.$target_audience_feel.'</p>';
        echo '<p>target_audience_do: '.$target_audience_do.'</p>';
        echo '<p>key_mesgs_propositions: '.$key_mesgs_propositions.'</p>';
        echo '<p>creative: '.$creative.'</p>';
        echo '<p>budget_timings_outputs_required: '.$budget_timings_outputs_required.'</p>';

        // return \Response::json(array('success'=>true));
    }

    private function convertTo_MysqlDate($str_input)
    {
    	if ( empty($str_input) ) :
    		return $str_input;
    	endif;

    	return date('Y-m-d', strtotime($str_input));
    }

    private function convertTo_CommaSeparatedIds($id_input) 
    {
    	if ( !is_array($id_input) ) :
    		return $id_input;
    	endif;

    	return implode($id_input, ',');
    }
}
