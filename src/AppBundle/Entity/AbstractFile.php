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
    protected $original_name;

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
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    protected  $mimeType;

    /**
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    protected $length;

    /**
     * @return string
     */
    public function getOriginalName(): string
    {
        return $this->original_name;
    }

    /**
     * @param string $original_name
     */
    public function setOriginalName(string $original_name)
    {
        $this->original_name = $original_name;
    }

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
    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     */
    public function setMimeType(string $mimeType)
    {
        $this->mimeType = $mimeType;
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
}