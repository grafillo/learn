<?php

$array = ["first" => "нулевой", ["под" => "подмасив"], "второй"];
echo '<pre>';
print_r($array);
echo '/<pre>';




$array = ["first" => "нулевой", "под1" => "подмасив","под"  => "второй"];
foreach ($array as $index => $val)
    {
        echo "$index = $val <br>";
    }


$array = [  "нулевой", "подмасив", "второй"];
$i =0;
while($i<count($array)){
    echo "<br>$array[$i]".count($array);
    $i++;
}

$i =1;
$b = 1;
while($i<5){
    echo "<br>$i";
    $b = 1;
    while ($b<6){
        echo $b;
        $b++;
    }
    $i++;
}

$array= [6=>7,8=>3,3=>1];
asort($array);
foreach ($array as $key => $val) {
    echo "$key = $val\n";
}
echo '<pre>';
print_r($array);
echo '/<pre>';

$first =  ["d" => 'one', 2 => 'two'];
$second = [ "d" => ['three',3], 2 => 'four'];
$sum = array_merge($first, $second);

echo '<pre>';
print_r($sum);
echo '/<pre>';




?>