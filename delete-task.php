<?php 
include 'db-config.php';
$id = $_GET['ID'];
$sql = "DELETE FROM tasks WHERE tasks.ID ='$id'";

if(mysqli_query($conn,$sql)===TRUE){
  echo "success: $id  ";
}
mysqli_close($conn);
//header("location: index.php");

?>