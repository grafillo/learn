<?php

$v = 1;
$doub = $v.'2';
echo $doub;

phpinfo();

$a = 1.1;
$bool = true;
$b = "apple$a";
$c = "6";
$a = 6 + $a;
$an = null;
//$a = "$a";//кавычки
//$a=strval($a);
echo gettype($an)." type";

$b .= " golden";
echo $b;


$array = ["first" => "нулевой", ["под" => "подмасив"], "второй"];
//echo $array[1]["под"];

//echo '<pre>';
print_r ($array);
//echo '/<pre>';

$sort = "golden";
$sklad = ["golden" => 15, "semerenko" => 10];
echo $sklad[$sort];

echo "<br> Второй урок <br>";
$e = "";
echo empty($e);
echo isset($e);

$var = "13";

echo $var + 6;
//оператор конконтенации
$string = 5;
$int = 6;
$string .= $int;
$int += 1;
echo $string;

$app = 300;
if (isset($app)) {
    echo '$app существует';
} else {
    echo '$app не существует';
}

$second = 200;
if ($app >= 300 || $second < 200) {
    echo '$app больше';
} else {
    echo '$app меньше';
}

echo '<br>';

$man = true;
$woman = true;

if ($man) {
    echo 'мужчина';
} elseif ($woman) {
    echo 'женщина';
} else {
    echo 'пол не определён';
}

echo '<br>';

$flag1 = true;
$flag2 = false;
if ($flag1 == 1 && $flag2 == 1) {
    echo 'оба флага истины';
} elseif($flag1 == 1 || $flag2 == 1) {
    echo 'какойто флаг существует';
}else{
    Echo 'оба флага ложные';
}

echo '<br>';
$x= 1;
$x = $x > 0 ? "положительный" : "отрицательный";
echo $x;

echo '<br>';
//$arr = [];
$arr[2] = 5;
echo '<pre>';
print_r ($arr);
echo '/<pre>';

$array = ["first" => "нулевой", ["под" => "подмасив"], "второй"];
$array = ["нулевой","нулевой", "подмасив"];
for ($i = 0; $i < count ($array); $i++) {
    echo $array[$i];
}


$people = "D";
if( isset($people)){
    echo 'человек существует';
}else{
    echo 'человека не существует';
}

echo '<br>';
$i =1;
$b = 1;
while($i<5){
    echo "<br>$i";
    $b = 1;
     while ($b<6){
         echo '$b';
         $b++;
     }
    $i++;
}

echo '<br>';
for ($i=1;$i<5;$i++){
    echo "<br>$i";
}


$number = 10;
$fibo = 0;
for($i=0;$i<$number;$i++){

   if($i==0){
       $first = 0;
       $second = 1;
       $fibo = 0;
       $arrayFibonachi[$i] = $fibo;
   }else{
       $first = $second;
       $second = $fibo;
       $fibo = $first + $second;
       $arrayFibonachi[$i] = $fibo;
   }

}
echo $fibo;
print_r($array);



?>


