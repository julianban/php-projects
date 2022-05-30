<?php
  include 'db-config.php';
  $str = $_POST['data'];

  if($str == ""){
    $sql = "SELECT t.ID,t.details, l.title
            FROM tasks t 
            JOIN lists l ON l.ID = t.id_list";
  }else{
    $sql = "SELECT t.ID,t.details, l.title
            FROM tasks t 
            JOIN lists l ON l.ID = t.id_list 
            WHERE t.details LIKE '%$str%'";
  }
  
  $result = mysqli_query($conn,$sql);

  if(mysqli_num_rows($result) > 0){
    $array_task = mysqli_fetch_all($result);
    echo json_encode($array_task);
  }
  mysqli_close($conn);
?>