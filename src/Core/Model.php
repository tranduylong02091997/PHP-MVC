<?php
namespace AHT\Core;

class Model
{
    public function getProperties()
    {
        return get_object_vars($this);//get value and properties trong model
    }
}
