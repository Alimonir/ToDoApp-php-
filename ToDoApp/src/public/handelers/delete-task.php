<?php
//if i find get id,  i will make my connection to sql,
require_once(str_replace("\\", "/", "C:\\xampp\htdocs\dashboard\ToDoApp\src\app\core\Database.php"));
session_start();

if (isset($_GET["id"])) {
    $db = new Database("todoapp");// my class to connect data base
    $conn = $db->getConnection();

    $id = $_GET["id"];
    $sql = "DELETE FROM tasks WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    header("location: http://localhost/dashboard/ToDoApp/src/public/index.php");
    exit();
}
