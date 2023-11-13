<?php

//print_r (getallheaders());



$token = 'fgfdgdfgdfgdf';

if(!empty(getallheaders()['token'])){

    die('вы вошли по токену!');

}


if(!empty($_POST['login']) && !empty($_POST['password']) ){

    if ($_POST['login'] == 'admin' &&  $_POST['password'] == '1234'){
        echo json_encode(['token'=>$token],JSON_UNESCAPED_UNICODE);
    }else{
        echo json_encode(['error'=>'логин или пароль указаны неверно'],JSON_UNESCAPED_UNICODE);
    }

}else {
    echo json_encode(['error'=>'укажите пароль и логин'],JSON_UNESCAPED_UNICODE);
}


