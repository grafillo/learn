<?php

$arr[] = 2;
$n = 10;


for($i=2; $i<$n; $i++){
    for($b=2; $b<$i; $b++){
        if($i%$b == 0){
            break;
        }

        if($b>$i/2){
            $arr[] = $i;
            $b = $i;
        }

    }

}
print_r($arr);


$arr[] = 10;
$arr[] = 2;
$arr[] = 4;
$n=0;
foreach ($arr as $numb){
    if($numb>$n){
        $n = $numb;
    }
}
echo "Максимальное число".$n;
