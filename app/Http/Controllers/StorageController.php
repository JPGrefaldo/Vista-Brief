<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Storage;

use Carbon\Carbon;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;

class StorageController extends Controller
{
  public function index($days) 
  {
  	// return view('storage.index');

  	// $exists = Storage::disk('temp_pdf')->files();

  	// foreach ($exists as $e) {
  	// 	echo '<p>'.gettype($e).'</p>';
  	// }

  	// exit('-'.Storage::disk('temp_pdf')->dirname().'-');
  	// exit(storage_path());

  	$timeInPast = Carbon::now()->subDays($days);

    $files = collect(Storage::disk('temp_pdf')->files())
    ->filter(function ($file) use ($timeInPast) {
    	// echo '<p>'.$file.'</p>';
    	// if (file_exists($file)) {
          return Carbon::createFromTimestamp(filemtime(storage_path().'/app/temp/'.$file))
             ->lt($timeInPast);
      // } else {
      // 	echo 'file not exists';
      // }
    })
    ->each(function ($file) {
        // Filesystem->delete($file);
        echo '<p>'.$file.'</p>';
    });

    dd($files);
  }
}
