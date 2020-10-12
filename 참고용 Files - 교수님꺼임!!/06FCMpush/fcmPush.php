<?php

    header('Content-Type:text/html; charset=utf-8');
    echo "FCM push서버에 메세지를 전송합니다.";

    //FCM 서버에 보낼 데이터
    //1. 메세지를 받을 디바이스의 고유 토큰값들 배열 - 원래 이 값들은 DB에 있어야 함
    //2. 보낼 데이터

    $tokens= array(
        'cV8VLx6eToWkBAGTPaV3Gy:APA91bEwFp3iymsNgUlFDE_gbJNwCJHCMFnWGaZMqNKUpo7-oxSyXOa6ZzQjQV-FmiAX3l5FtuHOXwE6aN2Tg4Cqj37KCOt55H4B_NwM5Ikm4lJU_eOfaDr7--8EoaFfpxlc3gACtzWA'
    );

    //보낼 메세지
    $name= $_POST['name'];
    $msg= $_POST['msg'];
    $data= array("name"=>$name, "msg"=>$msg);

    //FCM 서버에 보낼 데이터 2종류를 다시 하나의 연관배열로
    $postData= array(
        'registration_ids'=> $tokens,
        'data'=>$data
    );
    //FCM서버는 본인에게 보낼 데이터를 json으로 보내도록 되어있음.
    //연관배열 -> json
    $postDataJson= json_encode($postData);

    //위 데이터를 FCM에 보내려면
    //FCM서버에 접속하는 접속 서버key 가 필요함
    //서버키 Body에 보는 것이 아니라 Header정보로 보냄
    //FCM서버로 요청할 때 헤더정보 설정- 배열로
    //1. 웹 서버키 : FCM에 접속할 수 있는 권한 키(프로젝트 콘솔에서 확인)
    //2. 내가 보내는 데이터가 json형식이라고 표시
    $serverKey= 'AAAAvfGbDzM:APA91bGaRnJsFPtdsy44X-R9687IDv4mqUFV1S_6_uxnH19DVtyH-GoWbjox_0aEhkECwJGlWTT3EOABmfzboT1den5Gamos7_jqpwvr6rcoLq2Mdq6f0oswzOiYamsUTog9MLmmNcNg';
    $headers= array(
        'Authorization:key=' . $serverKey,
        'Content-Type:application/json'
    );

    //curl을 통해 전송작업

    //CURL 초기화
    $ch= curl_init();

    //옵션들 설정
    //1)요청 URL
    curl_setopt($ch, CURLOPT_URL, "https://fcm.googleapis.com/fcm/send");

    //2)요청 결과 돌려받겠다는 설정
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //3)위에서 설정했던 Header정보 설정
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    //4)POST메소드로 보낼 json데이터를 설정
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postDataJson );

    //실행
    $result= curl_exec($ch);
    if($result === false ){
        echo "실패 : " . curl_error($ch);
    }

    //close
    curl_close($ch);



?>