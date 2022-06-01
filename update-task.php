<?php
include 'db-config.php';
  $task = $_POST['task'];
  $list = $_POST['list'];
  $id = $_POST['id_task'];
  
  $sql = "UPDATE tasks SET details = '$task', id_list = $list WHERE tasks.ID = $id";
  if(mysqli_query($conn,$sql)===TRUE){
    echo "success";
  }
  mysqli_close($conn);
?>