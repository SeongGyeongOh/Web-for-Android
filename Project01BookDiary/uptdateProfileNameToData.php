<?php

    header("Content-Type:text/plain; charset=utf-8");

    $ID=$_POST['ID'];
    $profileName=$_POST['profileName'];

    $conn=mysqli_connect("localhost", "kamniang", "rhdiddl12!", "kamniang");

    $sql="UPDATE SharedReview SET profileName='$profileName' WHERE ID='$ID'";

    $Result=mysqli_query($conn, $sql);

    if($Result){
        echo "프로필 이름 업데이트 성공";
    }else echo "프로필 이름 업데이트 실패";

    mysqli_close($conn);

?>