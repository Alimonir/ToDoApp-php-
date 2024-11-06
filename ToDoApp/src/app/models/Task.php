<?php require_once '../core/Database.php';
class Task
{
    private $conn;
    private $table_name = "tasks";
    public $id;
    public $title;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function update()
    {
        $query = "UPDATE " . $this->table_name . " SET title = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("si", $this->title, $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function add()
    {
        $query = "INSERT INTO " . $this->table_name . " (title) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $this->title);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    public function delete(){
        $query = "DELETE FROM". $this->table_name . "WHERE id= ?"
        ;
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i",$this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
