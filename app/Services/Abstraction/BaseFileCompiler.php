<?php


namespace App\Services\Abstraction;


use App\Factories\FileReader;

abstract  class BaseFileCompiler
{
    protected $files;

    const TYPE_NOT_EXIST_FILE_2 = '-';
    const TYPE_NOT_EXIST_FILE_1 = '+';
    const TYPE_EXIST = '';

    /**
     * BaseFileCompiler constructor.
     * @param $files
     */
    public function __construct($files)
    {
        $this->files = $files;
    }

    public abstract function run();


    public function getContents()
    {
        $data = [];

        foreach ($this->files as $file) {
            $data[] = $this->getContent($file);
        }

        return  $data;
    }
    /**
     *
     */
    public function getContent($file)
    {
        return (new FileReader($file))->run();
    }
}
