<?php
include './db-config.php';

$task = $_POST['task'];
$id_list = $_POST['list'];
$date = $_POST['date'];

$mysql_date = date('Y-m-d',$date);
$sql = "INSERT INTO tasks(details,date_task,completed,id_list) VALUES('$task','$mysql_date',0,$id_list)";

if($conn->query($sql)===TRUE){
  echo "successfully added new task";
}else{
  echo "failed to add task: ".$conn->error;
}
$conn->close();
?>