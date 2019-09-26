<?php
namespace AHT\Core;

use AHT\Bootstrap;
use AHT\Models\Tasks;

class ResourceModel implements ResourcseModelInterFace
{
    private $table;
    private $id;
    private $model;
/**
 * construct function _init() by ResourcseModelInterFace
 *
 */
    public function _init($table, $id, $model)
    {
        $this->entityManager = Bootstrap::getEntityManager();
        $this->objModel = new Tasks();
        
    }
   
/**
 * @function add()
 * get properties of model then Insert in Database 
 */
    public function add($model)
    {
        $this->entityManager->persist($model);
        $this->entityManager->flush();
    }

/**
 * @function delete()
 * get properties id of record then delete record in model
 */
    public function delete($id)
    {
        $this->objModel = $this->entityManager->find('\AHT\Models\Tasks', $id);
		$this->entityManager->remove($this->objModel);
		$this->entityManager->flush();
    }

/**
 * @function edit()
 * get properties of record then update record in model
 */
    public function edit($model)
    {
        $propertiesArray = $this->objModel->getProperties($model);
        $id = $propertiesArray['id'];
		$this->objModel = $this->entityManager->find('\AHT\Models\Tasks', $id);
		foreach ($propertiesArray as $key => $value) {
			$this->objModel->{'set' . ucfirst($key)}($value);
        }
		$this->entityManager->persist($this->objModel);
		$this->entityManager->flush();
    }

/**
 * @function get($id)
 * get properties id of record then show record in model
 */
    public function get($id)
    {
        $findObjec = $this->entityManager->find('\AHT\Models\Tasks', $id); 
        return $this->objModel->getProperties($findObjec);
    }

/**
 * @function getAllT()
 * show value properties of records  in model 
 */
    public function getAll()
    {
        $tasksRepository = $this->entityManager->getRepository('\AHT\Models\Tasks');
        $tasks = $tasksRepository->findAll();
        $value = [];
		foreach ($tasks as $task) {
			$value [] = $this->objModel->getProperties($task); 
		}      
		return $value;
    }
}
