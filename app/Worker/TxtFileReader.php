<?php

namespace App\Worker;

use App\Worker\Interfaces\FileReader;

/**
 * Class TxtFileReader
 * @package App\Worker
 */
class TxtFileReader extends BaseFileReader implements FileReader
{
    /**
     * @return array
     */
    public function get(): array
    {
        $content = trim(file_get_contents($this->file));

        return  array_map('trim',explode("\r\n", $content));
    }
}
