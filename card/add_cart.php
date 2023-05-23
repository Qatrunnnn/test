<?php
include "connection.php";
session_start();
$product_id = $_GET['product_id'];

$add = "Select * from product where product_id = '$product_id'";
$query = mysqli_query($conn, $add);
$row = mysqli_fetch_object($query);

$_SESSION['cart'][$product_id] = [
        "nama" => $row->product_name,
        "harga" => $row->price,
        "jumlah" => 1
];

header("location: cart.php");
?>