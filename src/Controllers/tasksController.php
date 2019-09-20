<?php
namespace AHT\Controllers;

use AHT\Core\Controller;
use AHT\Models\TaskRepository;
use AHT\Models\Tasks;

class tasksController extends Controller
{
    private $task;
    private $taskRepository;
    private $objTask;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->task = new TaskRepository();
        $this->objTask = new Tasks();
    }
    public function index()
    {
        $d['tasks'] = $this->task->getAll();
        $this->set($d);
        $this->render("index");
        
    }

/**
 * function create() is Insert 1 object
 * get value element on view
 * and implement insert in database through layer taskRepository
 */
    public function create()
    {
        if (isset($_POST["title"])) {
            $this->objTask->setTitle($_POST["title"]);
            $this->objTask->setDescription($_POST["description"]);
            $this->objTask->setCreated_at(\DateTime::createFromFormat('Y-m-d H-i-s', date("Y-m-d H-i-s")));
            $this->objTask->setUpdated_at(\DateTime::createFromFormat('Y-m-d H-i-s', date("Y-m-d H-i-s")));
            $this->task->add($this->objTask);

            header("Location: http://localhost:8080/mvc/src/");

        }
        $this->render("create");
    }

/**
 * function edit() 1 object
 * get value element and implement
 * edit in database through layer taskRepository
 */
    public function edit($id)
    {   
        $d["task"] = $this->task->get($id);
        if (isset($_POST["title"])) {
            $this->objTask->setId($id);
            $this->objTask->setTitle($_POST["title"]);
            $this->objTask->setDescription($_POST["description"]);
            $this->objTask->setCreated_at(\DateTime::createFromFormat('Y-m-d H-i-s', date("Y-m-d H-i-s")));
            $this->objTask->setUpdated_at(\DateTime::createFromFormat('Y-m-d H-i-s', date("Y-m-d H-i-s")));
            $this->task->edit($this->objTask);
            header("Location: http://localhost:8080/mvc/src");
        }
         $this->set($d);
        $this->render("edit");

    }

/**
 * function delete() 1 object
 * get value id  and implement
 * delete in database through layer taskRepository
 */
    public function delete($id)
    {
        $this->task->delete($id);
        header("Location: http://localhost:8080/mvc/src");

    }
}
