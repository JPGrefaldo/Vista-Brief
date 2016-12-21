<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use PDF;
use Storage;

use App\Brief;
use App\Planning;
use App\Department;

class PdfController extends Controller
{
    public function get_pdfSubmittedBriefAttachment($id) 
    {
    	// return view('pdf.briefsubmittedpdf-3');
    	// $pdf3 = PDF::loadView('pdf.submittedbriefpdf-3')->setPaper('a4');
    	// return $pdf3->stream('BriefSheet.pdf');
    	// return;

    	$brief = Brief::find($id);
        $departments = Department::all();

        foreach($brief->attachmentsNotAmend as $attachment) {
            $classNames = app('App\Http\Controllers\FileTypeIconController')->getIconClassNames($attachment->file_ext);
            $attachment->classNames = $classNames;
        }

    	return view('pdf.submittedbriefpdf-1', compact('brief', 'departments'));
    	$pdf1 = PDF::loadView('pdf.submittedbriefpdf-1', compact('brief', 'departments'))
            ->setPaper('a4')
            ->setOption('encoding', 'utf-8');
    	return $pdf1->stream('Brief Sheet.pdf');
    }

    public function get_pdfAmendedBriefAttachment($id) 
    {
        $brief = Brief::find($id);

        // insert the classNames string to the amends-attachment collection data
        // <i class="{{ $attachment->classNames }} text-md"></i>
        foreach($brief->amendments as $key => $amendment) {
            foreach ($amendment->attachments as $attachment) {
                $classNames = app('App\Http\Controllers\FileTypeIconController')->getIconClassNames($attachment->file_ext);
                $attachment->classNames = $classNames;
            }
        }

        foreach($brief->attachmentsNotAmend as $attachment) {
            $classNames = app('App\Http\Controllers\FileTypeIconController')->getIconClassNames($attachment->file_ext);
            $attachment->classNames = $classNames;
        }

        $departments = Department::all();
        // return view('pdf.amendedbriefpdf-1', compact('brief', 'departments'));
        $pdf = PDF::loadView('pdf.amendedbriefpdf-1', compact('brief', 'departments'))->setPaper('a4');
        // $pdf->save(storage_path().'/app/temp/'.str_random(10).'.pdf');
        return $pdf->stream('Brief Sheet.pdf');
    }

    public function get_pdfSubmittedPlanningAttachment($id) 
    {
        $planning = Planning::find($id);
        $departments = Department::isactive()->get();

        foreach($planning->attachments as $attachment) {
            $classNames = app('App\Http\Controllers\FileTypeIconController')->getIconClassNames($attachment->file_ext);
            $attachment->classNames = $classNames;
        }

        // return view('pdf.submittedplanningpdf', compact('planning', 'departments'));
        $pdf = PDF::loadView('pdf.submittedplanningpdf', compact('planning', 'departments'))->setPaper('a4');
        // $pdf->save(storage_path().'/app/temp/'.str_random(10).'.pdf');
        return $pdf->stream('Planning Request.pdf');
    }
}
