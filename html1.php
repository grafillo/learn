<head xmlns="http://www.w3.org/1999/html">
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
</body>
<div class="p-5">
<form method='post' action='http://learn/html1.php' enctype='multipart/form-data' class="form-label">
    Имя<br>
    <input type='text' name='name'><br />
    Фамилия<br>
    <input type='text' name='lastname'><br /><br />
    <input type='submit' value='Отправить' class="btn btn-success">
</form>
</div>


<table border="1"  class="table table-striped">

    <?php $array = [ ['id'=>1,'name'=>'Sania','surname'=>'ivanov'], ['id'=>2,'name'=>'Vania','surname'=>'petrov'],['id'=>3,'name'=>'Petya','surname'=>'sidorov']];

    echo "<tr>";
    foreach ($array[0] as $key =>$value){
            echo "<th>".$key."</th>";

    }
    echo "</tr>";


    foreach ($array as $value){
        echo "<tr>";

            echo "<td>".$value['id']."</td>";
            echo "<td>".$value['name']."</td>";
            echo "<td>".$value['surname']."</td>";

        echo "</tr>";
    }
    ?>
</table>
</body>
</html>

<?php
echo "post ";
print_r($_POST);
echo "<br>get ";
print_r($_GET);







function get(){
    if(isset($_POST['name'])) {
        echo '<br>$_POST[first]='.$_POST['name'];
    }
}
get();
