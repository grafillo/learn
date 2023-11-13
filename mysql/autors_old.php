<?php


if ( ! empty($_GET['delete_id'])) {

    $deleteId = $_GET['delete_id'];

    $sql = "DELETE FROM authors WHERE id ='$deleteId'";
    $result = mysqli_query($connect, $sql);

    //проверка на удаление
    $sql = "SELECT * FROM authors WHERE id ='$deleteId'";
    $result = mysqli_query($connect, $sql);
    if(count(mysqli_fetch_all($result))){
        echo "Не удалось удалить чтото пошло не так!";
    }else{
        echo "Автор успешно удалён!";
    }

}

if ( !empty($_POST['update_id'])) {

    $update_id = $_POST['update_id'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];

    $sql = "UPDATE authors SET firstname='$firstname', lastname='$lastname',email='$email' WHERE id='$update_id'";
    $result = mysqli_query($connect, $sql);

}


if ( !empty($_POST['add'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $sql
        = "INSERT INTO authors SET firstname='$firstname', lastname='$lastname'";
    $result = mysqli_query($connect, $sql);
    echo $result;
}



if ( !empty($_POST['search'])) {


    $search = $_POST['search'];
    $sql = "SELECT * FROM authors WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%'";
    $autors = request($sql, $connect);



}else{
    $sql = 'SELECT * FROM authors ORDER BY id DESC';
    $autors = request($sql, $connect);
}



function request(string $sql, $connect): array
{
    $result = mysqli_query($connect, $sql);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);

}


//echo '<pre>';
//print_r($autors);
mysqli_close($connect);
?>

<html>
<head xmlns="http://www.w3.org/1999/html">
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</head>
<body>

<div class="p-3">
    Поиск автора
    <form method='post' action='' enctype='multipart/form-data'
          class="form-label">
        <input type='text' name='search' value="<?php if ( ! empty ($_POST['search'])) {
            echo $_POST['search'];
        } ?>">
        <input type='submit' value='Поиск' class="btn btn-success">
    </form>
</div>

<div class="p-3">
    <form method='post' action='' enctype='multipart/form-data'
          class="form-label">
        <input name='add' type='hidden' value="true">
        Имя
        <input type='text' name='firstname'
               value="<?php if ( ! empty ($_POST['firstname'])) {
                   echo $_POST['firstname'];
               } ?>">
        Фамилия
        <input type='text' name='lastname'>
        <input type='submit' value='Добавить автора' class="btn btn-success">
    </form>
</div>


<table border="1" class="table table-striped">

    <?php

    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Имя</th>";
    echo "<th>Фамилия</th>";
    echo "<th>Email</th>";
    echo "<th></th><th></th>";
    echo "</tr>";


    foreach ($autors as $value) {
        echo "<tr class='align-middle'>";


        echo "<td>".$value['id']."</td>";
        echo "<td>".$value['firstname']."</td>";
        echo "<td>".$value['lastname']."</td>";
        echo "<td>".$value['email']."</td>";

        $userId = $value['id'];
        $firstname = $value['firstname'];
        $lastname = $value['lastname'];
        $email = $value['email'];

        echo "<td><a href='http://learn/mysql/authors.php?delete_id=$userId' class='btn btn-danger btn-sm'>
                    Удалить автора
                 </a>
                </td>
                <td><a href='http://learn/mysql/rename.php?update_id=$userId&firstname=$firstname&lastname=$lastname&email=$email' class='btn btn-warning btn-sm'>
                    Редактировать
                 </a>
                </td>
                ";

        echo "</tr>";

    }
    ?>
</table>
</body>
</html>



