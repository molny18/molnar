<?php
/**
 * Created by PhpStorm.
 * User: molnar.mate
 * Date: 2017.10.25.
 * Time: 14:11
 */
declare(strict_types=1);

namespace AppBundle\Service;

use stdClass;
use Symfony\Component\Process\Process;

class MusicStatusHandler
{
    /**
     * @var MusicStatusMessageParser
     */
    private $messageParser;

    /**
     * @return MusicStatusMessageParser
     */
    public function getMessageParser(): MusicStatusMessageParser
    {
        return $this->messageParser;
    }

    /**
     * @param MusicStatusMessageParser $messageParser
     */
    public function setMessageParser(MusicStatusMessageParser $messageParser)
    {
        $this->messageParser = $messageParser;
    }

    public function getStatusForAjaxSend(): string
    {
        $process=new Process('cmus-remote -Q');
        $process->start();
        usleep(500000);
        $status=$process->getOutput();
        $status=$this->messageParser->parse($status);
        return $this->JsonSerializer($status);
    }
    public function getStatusForRender(): array
    {
        $process=new Process('cmus-remote -Q');
        $process->start();
        usleep(500000);
        $status=$process->getOutput();
        return $this->messageParser->parse($status);
    }

    private function JsonSerializer(array $data): string
    {
        return json_encode($data);
    }
}