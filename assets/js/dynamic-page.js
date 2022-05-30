
function showSpecificTaskList(str) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("data-rows").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","get-tasks.php?q="+str,true);
    xmlhttp.send();
}

function load_table(){
  $.ajax({
    type: "post",
    keyword: $("#search-bar").val(),
    url: "search-task.php",
    success: function(data){
      if(data != ''){
        const row = JSON.parse(data);
        console.log(row);
        $('#').html(function(){
          var str;
          i=0;
          while(i<row.length){
            str +=
            '<tr>'+
            '<td>'+row[i].details+'</td>'+
            '<td>'+row[i].title+'</td>'+
            '<td><td><a href="./change-state-task.php?ID=<?=$task[\'ID\']?>" class="btn btn-outline-success btn-lg"><i class="fa-solid fa-check"></i></a></td>'+
            '<td><a href="./delete-task.php?ID=<?=$task[\'ID\']?>" class="btn btn-danger btn-lg"><i class="fa-solid fa-xmark"></i></a></td>'+
            '<td><a class="btn btn-outline-primary btn-lg" href="./update-task.php?ID=<?=$task['ID']?>"><i class="fa-solid fa-pen-clip"></i></a></td>'+
            '</tr>';
            i++;
          }
          return str;
        });
      }
    }
  });
}
