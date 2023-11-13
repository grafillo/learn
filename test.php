<?php

$array = ["z" => "нулевой", "под" => "подмасив", 'a'=>"второй"];
echo '<pre>';
print_r($array);
echo '/<pre>';

ksort($array);
echo '<pre>';
print_r($array);
echo '/<pre>';