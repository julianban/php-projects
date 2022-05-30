<?php
  include 'db-config.php';
  
  $id_list = intval($_GET['q']);
  $sql = "SELECT t.ID,t.details,l.title FROM tasks t JOIN lists l ON l.ID = t.id_list WHERE t.id_list = '$id_list'";

  $result = mysqli_query($conn, $sql);

  if(mysqli_num_rows($result) > 0){
    $tasks = mysqli_fetch_all($result,MYSQLI_ASSOC);
    ?><table>
      <thead> 
        <th>Task</th>
        <th>List</th>
      </thead>  
    <?php
    foreach($tasks as $task){ ?>
      <tr>
        <td><?=$task['details'];?></td>
        <td><?=$task['title'];?></td>
        <td><a href="./delete-task.php?ID=<?=$task['ID']?>" class="btn btn-danger btn-lg"><i class="fa-solid fa-xmark"></i></a></td>
        <td><a id="checkbox" href="./change-state-task.php?ID=<?=$task['ID']?>" class="btn btn-outline-success btn-lg"><i class="fa-solid fa-check"></i></a></td>
        <td><a class="btn btn-outline-primary btn-lg" href="./update-task.php?ID=<?=$task['ID']?>"><i class="fa-solid fa-pen-clip"></i></a></td>
      </tr>
    <?php
    }
    ?></table><?php
  }
?>