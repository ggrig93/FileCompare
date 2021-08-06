<?php


namespace App\Factories;

use Illuminate\Http\UploadedFile;

class FileReader
{
    /**
     * @var UploadedFile
     */
    protected $file;

    /**
     * FileReader constructor.
     * @param UploadedFile $file
     */
    public function __construct(UploadedFile $file)
    {
        $this->file = $file;
    }

    /**
     * @return array
     */
    public function run(): array
    {
       $ext = $this->file->clientExtension();
       $worker = "App\Worker\\".ucfirst($ext)."FileReader";

        return (new $worker($this->file))->get();
    }

}
