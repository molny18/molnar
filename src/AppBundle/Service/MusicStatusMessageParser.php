<?php
/**
 * Created by PhpStorm.
 * User: molnar.mate
 * Date: 2017.10.24.
 * Time: 15:22
 */
declare(strict_types=1);
namespace AppBundle\Service;

class MusicStatusMessageParser
{
    public function parse(?string $message)
    {
        $output=$this->separate($message);
        return $output;
    }

    private function separate(string $message): array
    {
        $separated= explode("\n",$message);
        $separated=array_slice($separated,2,4);
        $assoc=[];
        foreach ($separated as $key=>$tag){
            $t=str_replace('tag ','',$tag);
            $splitted=explode(' ',$t);
            $assoc[$splitted[0]]=str_replace($splitted[0],'',$t);
        }
        return $assoc;
    }

}