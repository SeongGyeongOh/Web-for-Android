<?php

    header('Content-Type:text/plain; charset=utf-8');

    $name= $_POST['name'];
    $message= $_POST['msg'];

    echo "name : $name \n";
    echo "message : $message"; 


?>