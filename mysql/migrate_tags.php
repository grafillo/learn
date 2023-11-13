<?php

mysqli_report(MYSQLI_REPORT_STRICT);


$connect = mysqli_connect("localhost", "root", "","lesson_bd");



$tableName = 'tags';
$tagsStatic = ['свежее','смешное','спорт','политика'];

$sql = "CREATE TABLE $tableName (
id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
tag VARCHAR(40) NOT NULL UNIQUE 
)";

if(mysqli_query($connect, $sql)){
    echo "Таблица $tableName успешно  создана.<br>";
}else{
    echo "Ошибка создания таблицы $tableName ".mysqli_error($connect);
}



foreach($tagsStatic as $value){
    $sql = "INSERT INTO $tableName SET tag='$value' ";
        if(!mysqli_query($connect, $sql)){
            echo 'ошибка'.mysqli_error($connect);
        }
}



$tableName = 'articles_tags';

$sql = "CREATE TABLE $tableName (
article_id int NOT NULL,
tag_id int  NOT NULL,
FOREIGN KEY (article_id) REFERENCES articles (id) ON DELETE CASCADE,
FOREIGN KEY (tag_id) REFERENCES tags (id) ON DELETE CASCADE,
primary key(article_id, tag_id)
)";



if(mysqli_query($connect, $sql)){
    echo "Таблица $tableName успешно  создана.<br>";
}else{
    echo "Ошибка создания таблицы $tableName ".mysqli_error($connect);
}

//для каждой статьи создаём тэги
$articles = 'SELECT * FROM articles';
$articles = mysqli_query($connect, $articles);
$articles = mysqli_fetch_all($articles,MYSQLI_ASSOC);

//создаём массив с индексами которые есть в массиве $tagsStatic
for($i=0; $i<count($tagsStatic); $i++){
    $tagsShuffle[] =  $i+1;

}

foreach ($articles as $article){


    $article_id = $article['id'];
    $tagQuantity = mt_rand(1,count($tagsStatic));//количесвто тэгов от 1

    shuffle($tagsShuffle);//перемешиваем массив с индексами

    $tagsArticle = [];// каждый раз обнуляем и заносим рандомные индексы в массив $tagQuantity - количесвто тэгов
    for($i=0; $i<$tagQuantity; $i++){

        $tagsArticle[]=$tagsShuffle[$i];

    }


    foreach ($tagsArticle as $value){

        $sql = "INSERT INTO $tableName SET article_id='$article_id', tag_id='$value' ";
        if(!mysqli_query($connect, $sql)){
            echo 'ошибка'.mysqli_error($connect);
        }
    }


}



mysqli_close($connect);

