<?php

    $fileInfo= $_FILES['img'];

    $name= $fileInfo['name'];
    $size= $fileInfo['size'];
    $tmpName= $fileInfo['tmp_name'];

    echo "응답 : \n";
    echo "$name \n";
    echo "$size \n";
    echo "$tmpName \n";

    $dstName= "IMG_" . $name;

    //잘되었다면 임시저장소의 파일을 영구저장소(html폴더영역)로 이동
    move_uploaded_file($tmpName, $dstName);






?>