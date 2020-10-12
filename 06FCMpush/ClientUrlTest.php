<?php
    header("Content-Type:text/html; charset=utf-8");
    
    echo "Client URL Library를 통해 post 메세지를 다른 서버에 전송<br><br>";

    //다른 서버의 test.php에 보낼 데이터 배열
    $postData = array("name" =>"SAM", "msg"=>"Hello Android"); //연관배열

    //curl 라이브러리 객체 생성(다른 서버와 연결할 수 있는 라이브러리)
    //curl : php에서 다른 서버에 요청하는라이브러리!
    $ch = Curl_init();
    

    //curl에 설정할 옵션들
    //1. 요청할 서버 주소 URL
    curl_setopt($ch, CURLOPT_URL, "http://kamniang.dothome.co.kr/FCM/test.php");
    
    //2. 요청의 응답을 받겠다는 표시
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //3.POST로 보낼 데이터들 설정
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData); //연관배열 보내기


    //설정했으니 curl 작업 실행
    $result = curl_exec($ch); //실행된 서버에서 응답(echo)한 결과가 리턴됨


    if($result == false){
        echo "실패하뮤.ㅠ /: ".curl_error($ch). "<br>";
    }else{
        echo "성공 : " .$result."<br>";   
    }

    curl_close($ch);

?>