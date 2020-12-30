<?php
session_start();
include "koneksi/koneksi.php";
if (empty($_SESSION['id_pelanggan'])) {
    echo "<script>location='login.php'</script>";
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

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/fontawesome5/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .judul {
            height: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-bottom: 1px solid rgb(112, 112, 112);
            margin-bottom: 20px;
        }

        .judul h2 {
            font-size: 25px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .produkheader {
            background: #272323;
            color: darkgray;
            /* border-top: 1px solid grey; */
            border-bottom: 1px solid grey;
            margin-bottom: 10px;
        }

        .notif {
            padding-top: 25px;
            color: grey;
        }

        .notif.active {
            color: lightcoral;
        }

        .notif i {
            font-size: 40px;
            display: flex;
            justify-content: center;
        }

        .notif p {
            margin-top: 15px;
            text-align: center;
        }

        .kirim p {
            font-size: 20px;
        }

        .namai {
            width: 50%;
            padding: 10px;
            padding-left: 5%;
            display: flex;
        }

        .namai img {
            width: 80px;
            height: 80px;
            border: 1px solid grey;
        }

        .nmproduk h6 {
            margin-top: 6px;
            margin-left: 15px;
            color: darkgray;
            margin-bottom: 0px;
        }

        .nmproduk p {
            margin-left: 15px;
            color: grey;
        }

        .totalii {
            padding: 10px;
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bawah {
            border-top: 1px solid rgb(112, 112, 112);
        }

        .bawah .k1 {
            border-right: 1px solid rgb(112, 112, 112);
            text-align: right;
            padding: 14px 20px;
        }

        .bawah .k2 {
            padding: 14px 50px;
        }

        .bawah .k3 {
            padding-left: 50px;
            color: lightsalmon;
            font-size: 25px;

        }

        .konfirm {
            padding: 20px;
            color: darkgray;
            text-align: center;
        }

        .konfirm h6 {
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .konfirm figure {
            max-width: 100%;
            max-height: 100%;

        }
    </style>
</head>

<body>
    <?php
    include "navbar.php";
    include "navbar_2.php";
    ?>

    <div class="container-fluid judul">
        <h2>Detail pesanan</h2>
    </div>

    <div class="container">
        <div class="row" style="text-align: right;">
            <div class="col">
                <a href="pesanan.php"><i class="far fa-long-arrow-left"></i>&nbsp; KEMBALI</a>
            </div>
        </div>
    </div>
    <div class="container mt-1 produkheader">
        <div class="row">
            <?php
            $id = $_GET['id'];
            $sqlpesanan = mysqli_query($con, "select * from tb_pesan p left join tb_ongkir o on p.id_ongkir=o.id_ongkir where id_pesan='$id'");
            $datapesanan = mysqli_fetch_assoc($sqlpesanan);

            $sqlpelanggan = mysqli_query($con, "select * from tb_pelanggan where id_pelanggan='$datapesanan[id_pelanggan]'");
            $datapelanggan = mysqli_fetch_assoc($sqlpelanggan);
            ?>
            <div class="col notif active" id="s1">
                <i class="fad fa-receipt"></i>
                <p>Pesanan Dibuat <br> <?= date('d - m - Y H:i', strtotime($datapesanan['tanggal_pesan'])); ?></p>
            </div>
            <div class="col notif" id="s2">
                <i class="fad fa-dollar-sign"></i>
                <p><span id="s2p">Pesanan Dibayar</span></p>
            </div>
            <div class="col notif" id="s3">
                <i class="fad fa-shipping-fast"></i>
                <p>Pesanan Dikirim</p>
            </div>
            <div class="col notif" id="s4">
                <i class="fad fa-hand-receiving"></i>
                <p>Pesanan Diterima <br>
                    <?php if ($datapesanan['tanggal_terima'] != 0) { ?>
                        <?= date('d - m - Y H:i', strtotime($datapesanan['tanggal_terima'])); ?>
                    <?php } ?>
                </p>
            </div>
            <div class="col notif" id="s5">
                <i class="fad fa-check-double"></i>
                <p><span id="s5p">Pesanan Selesai</span> </p>
            </div>
        </div>
    </div>

    <div class="container produkheader pb-1">
        <div class="row">
            <div class="col kirim">
                <p>Alamat Pengiriman</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <b><?= $datapelanggan['nama']; ?></b> <br><?= $datapelanggan['no_telp']; ?><br><br>
                <?= $datapesanan['alamat_lengkap']; ?>
            </div>
        </div>
    </div>

    <div class="container produkheader">
        <?php
        $idp = $_GET['id'];
        $sqli = mysqli_query($con, "SELECT * FROM tb_pesan_detail d INNER JOIN tb_produk_variasi v ON d.id_variasi=v.id_variasi INNER JOIN tb_produk p ON v.id_produk=p.id_produk WHERE d.id_pesan='$idp'");
        while ($d = mysqli_fetch_assoc($sqli)) {
            $subtotal = $subtotal + $d['subtotal'];
        ?>
            <div class="row">
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
                        <p>Variasi: <?= $d['nama_variasi']; ?> <?= $d['berat']; ?>kg <br>
                            x <?= $d['jumlah']; ?></p>
                    </div>
                </div>
                <div class="totalii">Rp <?= number_format($d['harga_variasi']) ?></div>
            </div>
        <?php } ?>
        <div class="row bawah">
            <div class="col-sm-8 k1">Subtotal untuk produk</div>
            <div class="col-sm-4 k2">Rp <?= number_format($subtotal) ?></div>
        </div>
        <div class="row bawah">
            <div class="col-sm-8 k1">Ongkos Pengiriman</div>
            <div class="col-sm-4 k2">Rp <?= number_format($datapesanan['harga_ongkir']) ?></div>
        </div>
        <div class="row bawah">
            <div class="col-sm-8 k1">Total Pesanan</div>
            <div class="col-sm-4 k3">Rp <?= number_format($datapesanan['total']) ?></div>
        </div>
    </div>

    <div class="container produkheader pb-1">
        <div class="row">
            <div class="col konfirm">
                <h6>Konfirmasi Penerimaan</h6>
                <p>
                    <?php if ($datapesanan['status'] == "belum bayar") { ?>
                        <a href="pesanan_aksi.php?p=batal&id=<?php echo $id ?>" class="btn btn-outline-danger">Batalkan Pesanan</a>
                        <a href="keranjang_nota.php?id=<?php echo $id ?>" class="btn btn-outline-light">Nota Pembelian</a>
                    <?php } else if ($datapesanan['status'] == "sudah bayar") { ?>
                        <a href="keranjang_nota.php?id=<?php echo $id ?>" class="btn btn-outline-light">Nota Pembelian</a>
                    <?php } else if ($datapesanan['status'] == "sedang dikirim") { ?>
                        <a href="pesanan_aksi.php?p=diterima&id=<?php echo $_GET['id'] ?>" class="btn btn-outline-warning">Konfirmasi Diterima</a>
                        <a href="keranjang_nota.php?id=<?php echo $id ?>" class="btn btn-outline-light">Nota Pembelian</a>
                    <?php } else if ($datapesanan['status'] == "selesai") { ?>
                        <a href="keranjang_nota.php?id=<?php echo $id ?>" class="btn btn-outline-light">Nota Pembelian</a>
                    <?php } else if ($datapesanan['status'] == "dibatalkan") { ?>
                        <a href="keranjang_nota.php?id=<?php echo $id ?>" class="btn btn-outline-light">Nota Pembelian</a>
                    <?php } ?>
                </p>
            </div>
            <div class="col konfirm">
                <h6>Bukti Pembayaran</h6>
                <figure>
                    <?php $sqlgambar = mysqli_query($con, "select * from tb_pesan where id_pesan='$id'");
                    $datagambar = mysqli_fetch_assoc($sqlgambar);
                    ?>
                    <img src="admin/images/bukti/<?php echo $datagambar['bukti_bayar']; ?>" width="100%">
                </figure>
            </div>
        </div>
    </div>

    <!-- Awal footer -->
    <footer class="ftco-footer py-5" style="margin-top: 100px;">
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
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>

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
    <script>
        $(document).ready(function() {
            <?php
            $id = $_GET['id'];
            $sqle = mysqli_query($con, "select * from tb_pesan where id_pesan='$id'");
            $dat = mysqli_fetch_assoc($sqle);
            if ($dat['status'] == "belum bayar") {
            ?>
                $('#s2p').text('Belum Bayar');
            <?php } else if ($dat['status'] == "sudah bayar") { ?>
                $('#s2').addClass('active');
            <?php } else if ($dat['status'] == "sedang dikirim") { ?>
                $('#s2').addClass('active');
                $('#s3').addClass('active');
            <?php } else if ($dat['status'] == "selesai") { ?>
                $('#s2').addClass('active');
                $('#s3').addClass('active');
                $('#s4').addClass('active');
                $('#s5').addClass('active');
            <?php } else if ($dat['status'] == "dibatalkan") { ?>
                $('#s1').removeClass('active');
                $('#s2p').text('Belum Bayar');
                $('#s5p').text('Dibatalkan');
            <?php } ?>
        });
    </script>
</body>

</html>