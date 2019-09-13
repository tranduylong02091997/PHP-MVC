<?php
namespace AHT\Controllers;

use AHT\Core\Controller;
use AHT\Models\TaskModel;
use AHT\Models\TaskRepository;

class tasksController extends Controller
{
    private $task;
    private $taskRepository;
    public function __construct()
    {
        $this->task = new TaskModel();
        $this->taskRepository = new TaskRepository($this->task);
    }

    public function index()
    {
        $d['tasks'] = $this->taskRepository->showAllTask();
        $this->set($d);
        $this->render("index");
    }

/**
 * function create() 1 object
 * get value element
 * and implement insert in database through layer taskRepository
 */
    public function create()
    {
        if (isset($_POST["title"])) {
            $this->task->setTitle($_POST["title"]);
            $this->task->setDescription($_POST["description"]);
            $this->task->setUpdated_at(date('Y-m-d H:i:s'));
            $this->task->setCreated_at(date('Y-m-d H:i:s'));
            if ($this->taskRepository->add($this->task)) {
                header("Location: http://localhost:8080/mvc/");
            } else {
                echo "Chưa thêm được bản ghi";
            }
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
        $d["task"] = $this->taskRepository->showTask_id($id);
        if (isset($_POST["title"])) {
            $this->task->setTitle($_POST["title"]);
            $this->task->setDescription($_POST["description"]);
            $this->task->setUpdated_at(date('Y-m-d H:i:s'));
            if ($this->taskRepository->edit($id)) {
                header("Location: http://localhost:8080/mvc/");
            }
        } else {
            $this->set($d);
            $this->render("edit");
        }
    }

/**
 * function delete() 1 object
 * get value id  and implement 
 * delete in database through layer taskRepository
*/
    public function delete($id)
    {
        if ($this->taskRepository->delete($id)) {
            header("Location: http://localhost:8080/mvc/");
        } else {
            echo "Chưa xóa được bản ghi";
        }
    }
}
