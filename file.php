<?php

$file = fopen('1.txt','r');
for ($i=0; $s=fgets($file,10000);$i++){
     echo $s;
    $random = mt_rand(0,$i);
    if ($random==0) {
        echo $random;
        $line = $s;}
}

echo $line;



$arr = [ "d" => ['three',3], 2 => 'four'];
file_put_contents('array.txt', print_r($arr, true));
$strarray = file_get_contents('array.txt');
print_r($strarray[0]);