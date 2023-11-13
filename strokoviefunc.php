<?php
//header('Content-Type: text/html; charset=ANSI');
$a ='привет';
//echo $a[2];

echo '<pre>';
print_r(explode("и",$a ));
echo '</pre>';

echo mb_substr($a, 1 , 4).'<br>';//вырезание
echo mb_substr($a, 1 ).'<br>';//вырезани
$a = mb_substr($a, 1 , 4);
echo $a.'<br>';

$str  = 'РНР - интерпретируемый язык';
echo strpos ($str, '7' ).' стрпос<br>';
echo substr( $str, strpos ($str, 'я' )).'док<br>';//вырезает до конца
echo '<br>толкьо начало' . substr( $str, 0,strpos ($str, ' интер' ))."<br>";//с начала до интер

$eng = 'урок lesson';
$eng = str_replace ( 'урок', 'lesson', $eng );//заменяе элемент
echo $eng;

$tag = '<b>Hello</b>';
echo $tag;
echo htmlspecialchars($tag ) ;


$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);
echo $pieces[0]; // piece1
echo $pieces[1];


$fileName = 'file.php';
$rasshir =   substr($fileName, strrpos($fileName, '.')+1);
echo "<br>". $rasshir;



