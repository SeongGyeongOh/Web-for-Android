<?php

    header('Content-Type:text/plain; charset=utf-8');

    $ID=$_POST['ID'];

    $conn=mysqli_connect("localhost", "kamniang", "rhdiddl12!", "kamniang");
    mysqli_query($conn, "set names utf8");

    $sql="DROP TABLE $ID";

    $sql2="DELETE FROM SharedReview WHERE ID='$ID'";

    $result=mysqli_query($conn, $sql);
    $result2=mysqli_query($conn, $sql2);

    if($result&&$result2){
        echo "회원 탈퇴에 성공했습니다";
    }else echo "회원 DB에 접속할 수 없습니다.\n잠시 후 다시 시도해 주십시오 $ID";

    mysqli_close($conn);
?>