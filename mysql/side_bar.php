<?php

$tokenExpiredSecond = 3600;


if ( ! empty($_POST['email']) && ! empty($_POST['password'])) {



    $password = hash('sha1', $_POST['password']);
    $email = $_POST['email'];
    $sql = "SELECT * FROM authors WHERE password = '$password' AND email='$email'";
    $result = mysqli_query($connect, $sql);
    $result = mysqli_fetch_assoc($result);

    if (!empty($result)) {

        $token = hash('sha1', $password.time());
        $cookieTime = time() + $tokenExpiredSecond;
        $tokenExpired = date('Y-m-d H:i:s', $cookieTime);
        $authorId = $result['id'];

        $sql = "UPDATE authors  SET token='$token', token_expired='$tokenExpired' WHERE id='$authorId'";
        mysqli_query($connect, $sql);

        setcookie('token', $token, $cookieTime);
        $typeUser = $result['user_type'];
        $idUser = $result['id'];


    }else{

        echo "Неверный пароль";

    }


}


if (isset($_COOKIE['token'])) {

    $token = $_COOKIE['token'];
    $sql = "SELECT * FROM authors WHERE token = '$token'";
    $result = mysqli_query($connect, $sql);
    $result = mysqli_fetch_assoc($result);

    if (!empty($result) && $result['token_expired'] > time()) {

        $typeUser = $result['user_type'];
        $idUser = $result['id'];

    }


}

if (isset($_GET['exit'])) {

    $typeUser = '';
    $idUser = '';
    setcookie('token', "", time()-1);

}

$sideBarUnreg = "
<form method='post' action='main.php' enctype='multipart/form-data'
          class='form-label'>
        Email<br>
        <input type='text' name='email'
               >
<br>Пароль<br>
<input type='password' name='password'>
<br>
<input type='submit' value='Войти' class='mt-3 btn btn-success'>
</form>
<a href='main.php?registration=1'>Регистрация</a>
";
$sideBarUser = "<br><a href='http://learn/mysql/main.php?author_id=$idUser' class='btn btn-primary mt-2'>Мои статьи</a> <br>
<a href='http://learn/mysql/main.php?add_article' class='btn btn-primary mt-2'>Добавить статью</a> <br>
<a href='http://learn/mysql/main.php?exit ' class='btn btn-danger mt-2'>Выход</a>";
$sideBarAdmin = "<br><a href=http://learn/mysql/authors.php class='btn btn-primary mt-2'>Авторы</a> <br>
<a href='http://learn/mysql/main.php?exit ' class='btn btn-danger mt-2'>Выход</a>";

switch ($typeUser) {//сюда вставить унконфирмед когда не подвтердил емэил
    case 'user':
        $sideBar=$sideBarUser;
        break;
    case 'admin':
        $sideBar=$sideBarAdmin;
        break;
    default:
        $sideBar=$sideBarUnreg;
        break;
}