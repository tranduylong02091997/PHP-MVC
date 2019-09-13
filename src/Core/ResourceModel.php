<?php
namespace AHT\Core;

use AHT\Config\Database;
use AHT\Core\Model;

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
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
    }
    
/**
 * @function save()
 * get properties of model then Insert in Database through Prepare in PDO
 */
    public function save($model)
    {
        $properties = $this->model->getProperties();//get value and properties of model
        $keys = "";
        $values = "";
        unset($properties['id']);
        foreach ($properties as $key => $value) {
            $keys .= $key . ", ";
            $values .= "'$value'" . ", ";}
           
        $sql = "INSERT INTO " . $this->table . " (" . rtrim($keys, ", ") . ") VALUES (" . rtrim($values, ", ") . ")";
        $reg = Database::getBdd()->prepare($sql);//loaded Prepare statement inside PDO
        return $reg->execute();//Execute the command

    }

/**
 * @function delete()
 * get properties id of record then delete record in model through Prepare in PDO
 */   
    public function delete($id)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE " . $this->id . "= ?";
        $req = Database::getBdd()->prepare($sql);
        return $req->execute([$id]);
    }

/**
 * @function edit()
 * get properties of record then update record in model through Prepare in PDO
 */
    public function edit($id)
    {
        $properties = $this->model->getProperties();
        unset($properties['id']);
        unset($properties['created_at']);
        $update = "";

        foreach ($properties as $key => $value) {
            $update .= $key . " = '" . $value . "', ";
        }
        $sql = "UPDATE " . $this->table . " SET " . trim($update, ", ") . " WHERE " . $this->id . "= ?";
        $reg = Database::getBdd()->prepare($sql);
        return $reg->execute([$id]);
    }
 
/**
 * @function showTask_id()
 * get properties id of record then show record in model through Prepare in PDO
 */
    public function showTask_id($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE " . $this->id . " = ?;";
        $reg = Database::getBdd()->prepare($sql);
        $reg->execute([$id]);
        return $reg->fetch();//return array 
    }

/**
 * @function showAllTask()
 * show value properties of records  in model through Prepare in PDO
 */    
    public function showAllTask()
    {
        $sql = "SELECT * FROM " . $this->table;
        $reg = Database::getBdd()->prepare($sql);
        $reg->execute();
        return $reg->fetchAll();//return array include all value of record in table    
    }
}
