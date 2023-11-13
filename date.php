<?php

echo time().'<br>';
$time = time();
echo date("M-d-Y  h:i:s", $time).'<br>';
echo date("M-d-Y  h:i:s", 0).'<br>';

echo date("M-d-Y", mktime(0, 0, 0, 25, 1, 1997)).'<br>';

$date = date('F j, Y, h:i:s',$time);
echo $date.'<br>';


echo strtotime("now").'<br>';
echo strtotime($date).'<br>';

echo strtotime('2022-12-31').'<br>';

$seekTime = '2000-10-11';
$userTime = '2009-10-13';

echo 'check ' . ($seekTime>$userTime) .'<br>';

$seekUnix = date_create($seekTime);
$userUnix = date_create($userTime);
$interval = date_diff($seekUnix, $userUnix);
echo $interval->format('%Y лет').'\\n';

 if($seekUnix<$userUnix){
     echo 'пользователь после'.'<br>';
 }



 $dateSeek = '20.09.2019';
 $dateSeek = strtotime($dateSeek);
 $cars = ['bmv'=>'10.09.2018','lada'=>'13.09.2022','mers'=>'20.09.1990'];
 foreach ($cars as $car => $date){

    if( strtotime($date)<$dateSeek){
        echo $car.'<br>';
    };

 }

 $result = time() - $dateSeek;
 $years = round($result/(365*24*60*60));
 echo 'количество лет:'.$years.'<br>';


$seekUnix = date_create('20.09.2019');
$userUnix = date_create(date('M-d-Y'));
$interval = date_diff($seekUnix, $userUnix);
echo $interval->format('%y лет %m месяца %d дней');
