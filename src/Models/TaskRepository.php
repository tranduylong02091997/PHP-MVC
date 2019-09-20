<?php
namespace AHT\Models;


/**
 * intermediate layer between layer controller and model
 */

class TaskRepository
{
    public $objResourceModel;

    public function __construct()
    {
        $this->objResourceModel = new TaskResourceModel();
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
