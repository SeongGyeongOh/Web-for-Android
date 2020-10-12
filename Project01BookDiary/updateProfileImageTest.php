<?php

    header("Content-Type:text/plain; charset=utf-8");

    $ID=$_POST['ID'];
    $profileImage=$_POST['profileImage'];

    $conn=mysqli_connect("localhost", "kamniang", "rhdiddl12!", "kamniang");

    $sql="UPDATE SharedReview SET profileImage='$profileImage' WHERE ID='$ID'";

    $result=mysqli_query($conn, $sql);

    if($result){
        echo "성공 $result";
    }else{
        echo "실패";
    }

    mysqli_close($conn);


?>