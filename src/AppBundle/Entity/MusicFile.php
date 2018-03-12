<?php
/**
 * Created by PhpStorm.
 * User: molnar.mate
 * Date: 2018.03.11.
 * Time: 16:50
 */
declare(strict_types=1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class MusicFile
 * @package AppBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="music_file")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\FileRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class MusicFile extends AbstractFile
{

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    protected $author;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     *
     * @var string|null
     */
    protected $cover;

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author)
    {
        $this->author = $author;
    }

    /**
     * @return null|string
     */
    public function getCover(): ?string
    {
        return $this->cover;
    }

    /**
     * @param null|string $cover
     */
    public function setCover($cover)
    {
        $this->cover = $cover;
    }


}