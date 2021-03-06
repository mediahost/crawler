<?php

namespace App\Model\Facade;

abstract class BaseFacade extends \Nette\Object
{

    /** @var \Kdyby\Doctrine\EntityDao */
    protected $dao;

    public function __construct(\Kdyby\Doctrine\EntityDao $dao)
    {
        $this->dao = $dao;
    }

    public function find($id)
    {
        return $this->dao->findOneBy(array('id' => $id));
    }

    public function save(\Kdyby\Doctrine\Entities\IdentifiedEntity $entity)
    {
        return $this->dao->save($entity);
    }
    
    public function findPairs($value, $orderBy = ["id" => "asc"], $key = "id")
    {
        return $this->dao->findPairs(array(), $value, $orderBy, $key);
    }

    public function findAll()
    {
        return $this->dao->findAll();
    }

    public function delete(\Kdyby\Doctrine\Entities\IdentifiedEntity $entity)
    {
        return $this->dao->delete($entity);
    }

}
