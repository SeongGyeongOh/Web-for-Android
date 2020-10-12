<?php

    header('Content-Type:text/html; charset=utf-8');

    $name= $_POST['name'];
    $message= $_POST['msg'];

    echo "이름 : $name <br>";
    echo "메세지 : $message";

?>