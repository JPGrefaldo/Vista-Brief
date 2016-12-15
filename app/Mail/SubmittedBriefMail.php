<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Brief;
use App\Department;
use PDF;

class SubmittedBriefMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $subject = 'New Brief Sheet - Vista Brief';
    protected $brief_id;
    protected $updated_at;
    protected $jobnumber;
    protected $jobname;
    protected $keydeliverables;
    protected $projectmanager;
    protected $department_name;
    protected $brief_summary;
    protected $pdf_file_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(\App\Brief $brief, $department_name)
    {
        $this->brief_id         = $brief->id;
        $this->updated_at       = $brief->updated_at->format('d/m/Y H:i');
        $this->jobnumber        = $brief->jobnumber;
        $this->jobname          = $brief->jobname;
        $this->keydeliverables  = $brief->keydeliverables;
        $this->projectmanager   = $brief->projectmanager;
        $this->department_name  = $department_name;
        $this->brief_summary    = $brief->summary;

        $clientname = (count($brief->client)) ? $brief->client->name : "";

        $this->subject          = 'New Brief Sheet: '.$brief->jobnumber.' - '.$clientname.' - '.$brief->jobname.' - '.$brief->keydeliverables;

        $this->pdf_file_name    = 'New Brief Sheet: '.$brief->jobnumber.' - '.$clientname.' - '.$brief->jobname.' - '.$brief->keydeliverables.'.pdf';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.submittedbriefemail')
                    ->subject($this->subject)
                    ->attach($this->attachment(), ['as'=>$this->pdf_file_name])
                    ->with([
                        'updated_at'        => $this->updated_at,
                        'jobnumber'         => $this->jobnumber,
                        'jobname'           => $this->jobname,
                        'keydeliverables'   => $this->keydeliverables,
                        'projectmanager'    => $this->projectmanager,
                        'department_name'   => $this->department_name,
                        'brief_summary'     => $this->brief_summary,
                    ]);
    }

    public function attachment() 
    {
        $brief = Brief::find($this->brief_id);
        $departments = Department::isactive()->get();

        foreach($brief->attachmentsNotAmend as $attachment) {
            $classNames = app('App\Http\Controllers\FileTypeIconController')->getIconClassNames($attachment->file_ext);
            $attachment->classNames = $classNames;
        }

        $pdf = PDF::loadView('pdf.submittedbriefpdf-1', compact('brief', 'departments'))->setPaper('a4');
        $save_directory = storage_path().'/app/temp/';
        $random_filename = str_random(10).'.pdf';
        $pdf->save($save_directory.$random_filename);

        return $save_directory.$random_filename;
    }
}
