<?php

//echo time().'<br>';
$begin = microtime(true);
for ($i=1;$i<10000;$i++){
    echo $i.'<br>';

}
$end = microtime(true);
echo $result = $end - $begin;

