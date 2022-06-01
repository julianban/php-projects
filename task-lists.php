<?php
include 'db-config.php';
$sql = "SELECT ID,title FROM lists";
$result = $conn->query($sql);

if($result->num_rows>0){
  
  while($row = $result->fetch_assoc()){
    $id = $row['ID'];
    $title = $row['title'];
    ?>
    <option value="<?=$id?>"><?=$title?></option>
    <?php
  }
}
$conn->close();
?>