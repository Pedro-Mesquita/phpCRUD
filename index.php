<!DOCTYPE html>

<?php 
  include './db.php';
  $page = (isset($_GET['page']) ? $_GET['page'] : 1);
  $perPage = (isset($_GET['per-page']) && ($_GET['per-page']) <= 50 ? $_GET['per-page'] : 5);
  $start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

  $sql = "SELECT * FROM tasks LIMIT ". $start." , ".$perPage. " ";

  $total = $db->query("SELECT * FROM tasks")->num_rows;

  $pages = ceil($total/$perPage);

  $rows = $db->query($sql);
  $row = $rows->fetch_all()

?>



<html>

<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>CRUD</title>
</head>

<body>
  <!-- Modal -->
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <center>
          <h2 style="margin-top: 20px;">add task</h2>
        </center>
        <form  method="post" action="add.php">
          <div class="form-group">
            <label> Taks name:</label>
            <input type="text" style="margin-bottom: 20px;" required name="task" class="form-control">
          </div>
          <center>
            <input type="submit" style="margin-bottom: 20px; width: 80px; height:40px;" name="send" value="add task" class="btn btn-success">
          </center>
        </form>

      </div>
    </div>
  </div>
  <!-- Modal -->

  <div class="container">
    <div class="row">
      <center>
        <h1 style="margin-top: 50px; margin-bottom: 50px;">To do List</h1>
        <button onclick="document.getElementById('id01').style.display='block'" style="width: 80px; height:40px; margin-right: 900px;" type="button" class="btn btn-success">Add</button>
        <div style="margin-top: 20px;" class="col-md-10 col-md-offset-1">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Task</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php 
                  foreach($row as $task){
                    echo("
                    <th scope='row'> " . $task[0] . "</th>
                    <td class='col-md-10'>" . $task[1] . "</td>
                    <td><a href='update.php?id=" . $task[0] . "' class='btn btn-success'>Edit</a></td>
                    <td><a href='delete.php?id=" . $task[0] . "' class='btn btn-danger'>Remove</a></td>
                  </tr>
                    ");
                  }
                ?>
            </tbody>
          </table>
          
          <ul class="pagination"> 
          
          <?php 
          for($i = 1; $i <= $pages; $i++){

             echo ("<li style='margin-right: 20px; '><a href='?page=" . $i . "'>" . $i ."</a></li>");  
          
          }?>
             
          </ul>
        </div>
      </center>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>