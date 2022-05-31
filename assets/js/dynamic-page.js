//when typing on search bar (binded with the log-table), start a timer
//which validate the text-input when it ends
// var typingTimer = 1;          
// var doneTypingInterval = 500;
// const search_input = $('#search-bar');
// function validateSearchBarInput(){
//   clearTimeout(typingTimer);
//   if (search_input.val()!='') {
//       typingTimer = setTimeout(()=>{
//           load_table();
//       }, doneTypingInterval);
//   }
// }

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
            '<tr>'+
            '<td>'+row[i].details+'</td>'+
            '<td>'+row[i].title+'</td>'+
            '<td><a class="btn btn-danger btn-lg" href="./delete-task.php?ID="' + id + '"><i class="fa-solid fa-xmark"></i></a></td>'+
            '<td><td><a class="btn btn-outline-success btn-lg" href="./change-state-task.php?ID="' + id + '"><i class="fa-solid fa-check"></i></a></td>'+
            '<td><a class="btn btn-outline-primary btn-lg" href="./update-page.php?ID="' + id + '"><i class="fa-solid fa-pen-clip"></i></a></td>'+
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
// ./delete-task.php?ID="2"
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
      window.location.replace("index.php");
      load_table();
    } 
  })
}
