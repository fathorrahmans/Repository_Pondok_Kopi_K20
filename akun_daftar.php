<?php
session_start();
include "koneksi/koneksi.php";
if (!empty($_SESSION['id_pelanggan'])) {
	echo "<script>alert('Anda sudah login!');location='.' </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Pondok Kopi 57.58</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400i,700,700i&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.css">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/aos.css">

	<link rel="stylesheet" href="css/ionicons.min.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">
	<link rel="stylesheet" href="css/fontawesome-pro-5.14.0-web/css/all.min.css">

	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/icomoon.css">
	<link rel="stylesheet" href="css/style.css">

	<style>
		.main-content {
			width: 35%;
			border-radius: 20px;
			box-shadow: 0 5px 5px rgba(0, 0, 0, .4);
			margin: 0px auto;
			display: flex;
			color: whitesmoke;
		}

		.fa-android {
			font-size: 3em;
		}

		@media screen and (max-width: 640px) {
			.main-content {
				width: 90%;
			}

			.login_form {
				border-top-left-radius: 20px;
				border-bottom-left-radius: 20px;
			}
		}

		@media screen and (min-width: 642px) and (max-width:800px) {
			.main-content {
				width: 70%;
			}
		}

		.row .col>h4 {
			text-transform: uppercase;
			font-weight: 700;
			color: #eb716f;
			text-decoration: none;
		}

		.login_form {

			background-color: #353232;
			border-radius: 0px;
			border-top: 2px solid #a54947;
			border-right: 2px solid #c05d5b;
		}

		form {
			padding: 0 2em;


		}

		.form__input {
			width: 100%;
			background: transparent;
			color: whitesmoke;
			border: 0px solid transparent;
			border-radius: 0;
			border-bottom: 1px solid #aaa;
			padding: 1em .5em .5em;
			padding-left: 2em;
			outline: none;
			margin: 1.5em auto;
			transition: all .5s ease;
		}

		form input::placeholder {
			color: whitesmoke
		}

		form textarea::placeholder {
			color: whitesmoke
		}

		.form__input:focus {

			border-bottom-color: #eb716f;
			box-shadow: 0 0 5px #eb716f77;
			border-radius: 4px;
		}

		.btn {
			transition: all .5s ease;
			width: 100%;
			border-radius: 30px;
			color: #eb716f;
			font-weight: 600;
			background-color: #474343;
			border: 1px solid #df5654;
			margin-top: 1.5em;
			margin-bottom: 1em;
		}

		.btn:hover,
		.btn:focus {
			background-color: #df5654;
			color: #fff;
		}

		.imgLogo {
			display: block;
			padding: 0px;
			margin: 5px auto;
			height: 130px;
			width: 130px;
		}
	</style>

</head>

<body>

	<?php
	include "navbar.php";
	include "navbar_2.php";
	?>

	<section>
		<div class="container ">
			<div class="row">
				<div class="col-md-12 col-xs-12 col-sm-12 ">
					<img src="images/logo_pkopi_ori.png" class="imgLogo" alt="">
				</div>
			</div>
		</div>
	</section>

	<!-- Start Home Section -->
	<section id="login" class="">
		<div class="container-fluid">
			<div class="row  main-content ">
				<div class="col-md-12 col-xs-12 col-sm-12 login_form ">
					<div class="container-fluid">
						<div class="row text-center">
							<div class="col mt-3">
								<h4>Daftar akun</h4>
							</div>
						</div>
						<div class="container ">
							<form class="form-group" id="form" method="post" action="">
								<div class="row">
									<input type="text" name="xnama" id="xnama" class="form__input" placeholder="Nama Anda">
								</div>
								<div class="row">
									<input type="text" name="xusername" id="xusername" class="form__input" placeholder="Username Anda">
								</div>
								<div class="row">
									<input type="password" name="xpassword" id="xpassword" class="form__input" placeholder="Password Anda">
								</div>
								<div class="row">
									<input type="text" name="xnotelpon" id="xnotelpon" class="form__input" placeholder="No Telpon">
								</div>
								<div class="row">
									<textarea id="xalamat" name="xalamat" class="form__input" placeholder="Alamat Anda"></textarea>
								</div>

								<div class="row heading-section">
									<button type="submit" name="daftar" class="btn">Daftar</button>
								</div>
							</form>
							<?php
							if (isset($_POST['daftar'])) {
								$p = $_POST['xpassword'];
								$password = ($p);

								$nama = $_POST['xnama'];
								$username = $_POST['xusername'];
								$notelpon = $_POST['xnotelpon'];
								$alamat = $_POST['xalamat'];

								mysqli_query($con, "insert into tb_pelanggan(nama,username,password,no_telp,alamat)values('$nama','$username','$password','$notelpon','$alamat')");
								$id = mysqli_insert_id($con);
								echo "<script>alert('Pendaftaran berhasil');location='login.php?p=$id'</script>";
							}
							?>
						</div>
						<div class="row">
							<p>Sudah punya akun? <a href="login.php">Login disini.</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Home Section -->



	<!-- Start Contact Section -->
	<section class="ftco-section contact-section" id="kontak">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-3">
				<div class="col-md-4 heading-section text-center ftco-animate">
					<h2 class="mb-4">Kontak Kami</h2>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae eveniet itaque quisquam, minima, officiis</p>
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
							<p>Desa Kemiri - Panti, Kab. Jember <br>Jawa timur</p>
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
							<p><a href="mailto:info@yoursite.com">emailsaya123@gmail.com</a></p>
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
	<!-- End Contact Section -->


	<!-- Start Footer Section -->
	<footer class="ftco-footer py-5">
		<div class="container text-center">
			<div class="row">
				<div class="col-md-12 text-center">

					<p>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> Selamat menikmati produk kopi kami | by <a href="index.php" target="_blank"> Pondok Kopi 57.58</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
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
	<!-- End Footer Section -->


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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>
</body>

</html>