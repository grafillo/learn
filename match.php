<?php
$food = 'apple';

$return_value = match ($food) {
    'apple' => '2',
    'bar' => 'This food is a bar',
    'cake' => 'This food is a cake',
    default => 'default',
};

echo($g = $return_value+1);


$result = round(3.4);
$a = 1;

echo $result+$a;
?>