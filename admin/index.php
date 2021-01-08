<?php
session_start();
include "../koneksi/koneksi.php";

if (!empty($_SESSION['level'])) {
?>


  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Pondok Kopi</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/fontawesome5/css/all.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.red.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- datatable -->
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    <!-- datepicker -->
    <link rel="stylesheet" href="css/my-style.css">




  </head>

  <body>
    <header class="header">
      <nav class="navbar navbar-expand-lg">
        <!-- pencarian/search -->
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn">Close X</div>
            <form id="searchForm" action="#">
              <div class="form-group">
                <input type="search" name="search" placeholder="What are you searching for...">
                <button type="submit" class="submit">Search</button>
              </div>
            </form>
          </div>
        </div>
        <!-- akhir pencarian/search -->

        <div class="container-fluid d-flex align-items-center justify-content-between">

          <!-- judul admin -->
          <div class="navbar-header">
            <!-- Navbar Header--><a href="index.html" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Pondok</strong> <strong>Kopi</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">57</strong><strong>58</strong></div>
            </a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fad fa-long-arrow-left"></i></button>
          </div>
          <!-- akhir judul admin -->

          <div class="right-menu list-inline no-margin-bottom">
            <!-- icon search    -->
            <div class="list-inline-item"><a href="#" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a></div>

            <!-- Log out               -->
            <div class="list-inline-item logout"><a id="logout" href=".?page=logout" class="nav-link"> <span class="d-none d-sm-inline">Logout </span><i class="icon-logout"></i></a></div>
          </div>
        </div>
      </nav>
    </header>

    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div><i class="fad fa-user" style="font-size: 35px; padding:10px; color:red;"></i></div>
          <div class="title">
            <h1 class="h5"><?= $_SESSION['namaptg'] ?></h1>
            <p><?= $_SESSION['level'] ?></p>
          </div>
        </div>
        <!-- <div class="container" style="background:white;">
          <pre>
				<?php
        echo '<pre>';
        echo "Cek pelanggan yang login... <br>";
        echo "Id   : ";
        print_r($_SESSION["id_petugas"]);
        echo "<br>";
        echo "Nama : ";
        print_r($_SESSION['namaptg']);
        echo "<br>";
        echo "Level : ";
        print_r($_SESSION['level']);
        echo '</pre>';

        ?>
				</pre>
        </div> -->
        <!-- Sidebar Navidation Menu -->
        <ul class="list-unstyled">
          <li id="list1"><a href="."><i class="fad fa-home"></i>Beranda </a></li>
          <?php if ($_SESSION['level'] == "admin") { ?>
            <li id="list2"><a href=".?page=petugas"><i class="fad fa-user"></i>Petugas </a></li>
            <li id="list3"><a href=".?page=pelanggan"><i class="fad fa-user"></i>Pelanggan </a></li>
            <li id="list4"><a href=".?page=pesanan"><i class="fad fa-bags-shopping"></i>Pesanan </a></li>
            <li id="list5"><a href=".?page=produk"><i class="fad fa-box-alt"></i>Produk </a></li>
            <li id="list6"><a href=".?page=kota"><i class="fad fa-car-building"></i>Daftar Kota </a></li>
            <li id="list7"><a href=".?page=galeri"><i class="fad fa-images"></i>Galeri </a></li>
            <li id="list8"><a href=".?page=berita"><i class="fad fa-newspaper"></i>Berita </a></li>
            <li id="list9"><a href=".?page=laporan"><i class="fad fa-clipboard"></i>Laporan Pesanan </a></li>
          <?php } else if ($_SESSION['level'] == "karyawan") { ?>
            <li id="list3"><a href=".?page=pelanggan"><i class="fad fa-user"></i>Pelanggan </a></li>
            <li id="list4"><a href=".?page=pesanan"><i class="fad fa-bags-shopping"></i>Pesanan </a></li>
            <li id="list5"><a href=".?page=produk"><i class="fad fa-box-alt"></i>Produk </a></li>
            <li id="list6"><a href=".?page=kota"><i class="fad fa-car-building"></i>Daftar Kota </a></li>
          <?php } else if ($_SESSION['level'] == "pemilik") { ?>
            <li id="list9"><a href=".?page=laporan"><i class="fad fa-clipboard"></i>Laporan Pesanan </a></li>
          <?php } ?>
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->

      <!-- Halaman konten kanan -->
      <div class="page-content">
        <?php
        $page = @$_GET['page'];
        $file = "$page.php";
        $home = "beranda.php";
        if (!empty($page) && file_exists($file)) {
          include "$file";
        } else {
          include "$home";
        }
        ?>

      </div>
      <!-- akhir halaman konten kanan -->
    </div>

    <!-- JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
    <script src="js/jquery-3.2.1.min"></script>
    <!-- datatable -->
    <script src="js/datatables.min.js"></script>
    <!-- js datepicker -->
    <script src="js/datedropper.js"></script>
    <script>
      $(document).ready(function() {
        <?php
        $page = $_GET['page'];
        if ($page == "petugas") {
        ?>
          $('#list2').addClass("active");
        <?php } else if ($page == "pelanggan") { ?>
          $('#list3').addClass("active");
        <?php } else if ($page == "pesanan") { ?>
          $('#list4').addClass("active");
        <?php } else if ($page == "produk") { ?>
          $('#list5').addClass("active");
        <?php } else if ($page == "kota") { ?>
          $('#list6').addClass("active");
        <?php } else if ($page == "galeri") { ?>
          $('#list7').addClass("active");
        <?php } else if ($page == "berita") { ?>
          $('#list8').addClass("active");
        <?php } else if ($page == "laporan") { ?>
          $('#list9').addClass("active");
        <?php } else if ($page == "produk_variasi") { ?>
          $('#list5').addClass("active");
        <?php } else if ($page == "produk_variasi_tambah") { ?>
          $('#list5').addClass("active");
        <?php } else { ?>
          $('#list1').addClass("active");
        <?php } ?>
      });
    </script>
    <script>
      $('#date-input').dateDropper({
        large: true,
        largeDefault: true,
      });
      $('.date-input2').dateDropper({
        large: true,
        largeDefault: true,
      });
      $(document).ready(function() {
        $('#datatables').DataTable();
      });
    </script>
    <script>
      $(document).ready(function() { // Ketika halaman sudah diload dan siap
        $("#btn-tambah-form").click(function() { // Ketika tombol Tambah Data Form di klik
          var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
          var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

          // Kita akan menambahkan form dengan menggunakan append
          // pada sebuah tag div yg kita beri id insert-form
          $("#insert-form").append("<b>Data ke " + nextform + " :</b>" +
            "<table>" +
            "<tr>" +
            "<td>Nama Variasi</td>" +
            "<td><input type='text' name='vnama[]' class='form-control' required></td>" +
            "</tr>" +
            "<tr>" +
            "<td>Harga</td>" +
            "<td><input type='text' name='vharga[]' class='form-control' required></td>" +
            "</tr>" +
            "<tr>" +
            "<td>Stok</td>" +
            "<td><input type='text' name='vstok[]' class='form-control' required></td>" +
            "</tr>" +
            "<tr>" +
            "<td>Berat</td>" +
            "<td><input type='text' name='vberat[]' class='form-control' required></td>" +
            "</tr>" +
            // "<tr>" +
            // "<td>Gambar</td>" +
            // "<td><input type='file' name='vgambar[]' class='form-control' ></td>" +
            // "</tr>" +
            "<tr>" +
            "<td><input type='hidden' name='vid[]' value='<?php echo $id_produk ?>' class='form-control'></td>" +
            "</tr>" +
            "</table>" +
            "<br><br>");

          $("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
        });

        // Buat fungsi untuk mereset form ke semula
        $("#btn-reset-form").click(function() {
          $("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
          $("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
        });

      });
    </script>


  </body>

  </html>
<?php } else {
  include "login.php";
} ?>