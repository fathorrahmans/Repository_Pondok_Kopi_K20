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
	<link rel="stylesheet" href="css/swiper.min.css">

	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/fontawesome5/css/all.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/banner.css">


</head>

<body>

	<div id="navbar">
		<div id="rc_logo">
			<a href="."><img src="images/logo_pkopi1.png" alt="" width="50px"></a> <!-- Swap this placeholder out for your logo image -->
		</div>
		<div class="rc_nav" id="centered_nav">
			<a href="#home" title="Home" data-scroll="home" class="dot">Beranda</a>
			<a href="#produk" title="Produk" data-scroll="produk" class="dot">Produk</a>
			<a href="#profil" title="About" data-scroll="profil" class="dot">Profil</a>
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
						<button class="dropbtn" value="">
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


	<!-- Beranda -->
	<section id="home" style="padding-top: 55px;">
		<div class="swiper-container">
			<div class="parallax-bg" data-swiper-parallax="-23%"><img src="admin/images/banner/paralax.jpg" style="width: 100%; height: 1000px;"></div>
			<div class="swiper-wrapper">
				<div class="swiper-slide"><img src="admin/images/banner/banner3.jpg" alt="">
					<div class="title" data-swiper-parallax="-300">
						Pondok Kopi 57.58
						<p>Ngopimu ojok sampek ngalangi ngajimu </p>
					</div>
				</div>
				<div class="swiper-slide"><img src="admin/images/banner/banner4.jpg" alt="">
					<div class="title" data-swiper-parallax="-300">Pondok Kopi 57.58
						<p>Ngopimu ojok sampek ngalangi ngajimu</p>
					</div>
				</div>
				<div class="swiper-slide"><img src="admin/images/banner/banner.jpg" alt="">
					<div class="title" data-swiper-parallax="-300">Pondok Kopi 57.58
						<p>Ngopimu ojok sampek ngalangi ngajimu</p>
					</div>
				</div>
			</div>
			<!-- Add Pagination -->
			<div class="swiper-button-prev swiper-button-white"></div>
			<div class="swiper-button-next swiper-button-white"></div>
		</div>
	</section>
	<!-- Akhir Beranda -->

	<section id="produk" class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-4 heading-section text-center ftco-animate pb-5">
					<h2 class="mb-4">Produk Kopi</h2>
					<p>Silahkan pilih produk dibawah ini.</p>
				</div>
			</div>
		</div>
		<div class="container-fluid px-md-0">
			<div class="row no-gutters">

				<div class="grid ">
					<?php
					include "koneksi/koneksi.php";
					$sql = mysqli_query($con, "select * from tb_produk");
					while ($d = mysqli_fetch_assoc($sql)) {
					?>
						<figure class="effect-milo ftco-animate">
							<img src="admin/images/produk/<?= $d['gambar_produk'] ?>" alt="img03">
							<figcaption>
								<h2><?= $d['nama_depan'] ?> <span><?= $d['nama_belakang'] ?></span></h2>
								<p><?= $d['deskripsi_singkat'] ?></p>
								<a href="produk_detail.php?id=<?= $d['id_produk'] ?>">View more</a>
							</figcaption>
						</figure>
					<?php } ?>
				</div>

			</div>
		</div>
	</section>


	<!-- Tentang kami -->
	<section class="ftco-about img ftco-section" id="profil" style="background: #FFFFF5; color: black;">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-4 heading-section text-center ftco-animate pb-5">
					<h2 class="mb-4" style="color: black;">Tentang Kami</h2>
					<p>Kopi itu bagaikan kehidupan ada manisnya ada pahitnya, manisnya ketika kamu mensyukuri nikmat tuhan, dan pahitnya ketika kamu melupakan tuhan.</p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row d-flex no-gutters">
				<div class="col-md-12 col-lg-12 pl-md-5">
					<div class="heading-section ftco-animate">
						<h2 class="mb-4" style="color: black;">Pondok kopi 57.58 <br> produk asli dari lereng pengunungan jember </h2>
						<p>Pengasuh Ponpes Al Hasan 1 di dalam meningkatkan SDM Santri dan masyarakat petani kopi dilereng pegunungan Argopuro Jember beliau memberikan pembelajaran berwirausaha di pabrik Pondok Kopi 57.58
						</p>
						<p>Khususnya dibidang Marketing dan Processing Kopi hingga menjadi bubuk Kopi siap saji atas didikan Pembina Ponpes Al Hasan 1 Agus Misbachul Khoiri Ali sekaligus menantu Pengasuh Ponpes Al Hasan 1 dan sebagai business owner (pemilik usaha) pabrik Pondok Kopi 57.58.
						</p>
						<a href="tentang_kami_detail.php" class="btn btn-outline-dark">Baca Selengkapnya...</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Akhir Tentang kami -->

	<section class="ftco-about img ftco-section" id="profil">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-4 heading-section text-center ftco-animate pb-5">
					<h2 class="mb-4" style="color: black;">News Pondok Kopi</h2>
					<p>Seputar Berita dari Pondok Kopi 57.58</p>
				</div>
			</div>
		</div>
		<div class="container">
			<?php
			$sql = mysqli_query($con, "SELECT * FROM `tb_berita` ORDER BY id_berita DESC LIMIT 1");
			$db = mysqli_fetch_assoc($sql);
			?>
			<div class="row d-flex no-gutters">
				<div class="col-md-6 col-lg-6 d-flex">
					<div class="img-about img d-flex align-items-stretch">
						<div class="img img-video d-flex align-self-stretch align-items-center" style="background-image:url(admin/images/berita/<?= $db['gambar_berita']; ?>); height:400px;">
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-6 pl-md-5">
					<div class="heading-section ftco-animate">
						<h2 class="mb-4" style="color: black;"><?= $db['judul_berita']; ?></h2>
						<p><?= $db['isi_singkat']; ?></p>
						<a href="berita_detail.php?id=<?= $db['id_berita']; ?>" class="btn btn-outline-dark">Baca Selengkapnya...</a>
					</div>
				</div>
			</div>
			<div style="display: flex; justify-content: center; margin-top: 50px;">
				<a href="berita.php" class="btn btn-dark mt-2" style="padding: 10px 30px; font-size: 13px;">SEMUA BERITA</a>
			</div>
		</div>
	</section>


	<!-- Kontak kami -->
	<section class="ftco-section contact-section" id="kontak" style="background: #FFFFF5;">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-4 heading-section text-center ftco-animate">
					<h2 class="mb-4">Kontak Kami</h2>
					<p>Jika ada pertanyaan hubungi admin kita ya kakak :)</p>
				</div>
			</div>

			<div class="row mb-5">
				<div class="col-md-3 d-flex ftco-animate">
					<div class="align-self-stretch box text-center p-4">
						<div class="icon d-flex align-items-center justify-content-center">
							<span><i class="fad fa-map-marker-alt"></i></span>
						</div>
						<div>
							<h3 class="mb-4">Alamat</h3>
							<p>Desa Kemiri - Panti, Kab. Jember <br>Jawa Timur</p>
						</div>
					</div>
				</div>
				<div class="col-md-3 d-flex ftco-animate">
					<div class="align-self-stretch box text-center p-4">
						<div class="icon d-flex align-items-center justify-content-center">
							<span><i class="fab fa-whatsapp"></i></span>
						</div>
						<div>
							<a href="https://api.whatsapp.com/send?phone=+628123456789&text=Halo?">
								<h3 class="mb-4">WhatsApp</h3>
								<button class="btn btn-danger btn-sm">WhatsApp</button>
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 d-flex ftco-animate">
					<div class="align-self-stretch box text-center p-4">
						<div class="icon d-flex align-items-center justify-content-center">
							<span><i class="fad fa-envelope-open-text"></i></span>
						</div>
						<div>
							<h3 class="mb-4">Alamat E-mail</h3>
							<p><a href="mailto:info@yoursite.com">ppalhasan01@gmail.com</a></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 d-flex ftco-animate">
					<div class="align-self-stretch box text-center p-4">
						<div class="icon d-flex align-items-center justify-content-center">
							<span><i class="fab fa-youtube"></i></span>
						</div>
						<div>
							<h3 class="mb-4">YouTube</h3>
							<p><a href="#">Pondok Kopi 57.58</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Akhir kontak kami -->


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
	<script src="js/main.js"></script>
	<script src="js/swiper.js"></script>
	<script>
		var swiper = new Swiper('.swiper-container', {
			effect: 'coverflow',
			centeredSlides: true,
			slidesPerView: 'auto',
			speed: 1000,
			parallax: true,
			coverflowEffect: {
				rotate: 50,
				stretch: 0,
				depth: 500,
				modifier: 1,
				slideShadows: true,
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			loop: true,
			autoplay: {
				delay: 5000,
				disableOnInteraction: true,
			},
		});
	</script>

</body>

</html>