<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Planning;
use App\Department;
use PDF;

class SubmittedPlanningMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $subject = 'New Planning Request - Vista Brief';
    protected $planning_id;
    protected $pdf_file_name;
    protected $updated_at;
    protected $title;
    protected $clientname;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Planning $planning)
    {
        $this->planning_id= $planning->id;
        $this->updated_at = $planning->updated_at->format('d/m/Y h:i');
        $this->title      = $planning->title;

        $this->clientname = (count($planning->client)) ? $planning->client->name : "";
        $formofresponse = (count($planning->formofresponse)) ? $planning->formofresponse->name : "";

        $this->subject    = 'New Planning Request: '.$this->clientname.' - '.$planning->title.' - '.$formofresponse;

        $this->pdf_file_name = 'New Planning Request - '.$this->clientname.' - '.$planning->title.' - '.$formofresponse.'.pdf';
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
                    ->attach($this->attachment(), ['as'=>$this->pdf_file_name])
                    ->with([
                        'updated_at' => $this->updated_at,
                        'title'      => $this->title,
                        'client'     => $this->clientname,
                    ]);
    }

    public function attachment() 
    {
        $planning = Planning::find($this->planning_id);
        $departments = Department::isactive()->get();

        foreach($planning->attachments as $attachment) {
            $classNames = app('App\Http\Controllers\FileTypeIconController')->getIconClassNames($attachment->file_ext);
            $attachment->classNames = $classNames;
        }

        $pdf = PDF::loadView('pdf.submittedplanningpdf', compact('planning', 'departments'))->setPaper('a4');
        $save_directory = storage_path().'/app/temp/';
        $random_filename = str_random(10).'.pdf';
        $pdf->save($save_directory.$random_filename);

        return $save_directory.$random_filename;
    }
}
