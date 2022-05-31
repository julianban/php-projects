<?php
include_once './db-config.php';

$title = $_POST['title'];
$sql = "INSERT INTO lists(title) VALUES('$title')";

if($conn->query($sql)===TRUE){
  echo "successfully added new task";
}else{
  echo "error";
}

?>