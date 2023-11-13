<?php

$timeStart = microtime(true);

if(file_exists('text.txt')){
    exit('жопа');
}



$text = file_get_contents('text.txt');

$letters = [];

for ($i = 0; $i <mb_strlen($text); $i++) {

    $letter = mb_substr($text,$i,1);
    $letters[$letter] = mb_substr_count($text, $letter);

}
//$letters=[['v'=>1],['а'=>2],['Щ'=>2],['А'=>2],['V'=>2]];
ksort($letters);
$timeEnd = microtime(true);
echo 'время выполнения '.$timeEnd-$timeStart."<br>";
echo 'количество символов '.mb_strlen($text)."<br>";
echo '<pre>';
print_r($letters);

