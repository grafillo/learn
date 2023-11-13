<?php
$array = [ 'latitude'=>'43.1056200',
           'longitude'=>'131.8735300',
           'api_key'=>'21da4a87b50b27ac973f5185c2798506'
];

$ch = curl_init('http://htmlweb.ru/json/geo/timezone');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$html = curl_exec($ch);
curl_close($ch);
$html = json_decode($html);

echo '<pre>';
print_r($html);