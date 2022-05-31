<?php
include 'db-config.php';
  $task = $_POST['task'];
  $list = $_POST['list'];
  $id = $_POST['id_task'];

  $sql = "UPDATE tasks SET details = '$task' AND id_list = $list WHERE tasks.ID = $id";
  mysqli_query($conn,$sql);
  mysqli_close($conn);
?>