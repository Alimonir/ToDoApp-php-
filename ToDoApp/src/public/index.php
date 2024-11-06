<?php 
session_start();
require_once(str_replace("\\","/","C:\\xampp\htdocs\dashboard\ToDoApp\src\\app\core\Database.php") );
$db = new Database("todoapp");
$conn = $db->getConnection();

$sql = "SELECT*FROM tasks ORDER BY id DESC";
$result = mysqli_query($conn, $sql);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <title>Document</title>
</head>

<body>

  

    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <form action="http://localhost/dashboard/ToDoApp/src/public/handelers/store-task.php"  method="POST" class="form border p-2 my-5">
                    <input type="text" name="title" class="form-control my-3 border border-success" placeholder="add new todo">
                    <?php if(isset($_SESSION['success'])): ?>
                        <div class="alert alert-success text-center"><?php echo $_SESSION['success'];
                        //sessin flash عشان احذف الرسالة
                       unset($_SESSION['success']);
                        ?></div> 
                    <?php endif; ?>
                    <input type="submit" value="Add" class="form-control btn btn-primary my-3 " placeholder="add new todo">
                </form>
            </div>
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                             
                            <tr>
                                <td><?= $row["id"] ?></td>
                                <td><?= $row["title"] ?></td>
                                <td>
                                    <a href="http://localhost/dashboard/ToDoApp/src/public/handelers/delete-task.php?id=<?= $row["id"]; ?>" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> </a>
                                    <a href="http://localhost/dashboard/ToDoApp/src/app/views/tasks/edit-task.php?id=<?= $row["id"];?>" class="btn btn-info"><i class="fa-solid fa-edit"></i> </a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="script.js"></script>
</body>

</html>