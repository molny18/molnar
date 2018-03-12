<?php
/**
 * Created by PhpStorm.
 * User: molnar.mate
 * Date: 2018.03.11.
 * Time: 17:29
 */
declare(strict_types=1);

namespace AppBundle\Service;

use AppBundle\Manager\MusicManager;
use AppBundle\Service\Helper\Mp3TagHelper;

class MusicParser
{
    /**
     * @var MusicManager
     */
    protected $manager;


    /**
     * @var Mp3TagHelper
     */
    protected $command_helper;

    /**
     * @var string
     */
    private $dir;

    public function parse()
    {
        $tags=$this->command_helper->getTags();
        foreach ($tags as $tag){
            $this->manager->createNewWithData($tag);
        }
    }


    /**
     * @param Mp3TagHelper $command_helper
     */
    public function setCommandHelper(Mp3TagHelper $command_helper)
    {
        $this->command_helper = $command_helper;
    }

    private function createSymlinks(): void
    {

    }


    /**
     * @return MusicManager
     */
    public function getManager(): MusicManager
    {
        return $this->manager;
    }

    /**
     * @param MusicManager $manager
     */
    public function setManager(MusicManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @return string
     */
    public function getDir(): string
    {
        return $this->dir;
    }

    /**
     * @param string $dir
     */
    public function setDir(string $dir)
    {
        $this->dir = $dir;
    }


}