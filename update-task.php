<?php
include 'db-config.php';
  $task = $_POST['task'];
  $list = $_POST['list'];
  $date = $_POST['date-task'];
  $id = $_POST['id_task'];
  $format_date = date('Y-m-d',$date);
  
  $sql = "UPDATE tasks SET details = '$task', id_list = $list, date_task = $format_date WHERE tasks.ID = $id";
  if(mysqli_query($conn,$sql)===TRUE){
    echo "success";
  }
  mysqli_close($conn);
?>