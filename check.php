<?php

class A {

}
class B extends A{

    function __construct()
    {
        echo "b";
    }


}

function func (A $a){
    return $a;
}

$b = new B();

func($b);