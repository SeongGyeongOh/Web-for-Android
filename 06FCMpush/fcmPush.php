<?php

    header("Content-Type:text/html; charset=utf-8");


    echo "FCM으로 push서버에 메세지를 전송합니다";

    //FCM 서버에 보낼 데이터는 크게 2종류이다
    //1: 메세지를 받을 디바이스의 고유 토큰값  2: 보낼 데이터  + 3: 서버 키

    //1. 보낼 토큰(값들의 배열)
    $tokens = array(
        "cJyr6MtRTPWTJvUFJpIBnF:APA91bFEBPtyGSj429IJH7ByiWlTYpWfzzuEI_HsoBoRnE_pDTI9mlTysVTQrS148HP0UTUgX6vfwtM-2RqV-nP-E1KYJgLroQL9ynSkkqdDuz02T1h-SaVk-sc4FsYOuNYy5290_ikm"
        );

    //2. 보낼 데이터
    $name = $_POST["name"];
    $msg = $_POST["msg"];
    //우선 연관배열로..
    $datas = array("name" => $name, "msg" => $msg);

    //FCM 서버에 보낼 데이터 2종류를 하나의 연관 배열로 만들자
    //키값은 정해져있음
    $postData = array(
        'registration_ids' => $tokens,
        'data' => $datas
    );

    //FCM서버는 자기가 받을 데이터를 json으로 받는다
    //위 $postData json으로 바꾸기
    $postDataJson = json_encode($postData);

    //3: FCM 서버에 접속할 수 있는 서버 키가 필요함
    //이 서버키를 Body에 보내는 게 아니라, header 정보로 보낸다!(파이어베이스의 경우임)
    //  FCM 서버로 요청할 때: 헤더정보 설정(배열)
    //1. 웹 서버키 : FCM에 접속할 수 있는 권한(FCM 콘솔에서 확인 가능)
    //2. 내가 보내는 데이터가 json형식이라고 표시
    $serverKey = "AAAAcKw75AQ:APA91bEliGR-nZjTzY4DE4EG3zwTyJMIKpL-tCoNtncMtOHJL-n5zNFhhaghpcpEpqCXpBJI6PXsm1T1mLx_Mmf6KNHNUWugRmXOaI18ks8GIwRJgBegY4hmZ37OH2H_wksuaAYy4Y0K";
    $headers = array(
        'Authorization:key= '.$serverKey,
        'Content-Type:application/json'
    );

    //이제 curl을 이용해서 전송작업 시작
    //1. curl 초기화
    $ch = curl_init();

    //2. 옵션 설정
    //  1) 요청 URL
    curl_setopt($ch, CURLOPT_URL, "https://fcm.googleapis.com/fcm/send"); //정해진 FCM 서버 주소
    //  2) 요청 결과 돌려받겠다
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //FCM 서버는 true, 아님 false 이렇게만 전달해줌
    //  3) 위에서 설정한 헤더정보 설정
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    //  4) POST 메소드로 보낼 json 데이터 설정
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postDataJson);

    //3. 실행
    $result = curl_exec($ch); 
    if($result===false){
        echo "실패" .curl_error($ch);
    }else echo "성공";

    //4. curl close
    curl_close($ch);
?>