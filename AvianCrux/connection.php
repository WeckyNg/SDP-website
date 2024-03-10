<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "avian_crux_database";

    $conn = mysqli_connect($host,$username,$password,$database);

    if(mysqli_connect_errno()){
        die('<script>alert("Connection Failed, Please check your SQL connection.");</script>');
    }
?>