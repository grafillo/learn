<?php
session_start();

if(isset($_GET['add'])) {
    $_SESSION['cart'][]=$_GET['add'];

}

$cart = "ничего нет";

if(isset($_SESSION['cart']) ){
    $cart = "";
    foreach ($_SESSION['cart'] as $value)
    {$cart .= $value . ", ";}
}

?>
<html>

<a href="session.php">Мониторы</a>
<a href="session1.php">Компьютеры</a>
<br>

Компьютер1
<form method="get" action="" enctype="multipart/form-data" class="form-label">
    <input name="add" type="hidden" value="computer1">
    <input type="submit" value="В корзину" class="btn btn-success">
</form>
Компьютер2
<form method="get" action="" enctype="multipart/form-data" class="form-label">
    <input name="add" type="hidden" value="computer2">
    <input type="submit" value="В корзину" class="btn btn-success">
</form>

У вас в корзине: <?php echo $cart ?>

</html>

