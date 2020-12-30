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

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/fontawesome5/css/all.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/banner.css">
	<style>

	</style>
</head>

<body>
	<nav id="navbar" class="navbar">
		<ul class="nav-menu">
			<li>
				<a data-scroll="home" href="#home" class="dot active">
					<span>Beranda</span>
				</a>
			</li>
			<li>
				<a data-scroll="produk" href="#produk" class="dot">
					<span>Produk</span>
				</a>
			</li>
			<li>
				<a data-scroll="profil" href="#profil" class="dot">
					<span>Tentang</span>
				</a>
			</li>
			<li>
				<a data-scroll="galeri" href="#galeri" class="dot">
					<span>Galeri</span>
				</a>
			</li>
		</ul>
	</nav>
	<?php include "navbar_2.php"; ?>

	<!-- Beranda -->
	<section id="home" class="hero-wrap">
		<div class="swiper-container">
			<div class="parallax-bg" data-swiper-parallax="-23%"><img src="admin/images/banner/banner1.jpg" style="width: 100%; height: 1000px;"></div>
			<div class="swiper-wrapper">
				<div class="swiper-slide"><img src="images/banner.jpg" alt="">
					<div class="title" data-swiper-parallax="-300">
						Kopi Arabica
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
					</div>
				</div>
				<div class="swiper-slide"><img src="images/banner1.jpg" alt="">
					<div class="title" data-swiper-parallax="-300">Kopi Robusta
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
					</div>
				</div>
				<div class="swiper-slide"><img src="images/banner2.jpg" alt="">
					<div class="title" data-swiper-parallax="-300">Biji Kopi Roasting
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
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
					<p>Kopi itu bagaikan kehidupan ada manisnya ada pahitnya, manisnya ketika kamu mensyukuri nikmat tuhan, dan pahitnya ketika kamu melupakan tuhan.</p>
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
	<section class="ftco-about img ftco-section" id="profil">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-4 heading-section text-center ftco-animate pb-5">
					<h2 class="mb-4">Tentang Kami</h2>
					<p>Ngopimu ojok sampek ngalangi ngajimu</p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row d-flex no-gutters">
				<div class="col-md-6 col-lg-6 d-flex">
					<div class="img-about img d-flex align-items-stretch">
						<div class="overlay"></div>
						<div class="img img-video d-flex align-self-stretch align-items-center" style="background-image:url(images/tentangkami/robusta.jpg);">
							<div class="video justify-content-center">
								<a href="https://www.youtube.com/watch?v=vst9A0I2DNQ" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
									<i class="fas fa-play"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-6 pl-md-5">
					<div class="heading-section ftco-animate">
						<h2 class="mb-4">Pondok kopi 57.58 adalah produk <br>kopi asli dari jember</h2>
						<p>Pengasuh Ponpes Al Hasan 1 di dalam meningkatkan SDM Santri dan masyarakat petani kopi dilereng pegunungan Argopuro Jember beliau memberikan pembelajaran berwirausaha di pabrik Pondok Kopi 57.58
						</p>
						<p>Khususnya dibidang Marketing dan Processing Kopi hingga menjadi bubuk Kopi siap saji atas didikan Pembina Ponpes Al Hasan 1 Agus Misbachul Khoiri Ali sekaligus menantu Pengasuh Ponpes Al Hasan 1 dan sebagai business owner (pemilik usaha) pabrik Pondok Kopi 57.58.
						</p>

						<div class="counter-wrap ftco-animate d-flex my-md-4">
							<div class="text">
								<p class="mb-4">
									<span class="number" data-number="4">0</span>
									<span>Produk Tersedia</span>
								</p>
							</div>
						</div>
						<div class="d-flex w-100">
							<div class="img img-about-2 mr-2" style="background-image: url(images/tentangkami/biji1.jpg);"></div>
							<div class="img img-about-2 ml-2" style="background-image: url(images/tentangkami/biji2.jpg);"></div>
						</div>
						<blockquote class="blockquote mt-5">
							<p class="mb-2">"Apapun pekerjaanmu yang paling penting kamu menikmatinya seperti secangkir kopi dipagi hari ini, satu gelas kopi dan pikirkan gerak mencari solusi."</p>
							<span>&mdash; M Lutfi</span>
						</blockquote>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Akhir Tentang kami -->


	<!-- galeri  Section -->
	<section id="galeri" class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-4 heading-section text-center ftco-animate pb-5">
					<h2 class="mb-4">Galeri foto</h2>
					<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vel praesentium facilis ullam add?</p>
				</div>
			</div>
		</div>
		<div class="container-fluid px-md-0">
			<div class="row no-gutters">
				<?php
				include "koneksi/koneksi.php";
				$sql = mysqli_query($con, "select * from tb_galeri");
				while ($d = mysqli_fetch_assoc($sql)) {
				?>
					<div class="col-md-4 ftco-animate">
						<div class="model img d-flex align-items-end" style="background-image: url(admin/images/galeri/<?= $d['gambar'] ?>);">
							<a href="admin/images/galeri/<?= $d['gambar'] ?>" class="icon image-popup d-flex justify-content-center align-items-center">
								<span><i class="fas fa-expand-alt"></i></span>
							</a>
							<div class="desc w-100 px-4">
								<div class="text w-100 mb-3">
									<a href="galeri_detail.php?id=<?= $d['id_galeri']; ?>"><span>
											<?= $d['deskripsi_singkat'] ?></span>
										<h2><?= $d['judul_gambar'] ?></h2>
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<!-- akhir galeri -->



	<!-- Kontak kami -->
	<section class="ftco-section contact-section" id="kontak">
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
							<span><i class="fal fa-map-marker-alt"></i></span>
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
								<p>+62 823 4567 8967</p>
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
				delay: 4000,
				disableOnInteraction: true,
			},
		});
	</script>
</body>

</html>