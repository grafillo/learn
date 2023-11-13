<?php

//$arr = ["f"=>"1","c"=>"5"];
//$data = serialize($arr);
//file_put_contents('arrayip.txt', $data);

$data = file_get_contents('arrayip.txt');
$data = unserialize($data);

$key= "n";

if(array_key_exists($key, $data)){
    $data[$key]++;
}else{
    $data[$key] = 1;
}

$data = serialize($data);
file_put_contents('arrayip.txt', $data);
print_r ($data);