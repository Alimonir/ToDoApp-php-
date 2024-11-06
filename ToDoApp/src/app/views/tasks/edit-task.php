<?php

require_once(str_replace("\\", "/", "C:\\xampp\htdocs\dashboard\ToDoApp\src\app\core\Database.php"));
session_start();
if (isset($_GET["id"])) {
    $db = new Database("todoapp");
    $conn = $db->getConnection();

    $id = $_GET["id"];

    $sql = "SELECT title FROM tasks WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $task = mysqli_fetch_assoc($result);
    if($task){
        $title = $task['title'];
    }else{
        echo 'task not found';
        exit();       
    }
    echo"<pre>";
    var_dump($task);
    echo"</pre>";

} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
</head>

<body>
    <form action="http://localhost/dashboard/ToDoApp/src/public/handelers/update-task.php" method="post">
         <input type="hidden" name="id" value="<?= $id; ?>">
         <label for="title">Task Title:</label>
         <input type="text" id="title" name="title" value="<?= htmlspecialchars($title); ?>">
         <button type="submit">Update Task</button>        
    </form>
</body>

</html>