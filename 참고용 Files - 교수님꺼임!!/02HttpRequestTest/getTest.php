<?php

    // 한글깨짐 방지
    header('Content-Type:text/html; charset=utf-8');

    //php의 변수는 $변수명;
    //$_GET : 사용자가 GET방식으로 보내온 데이터들을 받은 배열변수
    $name= $_GET['name'];
    $message= $_GET['msg'];

    //받아온 데이터 확인하기 위해 출력 [ .연산자 : 문자열 결합 연산자 ]
    echo "Name : " . $name . "<br>";
    echo "Message : " . $message ;

?>