<?php   session_start(); include "connection.php"; 

    $todo_id = $_GET['todo_id'];
    $sql = "DELETE FROM `todo_list` WHERE `todo_id`=$todo_id";
    $result = mysqli_query($conn,$sql);
    
    echo "<script>window.location='index.php';</script>";

?>