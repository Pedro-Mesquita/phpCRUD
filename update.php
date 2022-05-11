<!DOCTYPE html>

<?php
include './db.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id='" . $id  . "'";
    $val = $db->query($sql);
    $row = $val->fetch_assoc();

    if(isset($_POST['send'])){
        $task = $_POST['task'];
        $sql = "UPDATE tasks SET name ='$task' WHERE id='$id'";
        $db->query($sql);
        header('location: index.php');
    }

?>

<html>

<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>CRUD</title>
</head>

<body>

  <div class="container">
    <div class="row">
      <center>
        <h1 style="margin-top: 50px; margin-bottom: 50px;">To do List - Update</h1>
        <div style="margin-top: 20px;" class="col-md-10 col-md-offset-1">
        </div>

        <form  method="post">
          <div class="form-group">
            <label> Taks name:</label>
            <input type="text" style="margin-bottom: 20px;" required name="task" class="form-control" value="<?php echo $row['name']; ?>">
          </div>
          <center>
            <input type="submit" style="margin-bottom: 20px; width: 80px; height:40px;" name="send" value="edit task" class="btn btn-success">
          </center>
        </form>

      </center>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>