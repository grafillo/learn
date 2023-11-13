<?php
setcookie('counter',counter());
setcookie('cit1', "kukis" ,time()+5,'/','learn');
setcookie('гуугл', "шмугл" ,time()+22200,'/','learn');

function counter()
{
    if (isset($_COOKIE['counter'])) {
        $_COOKIE['counter']++;
    } else {
        $_COOKIE['counter'] = 1;
    }

    return $_COOKIE['counter'];
}
echo "вы посещали страницу ".$_COOKIE['counter'];

print_r($_COOKIE);

echo date('h:i:s');





?>




