<?php

abstract class AbstractClass {

   abstract public function open (string $a):void;

}


class First extends AbstractClass {

 public function open(string $a): void
 {
     echo $a;
 }

}

class Second extends First {

    public function open(string $a): void
    {
        echo "dada";
    }

}

$f= new Second();
$f->open('привет');