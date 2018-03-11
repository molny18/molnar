<?php
/**
 * Created by PhpStorm.
 * User: molnar.mate
 * Date: 2018.03.11.
 * Time: 17:05
 */
declare(strict_types=1);

namespace AppBundle\Manager;

use Doctrine\Common\Persistence\ObjectManager;

class MusicManager extends BaseManager
{
    public function __construct(ObjectManager $orm, $class)
    {
        parent::__construct($orm, $class);
    }
}