<?php

    header('Content-Type:application/json; charset=utf-8');

    //@Body를 보낸 데이터는 json으로 전달되어 오기에
    //$_POST[], $_GET[] 이런 연관배열 변수에서 직접 받을 수 없음

    //보내온 json을 읽어오기
    $data= file_get_contents("php://input");
    //json -> 연관배열
    $put = json_decode($data, true);

    //레코드 식별을 위해 no값과 변경할 데이터 favor만 사용
    $no= $put['no'];
    $favor= $put['favor'];

    //DB 업데이트
    $conn= mysqli_connect('localhost', 'mrhi2020', 'a1s2d3f4!', 'mrhi2020');
    mysqli_query($conn, "set names utf8");

    if($favor) $sql= "UPDATE market SET favor=1 WHERE no=$no";
    else $sql= "UPDATE market SET favor=0 WHERE no=$no";

    mysqli_query($conn, $sql);
    mysqli_close($conn);

    echo $data; //클라이언트로 부터 받았던 json데이터를 그대로 리턴





?>