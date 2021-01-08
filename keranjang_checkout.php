<?php
session_start();
include "koneksi/koneksi.php";

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
            margin-bottom: 20px;
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
            width: 27%;
            text-align: center;
        }

        .produkitem {
            background: #FFFFE5;
            color: black;
            padding: 10px;
            border-top: 2px solid #9da1a5;
            display: flex;
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
            border: 1px solid lightcoral;
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

        .totali {
            width: 27%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .futer {
            background-color: #FFFFE5;
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

        .alamat {
            background: #FFFFE5;
            color: black;
            padding: 20px;
        }

        .alamat h5 {
            color: red;
        }

        .area {
            width: 100%;
            background: rgba(255, 255, 255, 0.1);
            color: black;
            border: 1px solid #9da1a5;
            padding: 1em .5em .5em;
            outline: none;
        }

        form textarea::placeholder {
            color: darkred;
        }

        .custom-select {
            background: #FFFFE5;
            color: black;
            cursor: pointer;
            border: 1px solid #9da1a5;
            border-radius: 0px;
        }

        .btn-danger {
            width: 100%;
        }
    </style>
</head>

<body>
    <?php
    include "navbar.php";
    ?>

    <div class="container-fluid judul">
        <h2>checkout</h2>
    </div>

    <div class="container mt-1 produkheader">
        <div class="nama"><b>Produk</b></div>
        <div class="harga"><b>Harga Satuan</b></div>
        <div class="qty"><b>Kuantitas</b></div>
        <div class="total"><b>Total Harga</b></div>
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
            <div class="qtyi"><?php echo $jumlah; ?></div>
            <div class="totali">Rp <?php echo number_format($subtotal); ?></div>
        </div>
    <?php } ?>
    <div class="container futer">
        <div class="row">
            <div class="col-sm-9 pro"></div>
            <div class="col-sm-3 sub">
                <div class="sub">
                    <p>Subtotal : <b>Rp <?php echo number_format($total) ?></b></p>
                </div>
            </div>

        </div>
    </div>

    <form action="" method="post">
        <div class="container mt-1 alamat">
            <div class="row">
                <h5>&nbsp;<i class="fad fa-map-marker-alt"></i> Alamat Pengiriman</h5>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <?php
                    $sql = mysqli_query($con, "select * from tb_pelanggan where id_pelanggan='$_SESSION[id_pelanggan]'");
                    $dp = mysqli_fetch_assoc($sql);
                    ?>
                    <b><?php echo $dp['nama'] ?><br>
                        <?php echo $dp['no_telp'] ?></b>
                </div>
                <div class="col-sm-7">
                    <div class="form-group">
                        <textarea class="area" name="alamat_lengkap" id="alamat_lengkap" placeholder="Tuliskan alamat pengiriman lengkap serta (kode pos)" required></textarea>
                    </div>
                </div>
                <div class="col-sm-3">
                    <select class="custom-select custom-select-sm mb-3" name="id_ongkir" id="id_ongkir" required>
                        <option value="">---Pilih Kota---</option>
                        <?php
                        $sql = mysqli_query($con, "select * from tb_ongkir");
                        while ($perongkir = mysqli_fetch_assoc($sql)) {
                        ?>
                            <option value="<?php echo $perongkir['id_ongkir'] ?>">
                                <?php echo $perongkir['nama_kota'] ?> -
                                Rp <?php echo number_format($perongkir['harga_ongkir']) ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="container mt-1 alamat">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-3">
                    <button class="btn btn-danger" name="checkout">Buat Pesanan</button>
                </div>
            </div>
        </div>

    </form>
    <?php
    if (isset($_POST["checkout"])) {
        $id_pelanggan = $_SESSION['id_pelanggan'];
        $id_ongkir = $_POST['id_ongkir'];
        $alamat_lengkap = $_POST['alamat_lengkap'];
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_pesanan = date("Y-m-d H:i:s");
        $sql = mysqli_query($con, "select * from tb_ongkir where id_ongkir='$id_ongkir'");
        $d = mysqli_fetch_assoc($sql);
        $tarif = $d['harga_ongkir'];
        $total_pesanan = $total + $tarif;


        //menyimpan ke tb_pesan
        $sql = mysqli_query($con, "insert into tb_pesan(tanggal_pesan,tanggal_terima,status,total,alamat_lengkap,id_pelanggan,id_ongkir)
                                            values ('$tanggal_pesanan','','belum bayar','$total_pesanan','$alamat_lengkap','$id_pelanggan','$id_ongkir')");


        //mendapatkan id pembelian yang barusan
        $id_pesanan_barusan = mysqli_insert_id($con);

        //menyimpan ke tb_pesan_detail
        foreach ($_SESSION["keranjang"] as $id_variasi => $jumlah) {
            $sql = mysqli_query($con, "select * from tb_produk_variasi where id_variasi='$id_variasi'");
            $data = mysqli_fetch_assoc($sql);
            $subtotal = $data['harga_variasi'] * $jumlah;
            $sqlstok = $data['stok'] - $jumlah;
            mysqli_query($con, "insert into tb_pesan_detail(jumlah,subtotal,id_variasi,id_pesan)
                                            values ('$jumlah','$subtotal','$id_variasi','$id_pesanan_barusan')");
            mysqli_query($con, "update tb_produk_variasi set stok=$sqlstok where id_variasi='$data[id_variasi]' ");
        }

        unset($_SESSION['keranjang']);
        echo "<script>location='keranjang_nota.php?id=$id_pesanan_barusan'</script>";
    }
    ?>
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