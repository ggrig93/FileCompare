<?php

namespace App\Http\Controllers;

use App\Services\FileCompilerService;
use Illuminate\Http\Request;

class FileController extends Controller
{
    //

    public function compare(Request $request)
    {

        $result = (new FileCompilerService($request->compareFiles))->run();

        return view('welcome', compact('result'));
    }
}
