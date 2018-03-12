<?php
/**
 * Created by PhpStorm.
 * User: molnar.mate
 * Date: 2018.03.11.
 * Time: 16:27
 */
declare(strict_types=1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractFile
 *
 * @ORM\HasLifecycleCallbacks
 * @ORM\MappedSuperclass
 *
 *
 * @package AppBundle\Entity
 */
abstract class  AbstractFile
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    protected $path;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    protected $title;


    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    protected  $size;

    /**
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    protected $duration;


    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * @param string $size
     */
    public function setSize(string $size)
    {
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @param int $duration
     */
    public function setDuration(int $duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}