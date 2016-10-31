<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Planning;
use App\Department;
use PDF;

class SubmittedPlanningMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $subject = 'Planning Request - Vista Brief';
    protected $planning_id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Planning $planning)
    {
        $this->planning_id= $planning->id;
        $this->updated_at = $planning->updated_at->format('M d, Y h:m');
        $this->title      = $planning->title;
        $this->client     = $planning->client->name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.submittedplanningemail')
                    ->subject($this->subject)
                    ->attach($this->attachment(), ['as'=>'Planning Request.pdf'])
                    ->with([
                        'updated_at' => $this->updated_at,
                        'title'      => $this->title,
                        'client'     => $this->client,
                    ]);
    }

    public function attachment() 
    {
        $planning = Planning::find($this->planning_id);
        $departments = Department::isactive()->get();

        $pdf = PDF::loadView('pdf.submittedplanningpdf', compact('planning', 'departments'))->setPaper('a4');
        $save_directory = storage_path().'/app/temp/';
        $random_filename = str_random(10).'.pdf';
        $pdf->save($save_directory.$random_filename);

        return $save_directory.$random_filename;
    }
}
