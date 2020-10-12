<?php

    header("Content-Type:text/plain; charset=utf-8");

    //변수명 확인 필요
    $ID=$put['ID'];
    $profileImage=$put['profileImage'];

    $conn=mysqli_connect("localhost", "kamniang", "rhdiddl12!", "kamniang");
    // mysqli_query($conn, "set names utf8");

    $sql="UPDATE `SharedReview` SET dddddaass='$profileImage' WHERE ID='5555'";

    $result=mysqli_query($conn, $sql);

    if($result){
        echo "dd $result";
    }else echo "업데이트 실패";

    mysqli_close($conn);

?>