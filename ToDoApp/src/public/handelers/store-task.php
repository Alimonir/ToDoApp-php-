<?php
require_once(str_replace("\\","/","C:\\xampp\htdocs\dashboard\ToDoApp\src\app\core\Database.php") );

$db = new Database("todoapp");
$conn = $db->getConnection();

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["title"])){
    $db->addTask($_POST["title"]);
}
