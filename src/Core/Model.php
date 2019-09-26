<?php
namespace AHT\Core;

use AHT\Models\Tasks;

class Model
{
    public function getProperties(Tasks $model)
    {
        return get_object_vars($model);//get value and properties trong model
    }
}
