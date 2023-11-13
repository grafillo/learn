<?php
session_start();
require_once ('vendor\autoload.php');

use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

$phraseBuilder = new PhraseBuilder(5, '0123456789');
$captcha = new CaptchaBuilder(null, $phraseBuilder);

$captcha->build();
$src = $captcha->inline();//ссылка

$form = "<img src=$src>
<form method='post' action='' enctype='multipart/form-data'>
<input type='text' name='captcha' lable='captcha'><br />
<input type='submit' value='Отправить'>
</form>";


if(!empty($_POST['captcha'])) {
    if ($_SESSION['phrase'] == $_POST['captcha']) {
        echo 'Капча введена верно';
    } else {
        echo 'Капча введена неверно <br>';
        echo $form;
    }
}else {
    echo $form;
}

$_SESSION['phrase'] = $captcha->getPhrase();//перегенерирует
?>


