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
</head>

<body>
    <header>x
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
            <h1 class="fs-2 welcoming py-3">Product List</h1>
            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($r_produk)) : ?>
                    <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
                        <div class="product">
                            <?php echo "<img src='assets/images/" . $row['picture'] . "'>"; ?>
                        </div>
                        <div class="judul pt-4 pb-1" name="nama_produk"><?php echo $row['product_name'] ?></div>
                        <div class="price" name="price">Rp <?php echo number_format($row['price']) ?>,00</div>

                        <div>
                            <a class="btn btn-primary bg-warning border-0 d-flex justify-content-center" href="add_cart.php?product_id=<?php echo $row['product_id'] ?>" role="button" type="Submit">Add to Cart</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        </div>
    </main>
</body>
<script src="assets/js/bootstrap.js"></script>

</html>