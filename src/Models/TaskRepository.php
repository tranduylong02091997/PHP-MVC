<?php
namespace AHT\Models;

use AHT\Models\Tasks;
use AHT\Models\TaskModel;
/**
 * intermediate layer between layer controller and model
 */

class TaskRepository
{
    public $objResourceModel;

    public function __construct(Tasks $model)
    {
        $this->objResourceModel = new TaskModel($model);
    }

    public function add($model)
    {
        return $this->objResourceModel->add($model);
    }

    public function edit($model)
    {
        return $this->objResourceModel->edit($model);
    }

    public function delete($id)
    {
        return $this->objResourceModel->delete($id);
    }

    public function get($id)
    {
        return $this->objResourceModel->get($id);
    }

    public function getAll()
    {
        return $this->objResourceModel->getAll();
    }

}
