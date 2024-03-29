<?php
session_start();
include "koneksi/koneksi.php";
// echo '<pre style="color:black;">';
// print_r($_SESSION['namaplg']);
// echo '</pre>';
if (empty($_SESSION['id_pelanggan'])) {
    echo "<script>location='login.php'</script>";
} else if (empty($_SESSION['keranjang'])) {
    echo "<script>alert('Keranjang kosong, silahkan pilih produk!'); location='.#produk' </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pondok Kopi 57.58</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/swiper.min.css">

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/fontawesome5/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .judul {
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 50px;
            padding-top: 110px;
        }

        .judul h2 {
            font-size: 25px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .produkheader {
            background: #FFFFE5;
            color: black;
            height: 50px;
            padding: 10px;
            display: flex;
            margin-bottom: 10px;
        }

        .nama {
            width: 45%;
            padding-left: 5%;
            display: flex;
        }

        .harga {
            width: 13%;
            text-align: center;
        }

        .qty {
            width: 15%;
            text-align: center;
        }

        .total {
            width: 15%;
            text-align: center;
        }

        .aksi {
            width: 12%;
            text-align: center;
        }

        .produkitem {
            background: #FFFFE5;
            color: black;
            padding: 10px;
            border-top: 2px solid grey;
            display: flex;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .namai {
            width: 45%;
            padding-left: 5%;
            display: flex;
        }

        .namai img {
            width: 100px;
            height: 100px;
            border: 1px solid grey;
        }

        .nmproduk h6 {
            margin-top: 10px;
            margin-left: 10px;
            color: black;
        }

        .nmproduk p {
            margin-left: 10px;
            color: grey;
        }

        .hargai {
            width: 13%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .qtyi {
            width: 15%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .qtyi .fad {
            color: black;
            transition: all .5s ease;
            display: flex;
            justify-content: center;
            padding-top: 5px;
        }

        .qtyi .fad:hover {
            color: darkgray;
        }

        .inputan {
            background-color: transparent;
            color: black;
            border: 0px;
            text-align: center;
            width: 40px;
            outline: none;
            transition: all .5s ease;
            cursor: pointer;
        }

        .inputan:focus {
            border: 0px;
            box-shadow: 0 0 10px #eb716f77;
            border-radius: 4px;
        }

        .totali {
            width: 15%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .aksii {
            width: 12%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .futer {
            background-color: #FFFFE5;
            margin-top: 10px;
            padding-top: 15px;
            padding-bottom: 15px;
        }

        .pro button {
            margin-top: 35px;
            margin-left: 50px;
            padding-left: 40px;
            padding-right: 40px;
        }

        .sub p {
            color: black;
            font-size: 18px;
        }

        .sub b {
            color: red;
            font-size: 25px;
        }

        .check button {
            width: 53%;
        }
    </style>
</head>

<body>
    <?php
    include "navbar.php";
    include "navbar_2.php";
    ?>
    <div class="container-fluid judul">
        <h2>Keranjang Belanja</h2>
    </div>

    <div class="container produkheader">
        <div class="nama"><b>Produk</b></div>
        <div class="harga"><b>Harga Satuan</b></div>
        <div class="qty"><b>Kuantitas</b></div>
        <div class="total"><b>Total Harga</b></div>
        <div class="aksi"><b>Aksi</b></div>
    </div>
    <?php
    foreach ($_SESSION["keranjang"] as $id_variasi => $jumlah) {
        $sql = mysqli_query($con, "select * from tb_produk_variasi v INNER JOIN tb_produk p ON v.id_produk=p.id_produk where v.id_variasi='$id_variasi'");
        $d = mysqli_fetch_assoc($sql);
        $subtotal = $d["harga_variasi"] * $jumlah;
        $total = $total + $subtotal;
    ?>
        <div class="container produkitem">
            <div class="namai">
                <div class="gambar"><a href="produk_detail.php?id=<?= $d['id_produk'] ?>"><img src="admin/images/produk/<?= $d['gambar_produk']; ?>" alt=""></a></div>
                <div class="nmproduk">
                    <a href="produk_detail.php?id=<?= $d['id_produk'] ?>">
                        <h6>
                            <?php echo $d["nama_depan"];
                            echo " ";
                            echo $d["nama_belakang"]; ?>
                        </h6>
                    </a>
                    <p>Variasi: <?= $d['nama_variasi']; ?> <?= $d['berat']; ?>gr </p>
                </div>
            </div>
            <div class="hargai">Rp <?php echo number_format($d["harga_variasi"]); ?></div>
            <div class="qtyi">
                <div class="row" style="width:130px; height:35px;">
                    <div class="col" style="padding:0px; padding-top:5px; border: 1px solid darkgray;"><a href="keranjang_aksi.php?p=kurangi&id=<?php echo $id_variasi ?>"><i class="fad fa-minus"></i></a></div>
                    <div class="col" style="padding:0px; padding-top:5px; border-top: 1px solid darkgray;border-bottom: 1px solid darkgray;">
                        <form action="keranjang_aksi.php?p=input" method="post">
                            <input type="text" name="jumlah" class="inputan" value="<?php echo $jumlah; ?>">
                            <input type="hidden" name="id" value="<?php echo $id_variasi ?>">
                        </form>
                    </div>
                    <div class="col" style="padding:0px; padding-top:5px; border: 1px solid darkgray;"><a href="keranjang_aksi.php?p=tambah&id=<?php echo $id_variasi ?>"><i class="fad fa-plus"></i></a></div>
                </div>
            </div>
            <div class="totali">Rp <?php echo number_format($subtotal); ?></div>
            <div class="aksii">
                <button data-toggle="modal" data-target="#myHapus<?php echo $id_variasi ?>" class="btn btn-outline-light">Hapus</button>
            </div>
        </div>
        <!-- modal untuk hapus -->
        <div class="modal fade" id="myHapus<?php echo $id_variasi ?>">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin?
                    </div>
                    <div class="modal-footer">
                        <a href="keranjang_aksi.php?p=hapus&id=<?php echo $id_variasi ?>" class="btn btn-warning">&nbsp; Iya &nbsp;</a> &nbsp;
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- akhir modal untuk hapus -->
    <?php } ?>

    <div class="container futer">
        <div class="row">
            <div class="col-sm-8 pro">
                <a href=".#produk"><button class="btn btn-outline-dark">Produk Lainnya</button></a>
            </div>
            <div class="col-sm-4 sub">
                <div class="sub">
                    <p>Subtotal : <b>Rp <?php echo number_format($total) ?></b></p>
                </div>
                <div class="check">
                    <a href="keranjang_checkout.php"><button class="btn btn-danger"> Checkout </button></a>
                </div>
            </div>

        </div>
    </div>



    <!-- Awal footer -->
    <footer class="ftco-footer py-5 mt-5">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> Selamat menikmati produk kopi kami | by <a href="index.php" target="_blank"> Pondok Kopi 57.58</a>
                    </p>

                    <ul class="ftco-footer-social p-0">
                        <li class="ftco-animate"><a href="#"><span><i class="fab fa-twitter"></i></span></a></li>
                        <li class="ftco-animate"><a href="#"><span><i class="fab fa-facebook-f"></i></span></a></li>
                        <li class="ftco-animate"><a href="#"><span><i class="fab fa-instagram"></i></span></a></li>
                        <li class="ftco-animate"><a href="#"><span><i class="fab fa-pinterest-p"></i></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- akhir footer -->

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>

    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>