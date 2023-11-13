<?php
trait Autor {

    public function getAutor(){
        echo "Autor";
    }

}


trait Article {

    public function getArticle(){
        echo "Article";
    }
}


class Book {
    use Article,Autor;
}

$book = new Book();
$book->getArticle();
$book->getAutor();