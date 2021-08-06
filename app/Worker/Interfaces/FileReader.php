<?php

namespace App\Worker\Interfaces;

/**
 * Interface FileReader
 * @package App\Worker\Interfaces
 */
interface FileReader
{
    /**
     * @return array
     */
    public function get(): array;
}
