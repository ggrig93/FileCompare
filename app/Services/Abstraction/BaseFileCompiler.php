<?php

namespace App\Services\Abstraction;

use App\Factories\FileReader;

/**
 * Class BaseFileCompiler
 * @package App\Services\Abstraction
 */
abstract  class BaseFileCompiler
{
    /**
     * @var
     */
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

    /**
     * @return array
     */
    public abstract function run(): array;

    /**
     * @return array
     */
    public function getContents()
    {
        $data = [];
        foreach ($this->files as $file) {
            $data[] = $this->getContent($file);
        }

        return  $data;
    }

    /**
     * @param $file
     * @return array
     */
    public function getContent($file): array
    {
        return (new FileReader($file))->run();
    }
}
