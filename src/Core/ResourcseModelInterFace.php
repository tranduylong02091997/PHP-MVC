<?php
namespace AHT\Core;

interface ResourcseModelInterFace
{
    public function _init($tabel, $id, $model);

    public function add($model);

    public function delete($model);

}
