<?php
namespace AHT\Models;

use AHT\Models\Tasks;
use AHT\Bootstrap;

class TaskResourceModel
{
    public function __construct()
    {
        $this->objModel = new Tasks();
        $this->entityManager = Bootstrap::getEntityManager();
    }

    public function add($model)
    {
        $this->entityManager->persist($model);
        $this->entityManager->flush();
    }

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

    public function delete($id)
    {
        $this->objModel = $this->entityManager->find('\AHT\Models\Tasks', $id);
		$this->entityManager->remove($this->objModel);
		$this->entityManager->flush();
    }

    public function get($id)
    {
        $findObjec = $this->entityManager->find('\AHT\Models\Tasks', $id); 
        return $this->objModel->getProperties($findObjec);
	}

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
