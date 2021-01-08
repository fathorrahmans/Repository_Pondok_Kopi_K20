<div id="navbar">
  <div id="rc_logo">
    <a href="."><img src="images/logo_pkopi1.png" alt="" width="50px"></a> <!-- Swap this placeholder out for your logo image -->
  </div>
  <div class="rc_nav" id="centered_nav">
    <a href="./#home" title="Home" data-scroll="home" class="dot">Beranda</a>
    <a href="./#produk" title="Produk" data-scroll="produk" class="dot">Produk</a>
    <a href="./#profil" title="About" data-scroll="profil" class="dot">Profil</a>
    <a href="galeri.php" title="galeri">Galeri</a>
    <a href="javascript:void(0);" title="Menu" style="font-size:18px;" class="icon" onclick="myFunction()">&#9776;</a>
    <?php if (empty($_SESSION['id_pelanggan'])) { ?>
      <a href="login.php">Login / Daftar</a>
    <?php } else { ?>
      <a href="keranjang.php" class="keranjang">
        <?php
        $sumjumlah = 0;
        foreach ($_SESSION['keranjang'] as $id_variasi => $jumlah) {
          $sumjumlah = $sumjumlah + $jumlah;
        }
        ?>
        <i class="fad fa-shopping-cart" style="font-size: 23px;"></i><span class="cart-no"><?= $sumjumlah; ?></span>
      </a>
      <?php
      $sql = mysqli_query($con, "select * from tb_pelanggan where id_pelanggan='$_SESSION[id_pelanggan]'");
      $dp = mysqli_fetch_assoc($sql);
      ?>
      <div class="dropdown">
        <a href="#">
          <button class="dropbtn">
            <img src="<?= $dp['gambar_profil']; ?>" style="width: 25px; height: 25px; border-radius: 50%;">
            <?php echo $dp['nama'] ?>
          </button>
        </a>
        <div class="dropdown-content">
          <a href="akun_saya.php">Akun saya</a>
          <a href="pesanan.php">Pesanan</a>
          <a href="logout.php">LogOut</a>
        </div>
      </div>

    <?php } ?>
  </div>
</div>