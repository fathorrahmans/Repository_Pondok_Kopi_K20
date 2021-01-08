<?php
session_start();
include "koneksi/koneksi.php";

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

        .atas {
            left: 10%;
            right: 10%;
            border-bottom: 1px solid grey;
        }

        .atas .p2 {
            text-align: right;
            padding-top: 10px;
        }

        .atas span {
            text-transform: uppercase;
            color: lightsalmon;
            font-size: 15px;
        }

        .atas .p1 {
            padding-top: 10px;
        }

        .produkheader {
            background: #272323;
            color: darkgray;
            /* border: 1px solid grey; */
            margin-bottom: 10px;
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

        .sub p {
            color: darkgray;
            font-size: 18px;
        }

        .bawah {
            left: 10%;
            right: 10%;
            border-top: 1px solid grey;
        }

        .pro button {
            margin-top: 10px;
            margin-left: 50px;
            margin-bottom: 10px;
        }

        .sub b {
            color: lightsalmon;
            font-size: 25px;
        }
    </style>
</head>

<body>
    <?php
    include "navbar.php";
    include "navbar_2.php";
    ?>

    <div class="container-fluid judul">
        <h2>semua pesanan</h2>
    </div>
    <?php
    $sql = mysqli_query($con, "select * from tb_pesan p where p.id_pelanggan='$_SESSION[id_pelanggan]'");
    while ($da = mysqli_fetch_assoc($sql)) {
    ?>
        <div class="container mt-1 produkheader">
            <div class="row atas">
                <div class="col-sm-8">
                    <p class="p1">Tanggal Pesan | <span><?= date('d - m - Y', strtotime($da['tanggal_pesan'])) ?></span></p>
                </div>
                <div class="col-sm-4">
                    <p class="p2">Status Pesanan | <span><?php echo $da['status'] ?></span></p>
                </div>
            </div>
            <?php
            $idp = $da['id_pesan'];
            $sqli = mysqli_query($con, "SELECT * FROM tb_pesan_detail d INNER JOIN tb_produk_variasi v ON d.id_variasi=v.id_variasi INNER JOIN tb_produk p ON v.id_produk=p.id_produk WHERE d.id_pesan='$idp'");
            while ($d = mysqli_fetch_assoc($sqli)) {
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
                <div class="col-sm-8 pro">
                    <a href="pesanan_detail.php?id=<?php echo $da['id_pesan'] ?>"><button class="btn btn-outline-light">Tampilkan Rincian Pesanan</button></a>
                    <?php if ($da['status'] == 'belum bayar') { ?>
                        <a href="pesanan_buktibayar.php?id=<?php echo $da['id_pesan'] ?>"><button class="btn btn-danger">Upload Bukti Pembayaran</button></a>
                    <?php } else if ($da['status'] == 'sudah bayar') { ?>
                        <a href="pesanan_buktibayar.php?id=<?php echo $da['id_pesan'] ?>"><button class="btn btn-outline-danger">Upload Ulang Pembayaran</button></a>
                    <?php } ?>
                </div>
                <div class="col-sm-4 sub">
                    <div class="sub">
                        <p>Total Pesanan : <b>Rp <?= number_format($da['total']) ?></b></p>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>



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

</body>

</html>