<?php
$count = 10000;
$rand1 = 1000;
$rand = 10000;
$array = "";
$array1 = "";
$result = [];

for($i = $count; $i--;){
        $array .= " ". rand(1,$rand);
        $array1 .= " ".rand(1,$rand1);
}
file_put_contents('input.txt', $array."\n".$array1);



$input = file_get_contents('input.txt');
$array = explode("\n", $input);

$doxod = explode(" ",  $array[0]);
$obrazovanie = explode(" ",  $array[1]);

$start_time = microtime(true);
foreach($doxod as $key => $value){

    foreach ($obrazovanie as $key1 => $value1){

        if($value==$value1){
            $result[] = "$key - $key1 = $value";
        }
    }

}
$end_time = microtime(true);
$byte = memory_get_peak_usage(true)/1000000;


echo "without time: ", bcsub($end_time ,$start_time, 4), "<br>";
echo "memory (mbyte): ",$byte , "<br>";


$start_time = microtime(true);
$result = [];
$arrayDoxod = [];
foreach ($doxod as $key=>$value){
    $arrayDoxod[$key+1]['zbv'] = $value;
    $arrayDoxod[$key+1]['obv'] = $value;
}
$arrayObraz = [];
foreach ($obrazovanie as $key=>$value){
    $arrayObraz[$key+1]['zbv'] = $value;
    $arrayObraz[$key+1]['obv'] = $value;
}

foreach($arrayDoxod as $key => $value){

    foreach ($arrayObraz as $key1 => $value1){

        if($value['zbv']==$value1['zbv']){
            $result[] = "$key - $key1 = " . $value['zbv'];
        }
    }

}
$end_time = microtime(true);
$byte = memory_get_peak_usage(true)/1000000;


echo "without time: ", bcsub($end_time ,$start_time, 4), "<br>";
echo "memory (mbyte): ",$byte , "<br>";
//$array = [];
//$array1 = [];
//$result = [];
//
//$rand = 10000;
//$rand1 = 1000;
//$count = 10000;
//
//
//for($i = $count; $i--;){
//        $array[] = rand(1,$rand);
//        $array1[] = rand(1,$rand1);
//}
//
//
//$start_time = microtime(true);
//foreach($array as $key => $value){
//
//    foreach ($array1 as $key1 => $value1){
//
//        if($value==$value1){
//            $result[] = "$key - $key1 = $value";
//        }
//    }
//
//}
//
//$end_time = microtime(true);
//$byte = memory_get_peak_usage(true)/1000000;
//
//
//echo "without time: ", bcsub($end_time ,$start_time, 4), "<br>";
//echo "memory (mbyte): ",$byte , "<br>";
//
////print_r($result);
//
//
//
//
//function makeArray($count,$rand){
//
//    for ($i=$count; $i--;) {
//        yield rand(1,$rand);
//    }
//
//}
//
//
//$start_time = microtime(true);
//
//foreach(makeArray($count,$rand) as $key => $value){
//
//    foreach (makeArray($count,$rand1) as $key1 => $value1){
//
//        if($value==$value1){
//            $result[] = "$key - $key1 = $value";
//        }
//    }
//
//}
//
//$end_time = microtime(true);
//$byte = memory_get_peak_usage(true)/1000000;
//
//
//echo "time: ", bcsub($end_time ,$start_time, 4), "<br>";
//echo "memory (mbyte): ",$byte , "<br>";
//

/////

