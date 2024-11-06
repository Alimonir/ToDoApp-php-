<?php
//connectting to mysql

require_once(str_replace("\\","/","C:\\xampp\htdocs\dashboard\ToDoApp\src\\app\core\Database.php") );
$db = new Database(""); 
$conn = $db->getConnection();
$sql = "CREATE DATABASE IF NOT EXISTS todoapp";
//to execute query
$result = mysqli_query($conn,$sql);//Performs a query on the database Performs a query against the database
mysqli_close($conn);

    // Establish database connection
$conn = mysqli_connect("localhost", "root", "", "todoapp"); 
if (!$conn) {
    throw new Exception("Connection failed: " . mysqli_connect_error());
}

// Create table query
$sql = "CREATE TABLE IF NOT EXISTS tasks (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(200)
)";

// Execute the query
$result = mysqli_query($conn, $sql);

// Close the database connection
mysqli_close($conn);
