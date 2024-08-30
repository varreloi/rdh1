<?php
session_start();
//koneksi ke database
$koneksi=new mysqli("localhost","root","","rdhshop");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RDH Shop</title>
    <link rel="stylesheet" href="folder/admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="folder/shop.css">
</head>
<body>

<!-- Navbar-->
<Section class="navbar navbar-default" id="header">
    <h1>RDH</h1>
        <ul id="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="folder/keranjang.php">Keranjang</a></li>
            <!--jika sudak login maka keluar session pelanggan -->
            <?php if (isset($_SESSION["pelanggan"])):?>
                <li><a href="folder/logout.php">Logout</a></li>
                <li><a href="folder/riwayat.php">Riwayat Belanja</a></li>
            <!--selain itu/blm login tidak ada session pelanggan-->   
            <?php else:?>
                <li><a href="folder/login.php">Login</a></li>
                <li><a href="folder/daftar.php">Daftar</a></li>
            <?php endif?>
            <li><a href="folder/checkout.php">Checkout</a></li>
            
        </ul>  
</section>

<!--Banner-->
<section id="banner">
    <div id="container">
        <h4>Trade-in-offer</h4>
        <h2>Harga Super Meriah!</h2>
        <h1>Kerupuk Jempolan</h1>
        <p>Klaim diskon 20% untuk pembelian pertama</p>
        <button>Shop Now</button>
    </div>
</section>

<!--konten-->
<section class="konten">
    <div class="container">
        <h1>Produk Utama</h1>

        <div class="row ">

            <?php $ambil=$koneksi->query("SELECT * FROM produk");?>
            <?php while ($perproduk=$ambil->fetch_assoc()) {;?>
            <div class="col-md-3">
                <div class="thumbnail">
                    <img src="folder/foto_produk/<?php echo $perproduk['foto_produk'];?>" alt="">
                    <div class="caption">
                        <h3><?php echo $perproduk['nama_produk'];?></h3>
                        <h5>Rp.<?php echo $perproduk['harga_produk'];?></h5>
                        <a href="folder/beli.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-primary">Beli</a>
                        <!--<a href="detail.php?id=<?php //echo $perproduk['id_produk'];?>" class="btn btn-default">Detail</a>-->
                    <img src="" alt="">
                    </div>
                </div>
            </div>
            <?php }?>

            
        </div>
    </div>

</section>
</body>
</html>