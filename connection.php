<?php 
    $conn = mysqli_connect("localhost", "root", "","todo");
    mysqli_set_charset($conn,"UTF8");
    date_default_timezone_set("Asia/Bangkok");
    if($conn->connect_error> 0){
        echo "Failed to connect to MySQL:" . mysqli_connect_error();
    }
?>