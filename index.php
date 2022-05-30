<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/index.css" type="text/css">

  <script src="https://kit.fontawesome.com/2696e4d99a.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="assets/js/dynamic-page.js">
    
  </script>
  <title>Todolist</title>
</head>
<body onload="showSpecificTaskList(document.getElementById('select-list').value)">
  <form action="add-list.php" method="post">
    <input class="field" type="text" name="title" placeholder="add list">
    <button class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
  </form>

  <form action="add-task.php" method="post">
    <input class="field" type="text" name="task" placeholder="add task">
    <select class="field" name="list">
      <?php include 'task-lists.php';?>
    </select>
    <button class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
  </form>
  <div id="tasks-table">
    <div>
    <select id="select-list" name="list" onchange="showSpecificTaskList(this.value)">
      <?php include 'task-lists.php';?>
    </select>
    <input id="search-bar" type="text" placeholder="Search" onkeyup="filter(this.value)">
    </div>
    <div id="data-rows">
      <?php include 'get-tasks.php';?>  
    </div> 
  </div>
</body>
</html>