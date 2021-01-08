<?php
session_start();
include "koneksi/koneksi.php";
// echo '<pre>';
// print_r($_SESSION['keranjang']);
// echo '</pre>';
if (empty($_SESSION['id_pelanggan'])) {
  echo "<script>alert('Silahkan login!'); location='login.php' </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pembayaran</title>
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
    .inputDnD .form-control-file {
      position: relative;
      width: 100%;
      height: 100%;
      min-height: 6em;
      outline: none;
      visibility: hidden;
      cursor: pointer;
      background-color: #c61c23;
      box-shadow: 0 0 5px solid currentColor;
    }

    .inputDnD .form-control-file:before {
      content: attr(data-title);
      position: absolute;
      top: 0.5em;
      left: 0;
      width: 100%;
      min-height: 6em;
      line-height: 2em;
      padding-top: 1.5em;
      opacity: 1;
      visibility: visible;
      text-align: center;
      border: 0.25em dashed currentColor;
      -webkit-transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
      transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
      overflow: hidden;
    }

    .inputDnD .form-control-file:hover:before {
      border-style: solid;
      box-shadow: inset 0px 0px 0px 0.25em currentColor;
    }
  </style>
</head>

<body>


  <?php
  include "navbar.php";
  ?>

  <?php
  $idpesan = $_GET['id'];
  $sql = mysqli_query($con, "select * from tb_pesan where id_pesan ='$idpesan'");
  $data = mysqli_fetch_assoc($sql);
  $idpelangganyangbeli = $data["id_pelanggan"];
  $idpelangganyanglogin = $_SESSION["id_pelanggan"];
  if ($idpelangganyangbeli !== $idpelangganyanglogin) {
    echo "<script>alert('jangan nakal');location='pesanan.php'</script>";
  }
  ?>
  <section class="ftco-section">
    <div class="container" style="height:350px">
      <div class="row">
        <div class="col"></div>
        <div class="col">
          <?php if ($data['status'] == "belum bayar") { ?>
            <div class="alert alert-info">
              Total tagihan anda untuk pesanan ini <b>Rp. <?= number_format($data["total"]) ?></b>
            </div>
            <form action="pesanan_aksi.php?p=cekbayar&id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">
              <h4>Upload bukti pembayaran</h4>
              <button type="button" class="btn btn-secondary btn-block" onclick="document.getElementById('inputFile').click()">Tambah File Gambar</button>
              <div class="form-group inputDnD">
                <label class="sr-only" for="inputFile">File Upload</label>
                <input type="file" class="form-control-file text-secondary font-weight-bold" name="xgambar" id="inputFile" accept="image/*" onchange="readUrl(this)" data-title="Drag and drop a file" required>
              </div>
              <button class="btn btn-dark" type="submit">Simpan</button>
            </form>

          <?php } else if ($data['status'] == "verifikasi") { ?>
            <form action="pesanan_aksi.php?p=cekbayar&id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">
              <h3>Terimakasih, Anda Sudah melakukan pembayaran</h3><br><br>
              <div class="alert alert-info">
                Total tagihan anda untuk pesanan ini <b>Rp. <?= number_format($data["total"]) ?></b>
              </div>
              <h5>Upload ulang struk pembayaran?</h5>
              <button type="button" class="btn btn-secondary btn-block" onclick="document.getElementById('inputFile').click()">Tambah File Gambar</button>
              <div class="form-group inputDnD">
                <label class="sr-only" for="inputFile">File Upload</label>
                <input type="file" class="form-control-file text-secondary font-weight-bold" name="xgambar" id="inputFile" accept="image/*" onchange="readUrl(this)" data-title="Drag and drop a file" required>
              </div>
              <button class="btn btn-dark" type="submit">Simpan</button>
            </form>
          <?php } ?>
        </div>
        <div class="col"></div>
      </div>
    </div>
  </section>


  <!-- Awal footer -->
  <footer class="ftco-footer py-5">
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script>
    function readUrl(input) {

      if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = e => {
          let imgData = e.target.result;
          let imgName = input.files[0].name;
          input.setAttribute("data-title", imgName);
          console.log(e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }

    }
  </script>
</body>

</html>