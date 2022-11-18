<?php
include "../dao.php";
$name = $_POST['name'];
$brand = $_POST['brand'];
$price = $_POST['price'];
$cat = $_POST['cat'];
$pid = $_POST['id'];

$query = mysqli_query($con, updateProduct($name, $brand, $price, $cat, $pid)) or die(mysqli_error($con));
if ($query) {
    echo 1;
} else {
    echo mysqli_error($con);
}
