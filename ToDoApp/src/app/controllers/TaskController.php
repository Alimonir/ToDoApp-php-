<?php require_once '../models/Task.php';
class TaskController
{
    private $db;
    private $task;
    public function __construct()
    {
        $database = new Database("todoapp");
        $this->db = $database->getConnection();
        $this->task = new Task($this->db);
    }
    public function updateTask($id, $title)
    {
        $this->task->id = $id;
        $this->task->title = $title;
        if ($this->task->update()) {
            header("Location: /ToDoApp/src/public/index.php");
            exit();
        } else {
            echo "Error updating task.";
        }
    }
    public function addTask($title)
    {
        $this->task->title = $title;
        if ($this->task->add()) {
            header("Location: /ToDoApp/src/public/index.php");
            exit();
        } else {
            echo "Error adding task.";
        }
    }
    public function deleteTask($id)
    {
        $this->task->id = $id;
        if ($this->task->delete()) {
            header("Location: /ToDoApp/src/public/index.php");
        } else {
            echo "Error deleting task.";
        }
    }
}
