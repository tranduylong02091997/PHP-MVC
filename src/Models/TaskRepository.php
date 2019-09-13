<?php
namespace AHT\Models;

use AHT\Models\TaskModel;
use AHT\Models\TaskResourceModel;

/**
 * intermediate layer between layer controller and model
 */

class TaskRepository
{
    protected $taskResourceModel;

    public function __construct(TaskModel $model)
    {
        $this->taskResourceModel = new TaskResourceModel($model);
    }

    public function add($model)
    {
        return $this->taskResourceModel->save($model);
    }

    public function edit($id)
    {
        return $this->taskResourceModel->edit($id);
    }

    public function delete($id)
    {
        return $this->taskResourceModel->delete($id);
    }

    public function showTask_id($id)
    {
        return $this->taskResourceModel->showTask_id($id);
    }

    public function showAllTask()
    {
        return $this->taskResourceModel->showAllTask();
    }

}
