<?php
$id='';
$lastname ='';
$firstname = '';
$email = '';
if (!empty($_GET['update_id'])){
    $id=$_GET['update_id'];
    $lastname=$_GET['lastname'];
    $firstname=$_GET['firstname'];
    $email=$_GET['email'];

}



?>
<html>
<head xmlns="http://www.w3.org/1999/html">
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
</body>
<div class="p-5">
    <form method='post' action='http://learn/mysql/authors.php' enctype='multipart/form-data' class="form-label">
        <input name='update_id' type='hidden' value="<?php echo $id; ?>">
        Имя
        <input type='text' name='firstname' value='<?php echo $firstname; ?>'>
        Фамилия
        <input type='text' name='lastname' value='<?php echo $lastname; ?>'>
        Email
        <input type='text' name='email' value='<?php echo $email; ?>'>
        <input type='submit' value='Изменить автора' class="btn btn-warning">
    </form>
</div>

</body>
</html>
