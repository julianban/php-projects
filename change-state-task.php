<?php
  include 'db-config.php';
  $id = intval($_POST['ID']);
  $query = "SELECT completed FROM tasks WHERE ID = '$id' ";
  $result = mysqli_query($conn,$query);
  $result = mysqli_fetch_assoc($result);
  // tinyint: true != 0, false = 0s
  $value = $result['checked'];
  if($value == 1){
    $sql = "UPDATE tasks SET completed = 0 WHERE ID = '$id'";
  }
  
  if($value == 0){
    $sql = "UPDATE tasks SET completed = 1 WHERE ID = '$id' ";
  }

  if(mysqli_query($conn,$sql)===TRUE){
    $array = array($value,$id);
    echo json_encode($array);
  }
mysqli_close($conn);
?>