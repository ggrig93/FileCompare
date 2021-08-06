<?php


namespace App\Worker;


use App\Worker\Interfaces\FileReader;
use Illuminate\Http\UploadedFile;

class BaseFileReader
{


    public function __construct(UploadedFile $file)
    {
        $this->file = $file;
    }
}
