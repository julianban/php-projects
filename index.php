<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/index.css" type="text/css">

  <script src="https://kit.fontawesome.com/2696e4d99a.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 
  <title>Todolist</title>
</head>
<body>
  <form id="add-list-form" method="post">
    <input class="field" type="text" name="title" placeholder="add list">
    <button class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
  </form>

  <form id="add-task-form" method="post">
    <input class="field" type="text" name="task" placeholder="add task">
    <select id="select-list1" class="field" name="list">
      <?php include 'task-lists.php';?>
    </select>
    <button class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
  </form>

  <div id="container">
    <div>
    <select id="select-list" class="field" name="list">
      <?php include 'task-lists.php';?>
    </select>
    <!-- ricerca task all'interno di una specifica lista -->
    <input id="search-bar" class="field" type="text" placeholder="Search">
    </div>
    <table id="tasks-table">
    </table>
  </div>

  <script>
    //listeners
    $(document).ready(()=>{
      $('.check-btn').click(checkTaskCompleted);
      $('#add-list-form').submit(createNewList);
      $('#add-task-form').submit(createNewTask);
      $('#select-list').change(load_table);
      $('#search-bar').keyup(load_table);
      load_table();
    })
  </script>
  <script src="assets/js/dynamic-page.js"></script>
</body>
</html>