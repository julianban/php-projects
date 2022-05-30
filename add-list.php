<?php
include_once './db-config.php';

$title = $_POST['title'];
$sql = "INSERT INTO lists(title) VALUES('$title')";

if($conn->query($sql)===TRUE){
  header("location: index.php");
}

?>