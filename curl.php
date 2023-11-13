<?php

$pass = [
    'login'    => 'admin',
    'password' => '1234'
];

//echo http_build_query($array, '', '&');

function curlRequest(array $pass,string $token=null):string
{

    $ch = curl_init('http://learn/curl1.php');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $pass);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($ch, CURLOPT_HEADER, true);



        $token = ['token:'.$token];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $token);

    $html = curl_exec($ch);
    curl_close($ch);

    echo "<pre>";
   print_r($html);

   // print_r( curl_getinfo($ch, CURLINFO_HTTP_CODE));


    return $html;

}

$response = json_decode(curlRequest($pass), true);

if (isset($response['token'])) {
    $token = $response['token'];
    curlRequest($pass,$token);
}


//echo '<pre>';
//print_r(getallheaders());

