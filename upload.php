<?php

include 'connection.php';


if (isset($_POST['up'])) {
    $path = "assets/images/" . basename($_FILES['image']['name']);

    $image = $_FILES['image']['name'];
    $product_name = $_POST['product_name'];
    $harga = $_POST['harga'];
    //upload gambar
    $q = "INSERT INTO product VALUES (null,'$product_name', '$harga' , '$image')";
    mysqli_query($conn, $q);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $path)) {
        echo "<script> alert('Produk berhasil di upload.');
        window.location.href='upload.php';

        </script>";
    }
}

$q_produk = 'SELECT * FROM product';
$r_produk = mysqli_query($conn, $q_produk);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images Card</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/main.css">
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
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Menu</a>
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
    <div class="container menu-list mt-5">
        <h1 class="text-center my-5">Preview Produk</h1>
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($r_produk)) : ?>
                <div class="col-lg-3 col-sm-6 product-item my-3">
                    <input type="hidden" name="size" value="1000000">
                    <div class="product">
                        <?php echo "<img src='assets/images/" . $row['picture'] . "'>"; ?>
                    </div>
                    <div>
                        <input type="text" name="product_name" class="form-control text-center border-0 my-2" value="<?php echo $row['product_name'] ?>" readonly>
                    </div>
                    <div>
                        <input type="text" name="harga" class="form-control text-center border-0 my-2 max-w" value="<?php echo $row['price'] ?>" readonly>
                    </div>
                    <div>
                        <a class="btn btn-primary bg-danger border-0 d-flex justify-content-center" href="delete.php?product_name=<?php echo $row['product_name'] ?>" role="button" onclick="return confirm('yakin akan menghapus produk ini?')">Hapus Product</a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <div class="container w-75">
        <h1 class="my-5 text-center">Input Product</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="container">
                <input type="hidden" name="size" value="1000000">
                <div>
                    <input type="text" name="product_name" class="form-control text-center my-3" placeholder="Masukkan Nama">
                </div>
                <div>
                    <input type="text" name="harga" class="form-control text-center my-3" placeholder="Masukkan Harga">
                </div>
                <div>
                    <input type="file" name="image" class="form-control my-3">
                </div>
                <div>
                    <input type="submit" class="btn btn-primary mt-3" name="up" value="Simpan Produk">
                </div>
            </div>
        </form>
    </div>
</body>

</html>