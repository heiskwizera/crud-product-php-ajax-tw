<?php
include "../dao.php";
$name = $_POST['name'];
$brand = $_POST['brand'];
$price = $_POST['price'];
$cat = $_POST['cat'];

$query = mysqli_query($con, addProduct($name, $brand, $price, $cat)) or die(mysqli_error($con));
if ($query) {
    echo 1;
} else {
    echo mysqli_error($con);
}
