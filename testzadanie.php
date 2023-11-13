<?php
// Удалить из массива всех людей с именем

$arr = [["name"=>"sani"],["name"=>'peti'],["name"=>'peti']];

function deleteArr ($arr){
    foreach($arr as $key => $value){
        if($value['name'] == "sani" ){
            echo "нашёл";
            unset($arr[$key]);
        }
    }
    return $arr;
}
deleteArr($arr);


$str = "banana orange apple apple";
$arrSearch = ['banana', 'orange' , 'apple'];
$results = [];

    foreach($arrSearch as $entry){

        countEntry($str,$entry);

    }


foreach($results as $key=>$value){
    echo "$key - $value<br>";
}

function countEntry($string,$entry,$count=0){

    $pos =  strpos($string, $entry);

    if($pos !== false){
        $obrezat =  mb_substr($string,$pos+1);
        $count++;
        countEntry($obrezat,$entry,$count);
    }else {
        global $results;
        $results[$entry] = $count;
    }
}





?>