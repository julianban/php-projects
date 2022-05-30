<?php
  $hostname = "127.0.0.1";
  $username = "root";
  $password = "";
  $dbname = "todolist";
  $port = 3306;

  $conn = new mysqli($hostname,$username,$password,$dbname,$port);

  if($conn->connect_error){
    die("connection failed");
  }
?>