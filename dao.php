<?php
$con = mysqli_connect('localhost', 'root', '', 'phpwork');

function getProducts()
{
    return "SELECT * FROM products";
};

function addProduct($pname, $pbrand, $pprice, $pcat)
{
    return "INSERT INTO products VALUES (null,'$pname','$pbrand','$pprice','$pcat')";
}

function getSingleProduct($id)
{
    return "SELECT * FROM products where pid=$id";
}

function updateProduct($pname, $pbrand, $pprice, $pcat, $id)
{
    return "UPDATE products set pname='$pname', pbrand='$pbrand', pprice='$pprice', pcat='$pcat' WHERE pid='$id'";
}

function deleteProduct($pid)
{
    return "DELETE FROM products where pid=$pid";
}
