<?php
require_once(str_replace("\\", "/", "C:\\xampp\htdocs\dashboard\ToDoApp\src\\app\core\Database.php"));
session_start();

if (isset($_POST['id']) && isset($_POST['title'])) {
    $db = new Database("todoapp");
    $conn = $db->getConnection();

    $task_id = $_POST['id'];
    $title = $_POST['title'];

    $sql = "UPDATE tasks SET title = '$title' WHERE id = $task_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: http://localhost/dashboard/ToDoApp/src/public/index.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Invalid request.";
}