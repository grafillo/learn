<?php
interface Autor{

    public function getAutor():void;

}

interface Article {

    public function getArticle():void;
}


class Book implements Article,Autor {

    public function getAutor():void{
        echo "Autor";
    }

    public function getArticle():void{
        echo "Article";
    }


}

$book = new Book();
$book->getArticle();
$book->getAutor();