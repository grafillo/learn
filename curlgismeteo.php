<?php

$array = [ 'ip'=>'185.135.181.93',
           'json'=>'',
           ];

if(!empty($_POST['1'])){
    print_r(getallheaders()['X-Gismeteo-Token']);
    die('умри');
}



$ch = curl_init('http://learn/curlgismeteo.php');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, ['1'=>'s']);
//curl_setopt($ch, CURLOPT_POSTFIELDS,['X-Gismeteo-Token:56b30cb255.3443075']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


//показать только заголовки без тела запроса
//curl_setopt($ch, CURLOPT_HEADER, true);
//curl_setopt($ch, CURLOPT_NOBODY,true);


//$token = ['X-Gismeteo-Token'=> '56b30cb255.3443075'];
//$token = ['token:123'];
//curl_setopt($ch, CURLOPT_HTTPHEADER, $token);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['X-Gismeteo-Token:56b30cb255.3443075']);

$html = curl_exec($ch);
curl_close($ch);
echo $html;


//print_r(getallheaders());
$headers = curl_getinfo($ch);


//echo 'ошибочка'.curl_error($ch);
//echo $html;

//$html = json_decode($html,true);
//echo $html['error'];
//
//print_r(curl_getinfo($ch));