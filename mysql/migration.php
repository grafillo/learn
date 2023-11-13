<?php

mysqli_report(MYSQLI_REPORT_STRICT);


$connect = mysqli_connect("localhost", "root", "","lesson_bd");



$tableName = 'authors';

$sql = "CREATE TABLE $tableName (
id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(40) NOT NULL,
lastname VARCHAR(40) NOT NULL,
email VARCHAR(40) NULL,
password VARCHAR(40) NOT NULL,
token VARCHAR(40),
user_type VARCHAR(10) NOT NULL,
token_expired TIMESTAMP,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

//

 if(mysqli_query($connect, $sql)){
    echo "Таблица $tableName успешно создана.<br>";
}else{
    echo "Ошибка создания таблицы $tableName ".mysqli_error($connect);
}



$firstnames = ['Alexander','Alexey','Sergey','Vladimir'];
$lastnames = ['Ivaniv','Petrov','Sidorov'];
$quantity = 16;

for ($i=0; $i<$quantity; $i++){

    $firstname= $firstnames[mt_rand(0,count($firstnames)-1)];
    $lastname= $lastnames[mt_rand(0,count($lastnames)-1)];
    $password = mt_rand(0,100000);
    $email = $password.'@mail.ru';
    $password = hash('sha1',$password);
    $userType = 'user';

    $sql = "INSERT INTO $tableName SET firstname='$firstname', lastname='$lastname', email='$email',password='$password', user_type ='$userType'";

   if(!mysqli_query($connect, $sql)){
       echo 'ошибка'.mysqli_error($connect);
   }

}
mysqli_close($connect);


require_once ('migrate_article.php');
require_once ('migrate_tags.php');

//$result = mysqli_fetch_array($table);
//print_r($table);

//if (mysqli_query($connect, $sql)) {
//    echo "Table MyGuests created successfully";
//} else {
//    echo "Error creating table: " . mysqli_error($connect);
//}






//$result = $link->query("SELECT DATABASE()");
//$row = $result->fetch_row();
//printf("База данных по умолчанию: %s.\n", $row[0]);
//
//$sql = 'explain SELECT * FROM cards WHERE id>4';
//$result = mysqli_query($link, $sql);
//$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
//echo '<pre>';
//print_r($rows);
//echo '</pre>';


//$sql = 'INSERT INTO cities SET name = "Санкт-Петербург"';
//$result = mysqli_query($link, $sql);
//
//if ($result == false) {
//print("Произошла ошибка при выполнении запроса");
//}

?>