<?php

    header('Content-Type:text/plain; charset=utf-8');

    $conn= mysqli_connect("localhost", "mrhi2020", "a1s2d3f4!", "mrhi2020");
    mysqli_query($conn, "set names utf8");

    $sql="SELECT * FROM board2";
    $result= mysqli_query($conn, $sql);
    
    //총 레코드(row) 수
    $row_num= mysqli_num_rows($result);

    for($i=0; $i<$row_num; $i++){
        $row= mysqli_fetch_array($result, MYSQLI_ASSOC);


        echo $row['no']."&".$row['name']."&".$row['msg']."&".$row['date'].";";
    }

    mysqli_close($conn);

?>