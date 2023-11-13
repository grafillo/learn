<html>
<head>

</head>>

<form method='post' action='http://learn/html.php' enctype='multipart/form-data'>
    Name<br>
    <input type='text' name='name' lable="fd"><br />
    Surname<br>
    <input type='text' name='surname'><br />
    <b>Select</b><br>
    <select name='select'>
        <option value='1'>Первый пункт</option>
        <option value='2'>Второй пункт</option>
        <option value='3'>Третий пункт</option>
    </select><br />
    Пароль<br />
    <input type='password' name='pass'><br / >
    <b>Textarea</b><br />
    <textarea name='textarea' cols='50' rows='10'></textarea><br />
    <b> Скрытое поле</b>
    <input name='hide' type='hidden' value="hide_field"> <br>
    <b>Чекбокс</b> выберите с какими технологиями знакомы<br />
    <input type='checkbox' name='php' checked>PHP<br />
    <input type='checkbox' name='html' checked>HTML<br />
    <input type='checkbox' name='pyton' >PYTON<br />
    <b>Радио кнопка</b><br />
    <input type='radio' name='radio' value='l' />1<br />
    <input type='radio' name='radio' value='2' />2<br />
    <input type='radio' name='radio' value='З' checked='checked'>З<br />
    <b>Загрузка файла</b><br />
    <input type='file' name='filename'><br />

    <input type='submit' value='Отправить'>
</form>



<form method='post' action='http://learn/html.php' enctype='multipart/form-data'>
<input type='file' name='filename'><br />
<input type='submit' value='Отправить'>
</form>
</html>

<?php
echo "post ";
print_r($_POST);
echo "<br>get ";
print_r($_GET);
//echo "<br>".is_uploaded_file($_FILES[ 'filename'] [ 'name' ]);
//echo "<br>".$_FILES[ 'filename'] [ 'tmp_name' ];
//echo "<br>ошибка".$_FILES['filename']['error'];


function post(){
    if(!empty($_POST['first'])) {
        echo '<br>$_POST[first]='.$_POST['first'];
    }
}

post();

if (!empty($_FILES['filename']['tmp_name']))
{

    checkExtention($_FILES [ 'filename'] [ 'name']);

   if( move_uploaded_file($_FILES['filename'] ['tmp_name'],
        'C:/openserver/OSPanel5.4.3/domains/learn/' .$_FILES [ 'filename'] [ 'name']))

   {
       echo 'Файл успешно загружен '. $_FILES [ 'filename'] [ 'name'];
   }
   else{
       echo 'Ошибка загрузки файла!' ;
   }


}

function checkExtention (string $fileName) {

    $extantions = ['jpeg','jpg','png','bmp'];

    $ext = substr($fileName, strrpos($fileName, '.')+1);

    foreach ($extantions as $value){
        if($value === $ext ){
            return true;
        }
    }

    die("Загрузить можно только картинку с расширением " . implode( " ",$extantions));

}


echo '<pre>';
print_r($_FILES);



if(empty($_POST['frst'])){
    echo '<br> empty';
}

if(isset($_POST['frst'])){
    echo '<br> isset';
}



?>
