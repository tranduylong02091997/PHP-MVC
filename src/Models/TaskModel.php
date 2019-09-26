<?php
namespace AHT\Models;

use AHT\Core\ResourceModel;
use AHT\Models\Tasks;

class TaskModel extends ResourceModel
{
    public function __construct(Tasks $model)
    {
        return $this->_init('tasks', 'id', $model);
    }
}
