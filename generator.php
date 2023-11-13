<?php

function generator ($size) {
    $arr = [];
    for($i=1; $i<$size; $i++) {
        yield $i;
    }
   //return $arr;
}

foreach (generator(1024000) as $val){

    echo "$val ";
}

echo memory_get_usage();