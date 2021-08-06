<?php


namespace App\Services;


use App\Factories\FileReader;
use App\Services\Abstraction\BaseFileCompiler;

class FileCompilerService extends BaseFileCompiler
{


    public function run()
    {
        $contents = $this->getContents();

        return $this->getDiffArray($contents) ;
    }

    protected function getDiffArray($contents)
    {
        $combined = [];
        $first  = $contents[0];
        $sec = $contents[1];
//        unset($contents[0]);
        $secCopy  = $sec;
        foreach ($first as $row => $val) {

            $pos = array_search( $val, $sec);
                if($pos !== false ) {
                    $combined[] = [
                        'type' => static::TYPE_EXIST,
                        'value' => $val
                    ];
                    unset($secCopy[$pos]);

                } else {
                    $combined[] =  [
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
