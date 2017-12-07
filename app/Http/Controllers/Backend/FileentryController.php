<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Fileentry;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class FileentryController extends Controller
{
    public function index()
	{
		$entries = Fileentry::all();

		return view('fileentries.index', compact('entries'));
	}

        public function get($filename){

		$entry = Fileentry::where('filename', '=', $filename)->firstOrFail();
		$file = Storage::disk('local')->get($entry->filename);

		return (new Response($file, 200))
              ->header('Content-Type', $entry->mime);
	}
   }
