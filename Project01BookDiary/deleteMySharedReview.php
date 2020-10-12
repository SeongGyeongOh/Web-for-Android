<?php

    header("Content-Type:text/plain; charset=utf-8");

    $no=$_POST['no'];

    $conn=mysqli_connect("localhost", "kamniang", "rhdiddl12!", "kamniang");

    $sql="DELETE FROM SharedReview WHERE no=$no";
    $result=mysqli_query($conn, $sql);
    
    if($result){
        echo "삭제되었습니다";
    }else echo "시류ㅐ";

    mysqli_close($conn);
    
?>