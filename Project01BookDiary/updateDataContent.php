<?php

    header("Content-Type:text/plain; charset=utf-8");

    $nickName = $_POST["nickName"];
    $reviewTitle =$_POST['reviewTitle'];
    $reviewContent =$_POST['reviewContent'];
    $bookTitle=$_POST['bookTitle'];

    $conn=mysqli_connect("localhost", "kamniang", "rhdiddl12!", "kamniang");

    $sql="UPDATE `$nickName` SET reviewTitle='$reviewTitle', reviewContent='$reviewContent' WHERE bookTitle='$bookTitle'";

    $result = mysqli_query($conn, $sql);

    if($result){
        echo "DB 업데이트 완료";
    }

    mysqli_close($conn);

    
?>