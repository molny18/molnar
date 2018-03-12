<?php
/**
 * Created by PhpStorm.
 * User: molnar.mate
 * Date: 2018.03.11.
 * Time: 18:09
 */
declare(strict_types=1);

namespace AppBundle\Service\Handler;

use AppBundle\Service\MusicParser;

class MusicRefreshHandler
{
    /**
     * @var MusicParser
     */
    protected $parser;

    /**
     * @return MusicParser
     */
    public function getParser(): MusicParser
    {
        return $this->parser;
    }

    /**
     * @param MusicParser $parser
     */
    public function setParser(MusicParser $parser)
    {
        $this->parser = $parser;
    }

    public function handleRefresh(): void
    {
         $this->parser->parse();
    }
}