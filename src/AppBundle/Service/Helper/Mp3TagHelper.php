<?php
/**
 * Created by PhpStorm.
 * User: molnar.mate
 * Date: 2018.03.11.
 * Time: 20:25
 */

declare(strict_types=1);

namespace AppBundle\Service\Helper;

use AppBundle\Util\ValueObject\Mp3TagObject;
use wapmorgan\Mp3Info\Mp3Info;

class Mp3TagHelper
{
    private $original_dir;


    public function getTags(): \Generator
    {
        $files=$this->createPathes();
        foreach ($files as $file){
           $info= new Mp3Info($file,true);
           $tag=$info->tags1;
           if(count($tag)<1){
           $this->fillTag($tag,$info->tags2);
           }
           yield $this->createNewValueObject($tag,$info->_fileName,(int) $info->duration, (string) $info->audioSize);
        }
    }

    private function createNewValueObject(array $tag,string $filePath, int $length,string $size)
    {
        return new Mp3TagObject($tag,$filePath,$length,$size);
    }
    private function createPathes()
    {
        $files=scandir($this->original_dir);
        array_shift($files);
        array_shift($files);
        $links=[];
        foreach ($files as $key => $file)
        {

            $links[]=$this->original_dir.'/'.$file;
        }
        return $links;
    }

    public function fillTag(array &$tag,array $info){
        $tag['song']=$info['TIT2'];
        $tag['artist']=$info['TPE1'];
    }

    /**
     * @return mixed
     */
    public function getOriginalDir()
    {
        return $this->original_dir;
    }


    private function pathNormalize(string $filename): string
    {
        if(FALSE !== mb_strpos($this->original_dir,' ')){
            $path=str_replace(' ','\ ',$this->original_dir);
        }
        if(FALSE !== mb_strpos($filename,' ')){
            $filename=str_replace(' ','\ ',$filename);
        }
        return  ($path ?? $this->original_dir) .'/'.$filename;
    }
    /**
     * @param mixed $original_dir
     */
    public function setOriginalDir($original_dir)
    {
        $this->original_dir = $original_dir;
    }
}