<?php

include './db.php';

     if(isset($_POST['send'])){
         $name = $_POST['task'];
         $sql = "INSERT INTO tasks (name) values('$name')";
         $val = $db->query($sql);
         if($val){
             header('location: index.php');
         }
     }
?>