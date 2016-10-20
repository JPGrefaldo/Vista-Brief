<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StorePlanningRequest;

use Storage;

use App\Planning;
use App\Client;
use App\JobStatus;
use App\FormOfResponse;
use App\Attachment;

class PlanningController extends Controller
{
    public function index() 
    {
    	$plannings = Planning::isactive()->get();

    	return view ('planningrequests.index', compact('plannings'));
    }

    public function new() 
    {

    	$clients = Client::isactive()->get();
    	$jobstatus = JobStatus::all();
    	$formatofresponses = FormOfResponse::all();

    	return view ('planningrequests.newplanning', compact('clients', 'jobstatus', 'formatofresponses'));
    }

    public function postNewPlanning(StorePlanningRequest $request) 
    {
    	$user_id = $request->user()->id;
    	$client_id = $request->input('client');
    	$contact_name = $request->input('contact_name');
    	$contact_email = $request->input('contact_email');
    	$contact_landline = $request->input('contact_landline');
    	$contact_mobile = $request->input('contact_mobile');
    	$title = $request->input('title');
    	$jobstatus_id = $request->input('jobstatus');
    	$budget = $request->input('budget');
    	$formatofresponse_id = $request->input('formatofresponse');
    	$pitch_quote_date = $this->convertTo_MysqlDate($request->input('pitch_quote_date'));
    	$ideal_qa_date = $this->convertTo_MysqlDate($request->input('ideal_qa_date'));
    	$ideal_review_date = $this->convertTo_MysqlDate($request->input('ideal_review_date'));
    	$project_deadline_date = $this->convertTo_MysqlDate($request->input('project_deadline_date'));
    	$job_specifications = $request->input('job_spec');


    	// echo '<p>user_id: '.$user_id.'</p>';
    	// echo '<p>client_id: '.$client_id.'</p>';
    	// echo '<p>contact_name: '.$contact_name.'</p>';
    	// echo '<p>contact_email: '.$contact_email.'</p>';
    	// echo '<p>contact_landline: '.$contact_landline.'</p>';
    	// echo '<p>contact_mobile: '.$contact_mobile.'</p>';
    	// echo '<p>title: '.$title.'</p>';
    	// echo '<p>jobstatus_id: '.$jobstatus_id.'</p>';
    	// echo '<p>budget: '.$budget.'</p>';
    	// echo '<p>formatofresponse_id: '.$formatofresponse_id.'</p>';
    	// echo '<p>pitch_quote_date: '.$pitch_quote_date.'</p>';
    	// echo '<p>ideal_qa_date: '.$ideal_qa_date.'</p>';
    	// echo '<p>ideal_review_date: '.$ideal_review_date.'</p>';
    	// echo '<p>project_deadline_date: '.$project_deadline_date.'</p>';
    	// echo '<p>job_specifications: '.$job_specifications.'</p>';

    	$planning = new Planning();
    	$planning->user_id = $user_id;
    	$planning->client_id = $client_id;
    	$planning->contact_name = $contact_name;
    	$planning->contact_email = $contact_email;
    	$planning->contact_landline = $contact_landline;
    	$planning->contact_mobile = $contact_mobile;
    	$planning->title = $title;
    	$planning->jobstatus_id = $jobstatus_id;
    	$planning->budget = $budget;
    	$planning->formatofresponse_id = $formatofresponse_id;
    	if ( !empty($pitch_quote_date) )
    		$planning->pitch_quote_date = $pitch_quote_date;
    	if ( !empty($ideal_qa_date) )
    		$planning->ideal_qa_date = $ideal_qa_date;
    	if ( !empty($ideal_review_date) )
    		$planning->ideal_review_date = $ideal_review_date;
    	if ( !empty($project_deadline_date) )
    		$planning->project_deadline_date = $project_deadline_date;
    	$planning->job_specifications = $job_specifications;
    	$planning->save();

    	$arr_attachment_ids = array();

        $files = $request->file('attachments');
        if ( !empty($files) ) {
        	foreach ($files as $file):
        		$filename = $file->getClientOriginalName();

		        $attachments = new Attachment();
		        $attachments->user_id = $user_id;
		        $attachments->planning_id = $planning->id;
		        $attachments->filename = $filename;
		        $attachments->disk = 'local';
		        $attachments->directory = 'planning-'.$planning->id.'/user-'.$user_id.'/';
		        $attachments->save();

		        $arr_attachment_ids[] = $attachments->id;

        		Storage::disk('local')->put($attachments->directory.$filename, file_get_contents($file));
        	endforeach;
        }

        $planning->attachment_ids = implode($arr_attachment_ids,',');
        $planning->save();

    	return redirect()->route('planningrequests')->with('new_planning_success', 'Successfully created new planning request: '.$title.'.');
    }

    public function submitted($id) 
    {
    	$planning = Planning::find($id);
    	return view ('planningrequests.submittedplanning', compact('planning'));
    }

    private function convertTo_MysqlDate($str_input)
    {
    	if ( empty($str_input) ) :
    		return trim($str_input);
    	endif;

    	return date('Y-m-d', strtotime($str_input));
    }
}
