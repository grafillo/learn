<?php

$htmlBody = '';
$htmlHeader = '';



if(!empty($_GET['author_id'])){

    $authorId = $_GET['author_id'];

    $sql = "SELECT * FROM authors INNER JOIN articles ON authors.id = articles.author_id 
    WHERE authors.id='$authorId' ORDER BY articles.id DESC";

    $htmlHeader = "Статьи одного автора";
    $limitSymbol = 230;

}else if(!empty($_GET['article_id'])){

    $articleId = $_GET['article_id'];

    $sql = "SELECT * FROM authors INNER JOIN articles ON authors.id = articles.author_id WHERE articles.id='$articleId ' ORDER BY articles.id DESC ";

    $htmlHeader = "Статья";
    $limitSymbol = null;

}else if(!empty($_GET['tag_id'])){

    $tag_id = $_GET['tag_id'];

    $sql = "SELECT * FROM authors RIGHT JOIN articles ON articles.author_id = authors.id
    INNER JOIN articles_tags ON articles_tags.article_id = articles.id
    WHERE articles_tags.tag_id='$tag_id' ORDER BY articles.id DESC ";
// чтобы получить айди артиклс нужно в таком порядке делать
    $htmlHeader = "Статьи по тэгам";
    $limitSymbol = 230;

}else{
    $sql = "SELECT * FROM authors INNER JOIN articles ON authors.id = articles.author_id ORDER BY articles.id DESC ";

    $htmlHeader = 'Все статьи';
    $limitSymbol = 230;
}


$result = mysqli_query($connect, $sql);
$result = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($result as $value) {

    $title = $value['title'];
    $author = $value['firstname'].$value['lastname'];
    $text = mb_substr($value['text'],0,$limitSymbol);
    $authorId = $value['author_id'];
    $articleId =  $value['id'];// вот тут айди статьи мэни ту мэни

    $tags = manyToMany($articleId,$connect);
    $htmlTag = "";
    foreach ($tags as $tag){
        $tagId = $tag['tag_id'];
        $tagName = $tag['tag'];
        $htmlTag.= "<a href='http://learn/mysql/main.php?tag_id=$tagId' class='link-underline link-underline-opacity-0'> <b>$tagName</b></a>";
    }

    $htmlUpdateDelete ="";

    if($typeUser == 'admin' || $idUser == $authorId){
        $htmlUpdateDelete ="<a href='http://learn/mysql/main.php?update_id=$articleId' class='btn btn-warning btn-sm'>Редактировать</a>
                <a href='http://learn/mysql/main.php?delete_id=$articleId' class='btn btn-danger btn-sm'>Удалить</a>";
    }


    $htmlBody .= "
            
           <div class='row bg-white mb-4 border'>
           
                <div class='bg-warning text-danger'>
                    <b>
                    <a href='http://learn/mysql/main.php?author_id=$authorId'>$author</a>
                    </b>
                </div>
                
                <div class='text-bg-warning'>
                    <a href='http://learn/mysql/main.php?article_id=$articleId' class='link-dark'> <b>$title</b></a>
                </div>

                <div class='col mt-0'>
                    $text
                    <br>
                    $htmlTag
                    <br>
                    $htmlUpdateDelete
                </div>
            </div>
           
           "; }
?>