<?php

namespace App\Services;

use App\Services\Abstraction\BaseFileCompiler;

/**
 * Class FileCompilerService
 * @package App\Services
 */
class FileCompilerService extends BaseFileCompiler
{
    /**
     * @return array
     */
    public function run(): array
    {
        $contents = $this->getContents();

        return $this->getDiffArray($contents) ;
    }

    /**
     * @param $contents
     * @return array
     */
    protected function getDiffArray($contents): array
    {
        $combined = [];
        $first  = $contents[0];
        $sec = $contents[1];
        $secCopy  = $sec;

        foreach ($first as $row => $val) {
            $pos = array_search($val, $sec);
            if ($pos !== false) {
                $combined[] = [
                    'type' => static::TYPE_EXIST,
                    'value' => $val
                ];
                unset($secCopy[$pos]);

            } else {
                $combined[] = [
                    'type' => static::TYPE_NOT_EXIST_FILE_2,
                    'value' => "$val | $sec[$row]"
                ];
            }
        }

        foreach ( $secCopy as $val) {
            $combined[] = [
                'type' => static::TYPE_NOT_EXIST_FILE_1,
                'value' => $val
            ];
        }

        return $combined;
    }
}
