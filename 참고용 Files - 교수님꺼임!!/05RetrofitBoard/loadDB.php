<?php

    header('Content-Type:application/json; charset=utf-8');

    $conn= mysqli_connect('localhost', 'mrhi2020', 'a1s2d3f4!', 'mrhi2020');
    mysqli_query($conn, "set names utf8");

    $sql= "SELECT * FROM market";
    $result= mysqli_query($conn, $sql);

    //결과표($result)의 총 레코드 수
    $row_num= mysqli_num_rows($result);

    //여러줄을 읽어야 하므로 각 줄($row 배열)요소를 가질 인덱스배열 준비
    $rows= array();
    for($i=0; $i<$row_num; $i++){
        $row= mysqli_fetch_array($result, MYSQLI_ASSOC);
        $rows[$i]= $row;
    }

    //2차원배열 --> json array 로 변환
    echo json_encode($rows);

    mysqli_close($conn);

?>