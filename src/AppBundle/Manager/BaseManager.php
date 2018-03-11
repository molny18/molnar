<?php
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Created by PhpStorm.
 * User: molnar.mate
 * Date: 2018.03.11.
 * Time: 17:06
 */

namespace AppBundle\Manager;

abstract class BaseManager
{
    protected $class;

    protected $orm;

    protected $repo;

    public function __construct(ObjectManager $orm,string $class)
    {
        $this->orm=$orm;
        $this->repo= $orm->getRepository($class);
        $metaData=$orm->getClassMetadata($class);
        $this->class=$metaData->getName();
    }

    public function createNew(){
        $class= $this->getClass();

        return new $class;
    }

    public function refreshEntity($entity)
    {
        $this->orm->refresh($entity);
    }

    public function updateEntity($entity, $flush = true){
        $this->orm->persist($entity);
        if($flush){
            $this->orm->flush();
        }
    }


    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }
}