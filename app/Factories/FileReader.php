<?php


namespace App\Factories;




use Illuminate\Http\UploadedFile;

class FileReader
{

    public function __construct(UploadedFile $file)
    {
        $this->file = $file;
    }

    public function run()
    {

       $ext = $this->file->clientExtension();
       $worker = "App\Worker\\".ucfirst($ext)."FileReader";

        return (new $worker($this->file))->get();
    }

}
