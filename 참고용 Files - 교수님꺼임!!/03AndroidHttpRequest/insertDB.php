<?php

    header('Content-Type:text/plain; charset=utf-8');

    $name= $_POST['name'];
    $message= $_POST['msg'];
    $now= date('Y-m-d h:i');//"2020-06-17 01:49"

    //DB의 board2 테이블에 저장
    //1. DB서버에 접속
    $conn= mysqli_connect("localhost","mrhi2020","a1s2d3f4!","mrhi2020");

    //2. 한글깨짐 방지
    mysqli_query($conn, "set names utf8");

    //3. 원하는 쿼리문 작성
    $sql="INSERT INTO board2(name,msg,date) VALUES('$name','$message','$now')";
    
    //4. 쿼리문 실행
    $result= mysqli_query($conn, $sql);

    if($result) echo "insert success : $name";
    else echo "insert fail : $name";

    //5. DB연결 닫기
    mysqli_close($conn);



?>