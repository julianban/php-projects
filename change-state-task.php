<?php
  include 'db-config.php';
  $id = $_POST['ID'];

  $query = "SELECT completed FROM tasks WHERE ID = '$id'";
  $result = mysqli_query($conn,$query);
  $value = mysqli_fetch_assoc($result);
  // tinyint: true != 0, false = 0s
  $isCompleted = $value['completed'];
  if($isCompleted == 1){ // if true
    $sql = "UPDATE tasks SET completed = 0 WHERE ID = '$id'";
  }
  
  if($isCompleted == 0){ // if false
    $sql = "UPDATE tasks SET completed = 1 WHERE ID = '$id' ";
  }

  if(mysqli_query($conn,$sql)===TRUE){
    echo "$id";
  }else{
    echo "failed";
  }
  mysqli_close($conn);
?>