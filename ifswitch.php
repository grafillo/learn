<?php


$i='b';
switch ($i) {
    case "b":
        echo "i равно b";
        break;
    case 1:
        echo "i равно 1";
        break;
    case 2:
        echo "i равно 2";
        break;
    default:
        echo "i не равно 0, 1 или 2";
}
$i = null;
echo isset($i);
$c = $i + 6;
echo 'exo '.$c;
