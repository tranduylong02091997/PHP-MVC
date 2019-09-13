<?php
namespace AHT\Core;
interface ResourcseModelInterFace
{
    public function _init($tabel, $id, $model);

    public function save($model);

    public function delete($model);

}
