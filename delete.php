<?php
include 'connection.php';

$product_name = $_GET["product_name"];

$query = "DELETE FROM product WHERE product_name = '$product_name'";

if (mysqli_query($conn, $query)) {
    echo "<script> alert('Produk berhasil di hapus.');
        window.location.href='upload.php';
        </script>";
}
die();
