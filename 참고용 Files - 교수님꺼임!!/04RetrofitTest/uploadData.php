<?php

    header('Content-Type:text/plain; charset=utf-8');

    $name= $_POST['name'];
    $msg= $_POST['msg'];

    $file= $_FILES['img'];
    $fileName= $file['name'];
    $fileSize= $file['size'];
    $tmpName= $file['tmp_name'];

    echo "response : \n";
    echo "$name \n";
    echo "$msg \n";
    echo "$fileName \n";
    echo "$fileSize \n";
    echo "$tmpName \n";


?>