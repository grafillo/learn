<?php
$firstname ='';
$lastname = '';
$htmlHeader = 'Регистрация';

if(!empty($_POST['firstname'])){
    $firstname = $_POST['firstname'];
}

if(!empty($_POST['lastname'])){
    $lastname = $_POST['lastname'];
}


//смотреть чтобы не были одинаковые имена перменных с сайд баром name='reg_email'
$htmlBody = "  <div class='row bg-white mb-4 border text-center'>
<form method='post' action='main.php'
      enctype='multipart/form-data'
      class='form-label'>
      Имя<br>
    <input name='firstname'  type='text' value='$firstname'><br>
     Фамилия<br>
    <input name='lastname'  type='text' value='$lastname'><br>
     Email<br>
    <input name='reg_email'  type='text'><br>
    Password<br>
    <input name='reg_password'  type='password'>
      <br>
    <input type='submit' value='Зарегистрироваться' class='btn btn-success mt-3'>
</form>
</div>";



if(!empty($_POST['reg_email'])){ // сделать проверку на заполненность полей
    $email = $_POST['reg_email'];
    $password = hash('sha1', $_POST['reg_password']);

    if(empty($firstname) || empty($firstname)){

        $htmlBody = "<h4 class='text-danger'> Поля Имя и Фамиля  обязательны для заполнения </h4>" .  $htmlBody ;
    } else {

        $sql = "SELECT * FROM authors WHERE email='$email'";
        $result = mysqli_query($connect, $sql);
        $result = mysqli_fetch_assoc($result);


        if(!$result) {

            $sql= "INSERT INTO authors SET firstname='$firstname', lastname='$lastname', password='$password', user_type = 'unconfirm', email ='$email'";
            mysqli_query($connect, $sql);
            mail($email,"Подтвердите регистрацию","Для подтвреждения регистрации перейдите по ссылке: http://learn/mysql/main.php?registration=confirm&user=$password");
            $htmlBody = "<h4 class='text-success text-center'> Благодарим за регистрацию активируйте ваш  аккаунт по ссылке в письме.</h4>";

        }else {
            $htmlBody = "<h4 class='text-danger'> Пользователь с таким EMAIL уже зарегестрирован</h4>" .  $htmlBody ;
        }

    }


}

if(!empty($_GET['user'])){ // сделать проверку на есть ли такой пользователь

    $user = $_GET['user'];
    $sql = "UPDATE authors SET user_type='user' WHERE password='$user'";
    mysqli_query($connect, $sql);
    $htmlBody = "<h4 class='text-success text-center'> Ваш аккаунт успешно активирован.</h4>";


}






