<?php

    header("Content-Type:text/plain; charset=utf-8");

    $tableName=$_POST['tableName'];
    $no=$_POST['no'];

    $conn=mysqli_connect("localhost", "kamniang", "rhdiddl12!", "kamniang");

    mysqli_query($conn, "set names utf8");

    $sql="DELETE FROM `$tableName` WHERE no='$no'";

    $result=mysqli_query($conn, $sql);

    if($result){
        echo "삭제되었습니다";
    }else echo "삭제 실패";

    mysqli_close($conn);


?>