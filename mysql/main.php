<?php
$connect = mysqli_connect("localhost", "root", "", "lesson_bd");

$htmlBody = '';
$htmlHeader = '';
$typeUser = '';
$idUser = '';

require_once('side_bar.php');


function checkAutorization($connect){

    if (isset($_COOKIE['token'])) {

        $token = $_COOKIE['token'];
        $sql = "SELECT * FROM authors WHERE token = '$token'";
        $result = mysqli_query( $connect, $sql);
        $result = mysqli_fetch_assoc($result);

        if (!empty($result) && $result['token_expired'] > time()) {

            $typeUser = $result['user_type'];
            $idUser = $result['id'];

        }


    }else {
        die('Доступ ЗАПРЕЩЁН!');
    }
}

function manyToMany(int $articleId, $connect):array //возвращает массив тэгов
{

    $sql = "SELECT tag,tag_id FROM articles JOIN articles_tags ON articles.id = articles_tags.article_id
    JOIN tags ON articles_tags.tag_id = tags.id
    WHERE articles.id='$articleId' ";

    $result = mysqli_query($connect, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $result;

}



if(!empty($_GET['delete_id']) || !empty($_GET['update_id']) || !empty($_POST['update_id']) || isset($_GET['add_article'])
|| isset($_POST['add_article'])){

    require_once ('update.php');


}elseif(!empty($_GET['admin'])){

    require_once ('authors.php');

}elseif(!empty($_GET['registration']) || isset($_POST['reg_email']) ){

    require_once ('registration.php');

}
else{

    require_once('article.php');

}

//echo '<pre>';
//print_r(manyToMany(2,$connect));


//echo '<pre>';
//print_r($result);



?>


<html>
<head xmlns="http://www.w3.org/1999/html">
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</head>
<body>


<div class="container bg-body-tertiary p-0 ">

    <div class=" text-bg-primary text-center p-3">
        <h2><?php echo $htmlHeader; ?></h2>
    </div>

    <div class="row p-5 ">

        <div class='col-9 col '>


         <?php echo $htmlBody; ?>


        </div>


        <div class="col-3 col text-right  bg-body-tertiary ">
            <a href='http://learn/mysql/main.php' class='btn btn-primary'>На главную</a>
            <?php echo $sideBar; ?>
        </div>
    </div>
</div>


</body>
</html>
