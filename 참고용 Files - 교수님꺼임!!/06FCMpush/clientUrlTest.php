<?php

    header('Content-Type:text/html; charset=utf-8');

    echo "client URL library를 통해 post메세지를 다른 서버에 전송<br><br>";

    //다른 서버의 test.php에 보낼 데이터들 배열(연관배열)
    $postData= array("name"=>"SAM", "msg"=>"Hello android");

    //curl 라이브러리(PHP에서 다른 서버에 요청하는 라이브러리) 객체 생성
    $ch= curl_init();

    //curl에 설정하는 옵션들
    //1. 요청할 서버 주소 URL
    curl_setopt($ch, CURLOPT_URL, "http://mrhi2020.dothome.co.kr/FCM/test.php" );

    //2. 요청의 응답을 받겠다 라는 설정
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //3. POST로 보낼 데이터들 설정
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData );//연관배열을 전송

    //설정했으니 curl 작업 실행
    $result= curl_exec($ch); //실행된 서버에서 응답한 결과(echo)가 리턴

    if($result === false){
        echo "실패 : " . curl_error($ch) . "<br>";
    }else{
        echo "성공 : " . $result . "<br>";
    }

    curl_close($ch);





    


?>