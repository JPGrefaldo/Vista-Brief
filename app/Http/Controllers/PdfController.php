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
    	// return view('pdf.submittedbriefpdf-1', compact('brief', 'departments'));
    	$pdf1 = PDF::loadView('pdf.submittedbriefpdf-1', compact('brief', 'departments'))->setPaper('a4');
    	return $pdf1->stream('Brief Sheet.pdf');
    }

    public function get_pdfAmendedBriefAttachment($id) 
    {
        $brief = Brief::find($id);
        $departments = Department::all();
        // return view('pdf.amendedbriefpdf-1', compact('brief', 'departments'));
        $pdf = PDF::loadView('pdf.amendedbriefpdf-1', compact('brief', 'departments'))->setPaper('a4');
        // $pdf->save(storage_path().'/app/temp/'.str_random(10).'.pdf');
        return $pdf->stream('Brief Sheet.pdf');
    }

    public function get_pdfSubmittedPlanningAttachment($id) 
    {
        $planning = Planning::find($id);
        $departments = Department::all();
        // return view('pdf.submittedplanningpdf', compact('planning', 'departments'));
        $pdf = PDF::loadView('pdf.submittedplanningpdf', compact('planning', 'departments'))->setPaper('a4');
        // $pdf->save(storage_path().'/app/temp/'.str_random(10).'.pdf');
        return $pdf->stream('Planning Request.pdf');
    }
}
