<?php
session_start();
include "koneksi/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Detail Produk</title>
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

  </style>
</head>

<body>
  <?php include "navbar.php" ?>

  <section class="ftco1" style="background: white; color: black;">
    <div class="container ">
      <div class="row ">
        <?php
        $id = $_GET['id'];
        $sql = mysqli_query($con, "SELECT * FROM tb_produk WHERE id_produk='$id'");
        $d = mysqli_fetch_assoc($sql);
        ?>
        <div class="col-md-6  d-flex align-items-stretch">
          <div class="img w-100" style="background-image: url(admin/images/produk/<?= $d['gambar_produk'] ?>); width:500px; height:600px;"></div>
        </div>
        <div class="col-md-6 py-md-5" style="background: #FFFFF5;">
          <div class="text pl-md-5 py-5" id="variasi">
            <h2 style="color: black;"><?= $d['nama_depan'] ?> <?= $d['nama_belakang'] ?></h2>
            <p><?= $d['deskripsi'] ?></p>

            <div style="color: black; font-weight: 700; letter-spacing: 1px;">Variasi : <br></div>
            <?php
            $id = $_GET['id'];
            $no = 1;
            $sql = mysqli_query($con, "select * from tb_produk_variasi where id_produk='$id'");
            while ($d = mysqli_fetch_assoc($sql)) {
              $totalstok = $totalstok + $d['stok'];
            ?>
              <button class="btn btn-outline-dark btn-sm" value="<?= $d['id_variasi']; ?>" name="variasi" id="btn<?= $no++ ?>">
                <?= $d['nama_variasi']; ?> <?= $d['berat']; ?>gr </button>
            <?php } ?>
            <div class="mt-4 mb-3">
              <span> Harga : <b id="h" style="font-size: 20px; color:darkred"></b></span> <br>
              <span> Stok Tersisa <b id="p" style="color: darkred"><?= $totalstok ?></b> buah</span>
            </div>
            <button class="btn btn-danger" id="btnkrjg">Masukkan Keranjang</button>
            <div class="mt-3" id="alert" style="width: 50%;"></div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- Awal footer -->
  <footer class="ftco-footer py-5 mt-5">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12 text-center">

          <p>
            Copyright &copy;<script>
              document.write(new Date().getFullYear());
            </script> Selamat menikmati produk kopi kami | by <a href="index.php" target="_blank" style="color: black;"> Pondok Kopi 57.58</a>
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
  <script>
    $(document).ready(function() {
      <?php
      $id = $_GET['id'];
      $no = 1;
      $sql = mysqli_query($con, "select * from tb_produk_variasi where id_produk='$id'");
      while ($d = mysqli_fetch_assoc($sql)) {
      ?>

        $("#btn<?= $no++ ?>").click(function() {
          $("#h").text("Rp <?= number_format($d['harga_variasi']) ?>");
          $("#p").text("<?= $d['stok']; ?>");
          $(".btn-sm").removeClass("active");
          $(this).addClass("active");
        });
      <?php } ?>



      $('#btnkrjg').click(function() {
        var nilai = $('.active').val();
        if (typeof nilai == 'undefined') {
          $('#alert').empty();
          $('#alert').append(`
            <div class="alert alert-warning fade show">
              <span type="button" class="close" data-dismiss="alert">&times;</span>
              Silahkan pilih <b>Variasi!</b>
            </div>
          `);
        } else {
          location.href = 'keranjang_aksi.php?p=tambah&id=' + nilai;
        }
      });
    });
  </script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

</body>

</html>