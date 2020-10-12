<?php

    header('Content-Type=text/plain; charset=utf-8');

    $tableName = $_POST['id']; 
    
    $conn = mysqli_connect("localhost", "kamniang", "rhdiddl12!", "kamniang");

    mysqli_query($conn, "set names utf8");

    $sql = "CREATE TABLE IF NOT EXISTS `$tableName`(no INT primary key auto_increment, image TEXT, bookTitle TEXT, bookAuthor TEXT, reviewTitle TEXT, reviewContent TEXT, date DATE)";

    $result = mysqli_query($conn, $sql);

    if($conn->query($sql)===TRUE){
        echo "Table Create Success";
    }else {
        echo "$nickName";
        echo "Error creating table: " . $conn->error;
    }
    
    mysqli_close($conn);

?>