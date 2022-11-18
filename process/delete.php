<?php
include "../dao.php";
$pid = $_POST['id'];
$query = mysqli_query($con, deleteProduct($pid)) or die(mysqli_error($con));
if ($query) {
    echo 1;
} else {
    echo mysqli_error($con);
}
