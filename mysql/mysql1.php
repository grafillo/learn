<?php


$connect = mysqli_connect("localhost", "root", "", "lesson_bd");


$sql = 'SELECT * FROM authors';
$sql = 'SELECT firstname,email FROM authors';
$sql = 'SELECT COUNT(*) FROM authors';
$sql = 'SELECT COUNT(DISTINCT firstname) FROM clients';
//$sql = 'SELECT DISTINCT firstname FROM authors';
//$sql = 'SELECT COUNT(DISTINCT firstname) FROM clients';
//$sql = 'SELECT DISTINCT firstname, lastname FROM clients';
//$sql = 'SELECT DISTINCT CONCAT(firstname, " " ,lastname) AS fullname FROM clients';
//$sql = 'SELECT firstname, lastname FROM clients GROUP BY firstname, lastname ';

//$sql = 'SELECT id,firstname FROM clients ORDER BY firstname asc';
//$sql = 'SELECT * FROM clients WHERE id=6 ORDER BY firstname asc';

function request (string $sql, $connect):array
{
    $result = mysqli_query($connect, $sql);
    return mysqli_fetch_all($result,MYSQLI_ASSOC );

};

echo '<pre>';
print_r(request($sql,$connect));



$result = mysqli_query($connect, $sql);
echo (mysqli_fetch_array($result)[0]);


//$result = mysqli_query($connect, $sql);
//
//print_r(mysqli_fetch_array($result)[0]);




//SELECT DISTINCT Country FROM Customers;

?>

