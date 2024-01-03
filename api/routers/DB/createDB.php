<?php
    $conn = new mysqli("127.0.0.1", "root", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        exit;
    }
    $sql = "CREATE DATABASE IF NOT EXISTS DB_FOR_PROJ";
    if($conn -> query($sql)){}
    else{
        echo "ERROR";
        exit;
    }
    $sql = "CREATE TABLE IF NOT EXISTS DB_FOR_PROJ.user(id INT AUTO_INCREMENT PRIMARY KEY,name varchar(255),email varchar(255) UNIQUE,hash varchar(255),password varchar(255),is_active TINYINT(1));";
    if($conn -> query($sql)){}
    else{
        echo "ERROR " . $conn->error;
        exit;
    }
?>