<?php


namespace App\Worker;

use App\Worker\Interfaces\FileReader;

class TxtFileReader extends BaseFileReader implements FileReader
{

    public function get(): array
    {
        $content = trim(file_get_contents($this->file));

        return  array_map('trim',explode("\r\n", file_get_contents($this->file)));
    }
}
