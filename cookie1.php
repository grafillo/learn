<?php
//setcookie('counter',checkCookie());
//setcookie('token', "kukis" ,time()+5,'/','learn');
//setcookie('гуугл', "шмугл" ,time()+22200,'/','learn');


$entryForm =  '<form method="post" action="" enctype="multipart/form-data" class="form-label">
        Логин<br>
        <input type="text" name="login"><br />
        Пароль<br>
        <input type="password" name="password"><br /><br />
        <input type="submit" value="Отправить" class="btn btn-success">
    </form>';

$exitForm = '<form method="post" action="" enctype="multipart/form-data" class="form-label">
        <input name="exit" type="hidden" value="yes">
        <input type="submit" value="Выйти" class="btn btn-success">
    </form>';

$password = '123';
$token = md5($password);
$login = '1';

if (isset($_POST['exit']) && $_POST['exit'] === 'yes'){ // если атк не сделать то куки обновляются не сразу а после ещё одного обновления и форма будет исчезать
    setcookie('token', '' );                            // только после перезагрузки
    echo $entryForm;
}
elseif (isset($_COOKIE['token']) && $_COOKIE['token'] === $token ) {

        echo "Вы успешно вошли в систему!";
        echo $exitForm;

}elseif (isset($_POST['login']) && $_POST['login'] === $login && isset($_POST['password']) && $_POST['password'] == $password ){

        setcookie('token', $token );

        echo "Вы успешно вошли в систему!";
        echo $exitForm;
}

else {
    echo $entryForm;
}














?>






