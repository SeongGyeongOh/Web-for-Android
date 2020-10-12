<?php

    $file= $_FILES['img'];

    // 받은 파일 1개의 정보는 파일명, 확장자, 사이즈, 임시파일 저장경로 등 여러정보가 있기에
    // $file변수는 배열임.

    $srcFileName= $file['name']; //업로드된 파일의 원본파일명.확장자 [moana01.png]
    $fileSize= $file['size'];    //업로드된 파일의 데이터 사이즈 : byte수
    $fileType= $file['type'];    //업로드된 파일의 MIME타입("image/png") 문자열 리턴
    $tmpFileName= $file['tmp_name']; //업로드된 파일이 임시로 저장된 곳의 경로및 파일명

    //임시파일로 저장된 업로드 된 파일 데이터는 프로그램이 종료되면
    //소멸되므로 서버에 영구적으로 저장하기 위해 원하는 HDD(html폴더)위치로 이동

    // 이동시킬 목적지 경로
    // 같은 이름이 있으면 덮어쓰기 됨
    // 그래서 보통 업로드된 날짜를 파일명에 사용함
    $fileName= date('Ymdhis') . $srcFileName; //"20200616133125moana01.jpg"
    $dstName= './uploads/' . $fileName ;

    $result= move_uploaded_file($tmpFileName, $dstName);
    if($result){
        echo "uploaded success";
    }else{
        echo "uploaded fail";
    }

    echo "<br>";
    echo "$srcFileName<br>";
    echo "$fileSize<br>";
    echo "$fileType<br>";
    echo "$tmpFileName<br>";
    echo "$dstName<br>";

?>