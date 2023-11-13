<?php

$memory = memory_get_usage();

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
//$a=656+5555;
//$a=656+5555;

//echo memory_get_usage()."usage";

echo (memory_get_usage() - $memory) . ' байт';
