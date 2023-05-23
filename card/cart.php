<?php

include 'connection.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <title>Images Card</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!-- Import Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Import Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Images Card</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="upload.php">Edit Produk</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">User</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container menu-list mt-5">
            <h1 class="fs-2 welcoming py-3">Cart Produk</h1>
            <?php
            if (!empty($_SESSION['cart'])) {
            ?>
                <table class="table" border="1">
                    <tr>
                        <th class="text center my-3">Nama</th>
                        <th class="text center my-3">Harga</th>
                        <th class="text center my-3">Jumlah</th>
                        <th class="text center my-3">Subtotal</th>
                        <th class="text center my-3" colspan="2">Action</th>
                    </tr>
                    <?php
                    $no = 1;
                    $grandtotal = 0;
                    foreach ($_SESSION['cart'] as $cart => $val) {
                        $subtotal = $val["harga"] * $val["jumlah"];
                    ?>
                        <tr>
                            <td><input type="text" name="nama" class="form-control text-center my-3 " value="<?php echo $val["nama"] ?>" readonly</td>
                            <td><input type="text" name="nama" class="form-control text-center my-3 " value="<?php echo $val["harga"] ?>" readonly</td>
                            <td><input type="text" name="nama" class="form-control text-center my-3 " value="<?php echo $val["jumlah"] ?>" readonly</td>
                            <td><input type="text" name="nama" class="form-control text-center my-3 " value="<?php echo $subtotal ?>" readonly</td>

                            <td><a class="btn btn-danger my-3" href="hapus_cart.php?product_id=1
                    <?php echo $cart ?>">Hapus</a></td>
                        </tr>
                    <?php
                        $grandtotal += $subtotal;
                    }
                    ?>
                    <tr>
                        <th colspan="4"> Grand Total</th>
                        <th><?php echo $grandtotal ?></th>
                        <th>&nbsp;</th>
                    </tr>
                </table>
                <a class="btn btn-primary" href="add_transaksi.php">Beli</a>
            <?php
            } else {
                header("Location: index.php");
            }
            ?>
        </div>
    </main>
</body>
<script src="assets/js/bootstrap.js"></script>

</html>