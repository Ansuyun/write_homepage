<?php
    error_reporting(1);
    ini_set("display_errors",1);

    $conn = mysqli_connect("localhost","root","root","DB");
    
    if(mysqli_error()){
        echo "mysql 접속중 오류 발생";
        echo mysqli_error();
    }
?>