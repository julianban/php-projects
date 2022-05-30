<?php
  include 'db-config.php';
  $id = $_GET['ID'];
  $query = "SELECT checked FROM tasks WHERE ID = '$id' ";
  $result = mysqli_query($conn,$query);
  $value_check = mysqli_fetch_assoc($result);

  // tinyint: true != 0, false = 0s
  if($value_check['checked'] == 1){
    $sql = "UPDATE tasks SET checked = 0 WHERE ID = '$id'";
  }
  
  if($value_check['checked'] == 0){
    $sql = "UPDATE tasks SET checked = 1 WHERE ID = '$id' ";
  }

  

mysqli_query($conn,$sql);
header("location: index.php");
?>