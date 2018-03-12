<?php
/**
 * Created by PhpStorm.
 * User: molnar.mate
 * Date: 2018.03.11.
 * Time: 17:06
 */

namespace AppBundle\Manager;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;

abstract class BaseManager
{
    protected $class;

    protected $orm;

    protected $repo;

//    public function __construct(Connection $conn, Configuration $config, EventManager $eventManager)
//    {
//        parent::__construct($conn, $config, $eventManager);
//
//    }

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

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    public function getRepo(): \Doctrine\Common\Persistence\ObjectRepository
    {
        return $this->repo;
    }

    /**
     * @param \Doctrine\Common\Persistence\ObjectRepository $repo
     */
    public function setRepo(\Doctrine\Common\Persistence\ObjectRepository $repo)
    {
        $this->repo = $repo;
    }

    public function findAll(): array
    {
        return $this->repo->findAll();
    }

    public function find($id)
    {
        return $this->repo->find($id);
    }

    public function findAllBy(array $criteria): array
    {
        return $this->repo->findBy($criteria);
    }

    public function findBy(array $criteria)
    {
        return $this->repo->findOneBy($criteria);
    }
}