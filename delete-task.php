<?php 
include 'db-config.php';
$id = $_GET['ID'];
$sql = "DELETE FROM tasks WHERE tasks.ID =$id";

mysqli_query($conn,$sql);
header("location: index.php");

$conn->close();
?>