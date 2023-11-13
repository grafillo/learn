<?php

$htmlHeader = 'Редактирование статьи';


checkAutorization($connect);

function checkPolicy(int $articleId, $connect,$idUser,$typeUser):bool
{

    $sql = "SELECT * FROM articles WHERE id='$articleId ' ";
    $result = mysqli_query($connect, $sql);
    $result = mysqli_fetch_assoc($result);

if ( ! empty($result) && $result['author_id'] === $idUser
    || ! empty($result) && $typeUser === 'admin'
) {
    return true;

}else{

    die("Доступ запрещён!");
}

}


if ( ! empty($_GET['delete_id'])) {

    checkPolicy($_GET['delete_id'],$connect,$idUser,$typeUser);

        $articleId=$_GET['delete_id'];
        $sql = "DELETE FROM articles WHERE id ='$articleId'";
        $result = mysqli_query($connect, $sql);

        $htmlBody =  "<div class=' text-bg-success text-center mb-4 border'>
        Статья успешно удалена
    </div>";


}elseif ( ! empty($_GET['update_id']) || isset($_GET['add_article'])){//выводит html изменить статью и доавить новую статью


    $title = '';
    $text = '';
    $tagsArticle = [];
    $tagsHtml = "";
    $articleId = "";
    $buttonName = "Добавить статью";
    $keyAction = "add_article";

    if(! empty($_GET['update_id'])) {

        $keyAction = 'update_id';
        checkPolicy($_GET['update_id'],$connect,$idUser,$typeUser);
        $articleId = $_GET['update_id'];
        $buttonName = "Обновить статью";


        $sql = "SELECT * FROM articles WHERE id='$articleId ' ";
        $result = mysqli_query($connect, $sql);
        $result = mysqli_fetch_assoc($result);

        if ( ! empty($result)) {

            $tagsArticle = manyToMany($_GET['update_id'], $connect);
            $title = $result['title'];
            $text = $result['text'];

        }
    }


    $sql = "SELECT * FROM tags ";
    $tags = mysqli_query($connect, $sql);
    $tags = mysqli_fetch_all($tags, MYSQLI_ASSOC);


    foreach ($tags as $tag){

        $name = $tag['tag'];
        $tagId = $tag['id'];
        $tagsHtml .= "<input type='checkbox' id='tags' name='$tagId' " .checkTag($tagId,$tagsArticle)  .">$name<br>";
    }


$htmlBody = "  <div class='row bg-white mb-4 border'>
<form method='post' action='main.php'
      enctype='multipart/form-data'
      class='form-label'>
    <input name='$keyAction' type='hidden' value='$articleId'>
    Заголовок<br>
    <input type='text' name='title'
           value=$title ><br>
    Текст<br>
    <textarea name='text' rows='4' cols='100'>$text</textarea><br>
    Выберите тэги:<br>
    $tagsHtml
  
    <input type='submit' value='$buttonName' class='btn btn-success'>
</form>
</div>";


}elseif(!empty($_POST['update_id'])) {

    checkPolicy($_POST['update_id'],$connect,$idUser,$typeUser);

    $text = $_POST['text'];
    $title = $_POST['title'];
    $articleId = $_POST['update_id'];


    $sql = "UPDATE articles SET text='$text', title='$title' WHERE id='$articleId'";
    $result = mysqli_query($connect, $sql);

    $sql = "DELETE FROM articles_tags WHERE  article_id='$articleId'";
    $result = mysqli_query($connect, $sql);


    addTags($_POST,$articleId, $connect );


    $htmlBody = "  <div class=' text-bg-success text-center mb-4 border'>
     Статья успешно обновлена!
    </div>";


}elseif (isset($_POST['add_article'])){


    $text = $_POST['text'];
    $title = $_POST['title'];


    $sql = "INSERT INTO articles SET text='$text', title='$title', author_id='$idUser'";
    $result = mysqli_query($connect, $sql);
    $articleId = mysqli_insert_id($connect);

    addTags($_POST,$articleId, $connect );


    $htmlBody = "  <div class=' text-bg-success text-center mb-4 border'>
     Статья успешно добавлена!
    </div>";
}



function checkTag(int $tagID, array $tagsArticle)
{
    foreach ($tagsArticle as $tag) {

        if ($tag['tag_id'] == $tagID) {
             return 'checked';
        }
    }

}


function addTags(array $post,int $articleId, $connect):void
{
    $tags = [];
    foreach($_POST as $key => $value){

        if($value == 'on'){
            $tags[] = $key;

        }

    }

    foreach($tags as $value) {

        $sql = "INSERT INTO articles_tags SET tag_id ='$value',article_id='$articleId'";
        $result = mysqli_query($connect, $sql);
    }

}


?>




