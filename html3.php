<?php



$name= 'Vasya';
$lastname= 'Sas';

if(isset($_POST['name']) && $_POST['name']===$name && $_POST['lastname']===$lastname) {
    echo '<br> вы вошли как' . $_POST['name'] . $_POST['lastname'];
}else{
    echo 'нет такого пользователя';
}





