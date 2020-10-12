<?php

    header("Content-Type:text/plain; charset=utf-8");

    $nickName=$_POST['nickName'];
    $bookTitle=$_POST['bookTitle'];
    $bookAuthor=$_POST['bookAuthor'];
    $reviewTitle=$_POST['reviewTitle'];
    $reviewContent=$_POST['reviewContent'];
    $image=$_POST['image'];
    //작성 일자 추가하기
    $now=date("Y-m-d h:i");

    $conn = mysqli_connect("localhost", "kamniang", "rhdiddl12!", "kamniang");
    
    mysqli_query($conn, "set names utf-8");

    $sql = "INSERT INTO `$nickName`(image,bookTitle,bookAuthor,reviewTitle,reviewContent,date) VALUES('$image','$bookTitle','$bookAuthor','$reviewTitle','$reviewContent','$now')";
    $result = mysqli_query($conn, $sql);

    if($result) echo 'DB 저장 완료';
    else echo 'DB 저장 실패';

    mysqli_close($conn);

?>