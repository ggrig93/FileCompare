<?php

namespace App\Worker;

use Illuminate\Http\UploadedFile;

/**
 * Class BaseFileReader
 * @package App\Worker
 */
class BaseFileReader
{
    /**
     * @var UploadedFile
     */
    protected $file;

    /**
     * BaseFileReader constructor.
     * @param UploadedFile $file
     */
    public function __construct(UploadedFile $file)
    {
        $this->file = $file;
    }
}
