function load_table(){
  $.ajax({
    type: "POST",
    data: {
      keyword:$("#search-bar").val(),
      selectedList: $("#select-list").val()
    },
    url: "fetch-data-from-db.php",
    success: function(data){
      console.log(data);
      if(data != ''){
        var row = JSON.parse(data);
        console.log(row);
        $('#tasks-table').html(function(){
          i=0;
          var str = '<thead> <th>Task</th><th>List</th></thead>';
          while(i < row.length){
            var id = row[i].ID;
            str +=
            '<tr id="row'+ id +'">'+
            '<td>'+row[i].details+'</td>'+
            '<td>'+row[i].title+'</td>'+
            '<td><a class="btn btn-danger btn-lg" href="./delete-task.php?ID=' + id + '"><i class="fa-solid fa-xmark"></i></a></td>'+
            '<td><button class="check-btn btn btn-outline-success btn-lg" data-id="'+ id +'"><i class="fa-solid fa-check"></i></button></td>'+
            '<td><a class="btn btn-outline-primary btn-lg" href="./update-page.php?ID=' + id + '"><i class="fa-solid fa-pen-clip"></i></a></td>'+
            '</tr>';
            i++;
          }
          return str;
        });
      }else{
        $('#tasks-table').text('nothing here');
      }
    }
  });
}

function createNewList(){
  $.ajax({
    type: "POST",
    data: $("#add-list-form").serialize(), //The .serialize() method creates a text string in standard URL-encoded notation. It can act on a jQuery object that has selected individual form controls
    url: "add-list.php",
    success: function(data){
      window.location.replace("index.php");
    } 
  })
}

function createNewTask(){
  $.ajax({
    type: "POST",
    data: $("#add-task-form").serialize(),
    url: "add-task.php",
    success: function(data){
      window.location.replace("index.php");
    } 
  })
}

function updateTask(){
  $.ajax({
    type: "POST",
    data: $("#update-task-form").serialize(),
    url: "update-task.php",
    success: function(data){
      console.log(data);
      window.location.replace("index.php");
    } 
  })
}

function checkTaskCompleted(){
  $.ajax({
    type: "POST",
    data: {
      $ID:$('.check-btn').attr("data-id")
    },
    url: "change-state-task.php",
    success: function(data){
      console.log(data);
      var rowData = JSON.parse(data);
      var isCompleted = rowData[0];
      var id_task = rowData[1]; 
      if(isCompleted == 1){
        $('#row'+id_task).css("background-color","#cccfd9");
      }
    }
  })
}
