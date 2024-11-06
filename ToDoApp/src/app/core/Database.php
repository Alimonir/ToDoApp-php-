<?php
class Database{
    private $conn;
    public $dbname;
    public function __construct($dbname){
        $this->dbname = $dbname;
        $this->connect();
    }
    private function connect(){
        try{
                $this->conn = mysqli_connect("localhost","root","",$this->dbname);
            if(!$this->conn){
                throw new Exception("Connection failed: " . mysqli_connect_error()) ;
            }
            }catch (Exception $e) { error_log($e->getMessage(), 3, 'error_log.txt'); echo "Error: Could not establish a connection. Please try again later."; }
    }
    public function getConnection(){
        return $this->conn;
    }

    public function addTask($title){
        session_start();
        $title = trim(htmlspecialchars(htmlentities($title)));
        $sql = "INSERT INTO tasks (title) VALUES ('$title')";
        $result = mysqli_query($this->conn, $sql);

        if (mysqli_affected_rows($this->conn) == 1) {
            $_SESSION['success'] = 'Task added successfully!';
        }else{
            $_SESSION['error'] = 'Failed to add task.';
        }
        if(mysqli_affected_rows($this->conn) > 0) {
            $_SESSION['success'];
        }
        header("location: http://localhost/dashboard/ToDoApp/src/public/index.php");
        exit();
    }
}