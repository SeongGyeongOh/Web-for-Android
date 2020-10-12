<?php

    header('Content-Type:text/plain; charset=utf-8');

    $name= $_POST['name'];
    $title= $_POST['title'];
    $msg= $_POST['msg'];
    $price= $_POST['price'];

    $srcName = $_FILES['img']['name'];
    $fileSize = $_FILES['img']['size'];
    $tmpName = $_FILES['img']['tmp_name'];

    // echo "$name \n";
    // echo "$title \n";
    // echo "$msg \n";
    // echo "$price \n";
    // echo "$srcName \n";
    // echo "$fileSize \n";
    // echo "$tmpName \n";

    // 임시저장소에 있는 업로드된 파일을 영구저장소로 이동
    $dstName= "uploads/" . date('YmdHis') . $srcName;
    move_uploaded_file($tmpName, $dstName);

    $favor= 0; //'좋아요' 여부 [true,false 대신에 1, 0 저장]
    $now= date('Y-m-d A H:i:s');


    //DB market테이블에 데이터 저장
    $conn= mysqli_connect('localhost', 'mrhi2020', 'a1s2d3f4!', 'mrhi2020');
    mysqli_query($conn, "set names utf8");

    //원하는 쿼리문작성 [주의 : tinyint(1) 는 value 입력시에 ''가 없어야 함 ]
    $sql= "INSERT INTO market(name, title, msg, price, file, favor, date) VALUES('$name','$title','$msg','$price','$dstName',$favor,'$now')";
    $result= mysqli_query($conn, $sql);

    if($result) echo "게시글이 업로드 되었습니다.";
    else echo "업로드에 실패했습니다. 다시 시도해 주세요";

    mysqli_close($conn);
    
?>