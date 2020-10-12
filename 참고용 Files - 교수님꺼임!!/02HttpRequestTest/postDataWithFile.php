<?php

    header('Content-Type:text/html; charset=utf-8');

    $name= $_POST['name'];
    $message= $_POST['msg'];

    $file= $_FILES['img']; //업로드된 파일의 정보를 가진 배열
    $srcName= $file['name'];
    $tmpName= $file['tmp_name'];
    $fileSize= $file['size'];

    //업로드된 파일이 최종저장될 파일 위치와 파일명
    $fileName= date('Ymdhis') . $srcName;
    $dstName= "./uploads/" . $fileName;

    if(  move_uploaded_file($tmpName, $dstName)  ){
        echo "upload success";
    }else{
        echo "upload fail";
    }

    //값들이 잘 되어있는지 확인
    echo "<br><br>";
    echo "$name <br>";
    echo "$message <br>";
    echo "$dstName <br>";
    echo "$fileSize <br>";

    //게시글이 저장되는 날짜
    $now= date('Y-m-d h:i'); //"2020-06-17 09:18"

    //MySQL DB에 저장하기 [board 테이블에 저장]
    //저장할 데이터 : $name, $message, $dstName, $now [no는 Auto Increment]

    //MySQL DB에 접속하기
    $conn= mysqli_connect("localhost","mrhi2020","a1s2d3f4!","mrhi2020");//DB주소, DB접속아이디, DB접속패스워드, DB명

    //한글깨짐 방지(MySQL의 기본 문자인코딩방식이 utf-8이 아님)
    mysqli_query($conn, "set names utf8");

    //$message 변수안에 특수문자( ' 작은 따옴표 같은 것이 있으면 문자열종료로 보고 잘못처리 함.) - 예) I'm robin
    //특수문자앞에 자동으로 역슬래시를 표시해주는 메소드가 존재함
    $message= addslashes($message);

    //저장할 데이터들을 SQL언어를 이용하여 DB에 저장
    $sql="INSERT INTO board(name, msg, file, date) VALUES('$name','$message','$dstName','$now')";
    $result= mysqli_query($conn, $sql);
    if($result){
        echo "insert success";
    }else{
        echo "insert fail";
    }

    //DB연결 종료
    mysqli_close($conn);   


?>