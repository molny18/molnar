<?php
/**
 * Created by PhpStorm.
 * User: molnar.mate
 * Date: 2018.03.12.
 * Time: 1:30
 */
declare(strict_types=1);

namespace AppBundle\Util\ValueObject;

class Mp3TagObject
{
    /**
     * @var array
     */
    protected $song_data;

    /**
     * @var string
     */
    protected $path;

    /**
     * @var int
     */
    protected $duration;

    /**
     * @var string
     */
    protected $size;

    public function __construct(array $song_data, string $path,int $duration, string $size )
    {
        $this->song_data = $song_data;
        $this->path = $path;
        $this->duration = $duration;
        $this->size = $size;
    }

    /**
     * @return array
     */
    public function getSongData(): array
    {
        return $this->song_data;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }
}