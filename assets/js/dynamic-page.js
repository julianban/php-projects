
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
          var str = '<thead><th>Task</th><th>List</th><th>Date</th></thead>';
          while(i < row.length){
            var id = row[i].ID;
            if(row[i].completed == 1){var isCompleted = "true";}
            if(row[i].completed == 0){var isCompleted = "false";}

            str +=
            '<tr id="row'+ id +'">'+
            '<td>'+row[i].details+'</td>'+
            '<td>'+row[i].title+'</td>'+
            '<td>'+row[i].date_task+'</td>'+
            '<td><a class="btn btn-danger btn-lg" href="./delete-task.php?ID=' + id + '"><i class="fa-solid fa-xmark"></i></a></td>'+
            '<td><button id="check-btn'+ id +'" class="check-btn '+ isCompleted +'" value="' + id + '" onclick="checkTaskIsCompleted(this.value)"><i class="fa-solid fa-check"></i></button></td>'+
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
      console.log(data);
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
      console.log(data);
     load_table();
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

function checkTaskIsCompleted(task_id){
  $.ajax({
    type: "POST",
    data: {
      ID: task_id
    },
    url: "change-state-task.php",
    success: function(data){
      console.log(data);
      if(data == 'failed'){
        alert(data);
      }else{
        if(data == 1){
          $('#check-btn' + data).removeClass("false");
          $('#check-btn' + data).addClass("true");
        }else{
          $('#check-btn' + data).removeClass("true");
          $('#check-btn' + data).addClass("false");
        }
      }
      load_table();
    } 
  })
}
