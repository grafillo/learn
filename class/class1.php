<?php

class A {

    const CONSTA = 'constant';
    protected $protected = 'protected';
    private $private = 'private';
    public $public = 'public';
    static $static = 'staticA';

        function __construct(){
        echo self::$static.'<br>';
        echo $this->protected.'<br>';
        echo $this->private.'<br>';
        echo static::CONSTA.'<br>';

    }


}

echo A::$static;
echo A::CONSTA;

$objectA = new A();
echo $objectA->public;

class B extends A{

    static $static = 'staticB';


    function __construct(){
        echo '<br> Class B <br> ';
        parent::__construct();
        echo self::$static;
        echo static::$static;

    }

}

$objectB = new B();


class C extends A{

    static $static = 'staticB';


    function __construct($a,$b){

        echo $a."-a";
        echo $b."-b";

    }

    public function __call($name, $arguments) {

        echo "Метода '$name' не существует, переданные аргументы: "
            . implode(', ', $arguments). "\n";
    }


    function __destruct() {
        echo "<br> Обьект класса " . __CLASS__  . " уничтожился";
    }

}

$objectC = new C('1','2');
$objectC->hjhj('a');







//class First {
//
//    public const CONSTA = 'constant';
//    protected $protA = 16;
//    protected $protected = 'protected';
//    private $private = 'private';
//    public $public = 'public';
//    static $static = 'firstStatic';
//
//    function __construct(){
//        echo self::$static;
//        echo $this->protected;
//        echo $this->private.'<br>';
//
//    }
//
//    public function staticUse(){
//
//        echo "<br>self ".self::$static;
//        echo "<br> static ".static::$static;
//        echo "<br> prota ".$this->protA;
//    }
//}
//
//$first = new First();
////First::$static = 4;
////echo(First::$static);
//
//
//class Second extends First {
//
//    protected $protA = 'second';
//
//    static $static = 'secondStatic';
//
//    function __construct(){
////        echo self::CONSTA;
////        echo static::CONSTA;
//    }
//
//
//
//    static function staticFunc($a){
//        echo $a.static::$static;
//    }
//
//     function protect(){
//        echo $this->protected;
//
//    }
//
//
//
//}
//
//$second = new Second();
//$second->protect();
//echo $second::CONSTA;
//$second::staticFunc(6);
//$second::$static;
//$second->staticUse();
//echo Second::$static;