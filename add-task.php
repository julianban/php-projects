<?php
include './db-config.php';

$task = $_POST['task'];
$id_list = $_POST['list'];

$sql = "INSERT INTO tasks(details,id_list) VALUES('$task',$id_list)";

if($conn->query($sql)===TRUE){
  echo "successfully added new task";
}else{
  echo "failed to add task: ".$conn->error;
}
$conn->close();
?>