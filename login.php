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
		.buttonl {
			background-color: transparent;
			padding: 0;
			border: 0;
			outline: 0;
			cursor: pointer;
		}

		input {
			background-color: transparent;
			padding: 0;
			border: 0;
			outline: 0;
		}

		input[type=submit] {
			cursor: pointer;
		}

		input::-moz-placeholder {
			font-size: 0.85rem;
			font-family: "Montserrat", sans-serif;
			font-weight: 300;
			letter-spacing: 0.1rem;
			color: #ccc;
		}

		input:-ms-input-placeholder {
			font-size: 0.85rem;
			font-family: "Montserrat", sans-serif;
			font-weight: 300;
			letter-spacing: 0.1rem;
			color: #ccc;
		}

		input::placeholder {
			font-size: 0.85rem;
			font-family: "Montserrat", sans-serif;
			font-weight: 300;
			letter-spacing: 0.1rem;
			color: rgba(0, 0, 0, 0.7);
		}

		/**
 * * Bounce to the left side
 * */
		@-webkit-keyframes bounceLeft {
			0% {
				transform: translate3d(100%, -50%, 0);
			}

			50% {
				transform: translate3d(-30px, -50%, 0);
			}

			100% {
				transform: translate3d(0, -50%, 0);
			}
		}

		@keyframes bounceLeft {
			0% {
				transform: translate3d(100%, -50%, 0);
			}

			50% {
				transform: translate3d(-30px, -50%, 0);
			}

			100% {
				transform: translate3d(0, -50%, 0);
			}
		}

		/**
 * * Bounce to the left side
 * */
		@-webkit-keyframes bounceRight {
			0% {
				transform: translate3d(0, -50%, 0);
			}

			50% {
				transform: translate3d(calc(100% + 30px), -50%, 0);
			}

			100% {
				transform: translate3d(100%, -50%, 0);
			}
		}

		@keyframes bounceRight {
			0% {
				transform: translate3d(0, -50%, 0);
			}

			50% {
				transform: translate3d(calc(100% + 30px), -50%, 0);
			}

			100% {
				transform: translate3d(100%, -50%, 0);
			}
		}

		/**
 * * Show Sign Up form
 * */
		@-webkit-keyframes showSignUp {
			100% {
				opacity: 1;
				visibility: visible;
				transform: translate3d(0, 0, 0);
			}
		}

		@keyframes showSignUp {
			100% {
				opacity: 1;
				visibility: visible;
				transform: translate3d(0, 0, 0);
			}
		}

		/**
 * * Page background
 * */
		.user {
			display: flex;
			justify-content: center;
			align-items: center;
			width: 100%;
			height: 100vh;
			background-size: cover;
		}

		.user_options-container {
			position: relative;
			width: 80%;
		}

		.user_options-text {
			display: flex;
			justify-content: space-between;
			width: 100%;
			background-color: #FFFFE5;
			border-radius: 3px;
		}

		/**
 * * Registered and Unregistered user box and text
 * */
		.user_options-registered,
		.user_options-unregistered {
			width: 50%;
			padding: 75px 45px;
			color: #000;
			font-weight: 300;
		}

		.user_registered-title,
		.user_unregistered-title {
			margin-bottom: 15px;
			font-size: 1.66rem;
			line-height: 1em;
		}

		.user_unregistered-text,
		.user_registered-text {
			font-size: 0.83rem;
			line-height: 1.4em;
		}

		.user_registered-login,
		.user_unregistered-signup {
			margin-top: 30px;
			border: 1px solid #000;
			padding: 10px 30px;
			color: #000;
			text-transform: uppercase;
			line-height: 1em;
			letter-spacing: 0.2rem;
			transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
		}

		.user_registered-login:hover,
		.user_unregistered-signup:hover {
			color: #fff;
			background-color: #000;
		}

		/**
 * * Login and signup forms
 * */
		.user_options-forms {
			position: absolute;
			top: 50%;
			left: 30px;
			width: calc(50% - 30px);
			min-height: 420px;
			background-color: #FFFFF8;
			border-radius: 3px;
			box-shadow: 2px 0 15px rgba(0, 0, 0, 0.25);
			overflow: hidden;
			transform: translate3d(100%, -50%, 0);
			transition: transform 0.4s ease-in-out;
		}

		.user_options-forms .user_forms-login {
			transition: opacity 0.4s ease-in-out, visibility 0.4s ease-in-out;
		}

		.user_options-forms .forms_title {
			margin-bottom: 45px;
			font-size: 1.5rem;
			font-weight: 500;
			line-height: 1em;
			text-transform: uppercase;
			color: red;
			letter-spacing: 0.1rem;
		}

		.user_options-forms .forms_field:not(:last-of-type) {
			margin-bottom: 20px;
		}

		.user_options-forms .forms_field-input {
			width: 100%;
			border-bottom: 1px solid #ccc;
			padding: 6px 20px 6px 6px;
			font-family: "Montserrat", sans-serif;
			font-size: 1rem;
			font-weight: 300;
			color: black;
			letter-spacing: 0.1rem;
			transition: border-color 0.2s ease-in-out;
		}

		.user_options-forms .forms_field-input:focus {
			border-color: gray;
		}

		.user_options-forms .forms_buttons {
			display: flex;
			justify-content: flex-end;
			align-items: center;
			margin-top: 35px;

		}

		.user_options-forms .forms_buttons-action {
			background-color: #e8716d;
			padding: 10px 35px;
			font-size: 1rem;
			font-family: "Montserrat", sans-serif;
			font-weight: 300;
			color: #fff;
			text-transform: uppercase;
			letter-spacing: 0.1rem;
			transition: background-color 0.2s ease-in-out;
			border: 0px;
		}

		.user_options-forms .forms_buttons-action:hover {
			background-color: #e14641;
		}

		.user_options-forms .user_forms-signup,
		.user_options-forms .user_forms-login {
			position: absolute;
			top: 20px;
			left: 40px;
			width: calc(100% - 80px);
			opacity: 0;
			visibility: hidden;
			transition: opacity 0.4s ease-in-out, visibility 0.4s ease-in-out, transform 0.5s ease-in-out;
		}

		.user_options-forms .user_forms-signup {
			transform: translate3d(120px, 0, 0);
		}

		.user_options-forms .user_forms-signup .forms_buttons {
			justify-content: flex-end;
		}

		.user_options-forms .user_forms-login {
			transform: translate3d(0, 0, 0);
			opacity: 1;
			visibility: visible;
		}

		/**
 * * Triggers
 * */
		.user_options-forms.bounceLeft {
			-webkit-animation: bounceLeft 1s forwards;
			animation: bounceLeft 1s forwards;
		}

		.user_options-forms.bounceLeft .user_forms-signup {
			-webkit-animation: showSignUp 1s forwards;
			animation: showSignUp 1s forwards;
		}

		.user_options-forms.bounceLeft .user_forms-login {
			opacity: 0;
			visibility: hidden;
			transform: translate3d(-120px, 0, 0);
		}

		.user_options-forms.bounceRight {
			-webkit-animation: bounceRight 1s forwards;
			animation: bounceRight 1s forwards;
		}

		/**
 * * Responsive 990px
 * */
		@media screen and (max-width: 990px) {
			.user_options-container {
				width: 100%;
			}

			.user_options-forms {
				min-height: 450px;
				min-width: 200px;
			}

			.user_options-forms .forms_buttons {
				flex-direction: column;
			}

			.user_options-forms .user_forms-login .forms_buttons-action {
				margin-top: 30px;
			}

			.user_options-forms .user_forms-signup,
			.user_options-forms .user_forms-login {
				top: 20px;
				width: 100%;
			}

			.user_options-registered,
			.user_options-unregistered {
				padding: 50px 45px;
			}
		}
	</style>

</head>

<body>

	<?php
	include "navbar.php";
	?>

	<section class="user">
		<div class="user_options-container">
			<div class="user_options-text">
				<div class="user_options-unregistered">
					<h2 class="user_unregistered-title">Belum punya akun?</h2>
					<p class="user_unregistered-text">Jika anda belum mempunyai akun, silahkan daftar terlebih dahulu.</p>
					<button class="buttonl user_unregistered-signup" id="signup-button">Daftar</button>
				</div>

				<div class="user_options-registered">
					<h2 class="user_registered-title">Sudah punya akun?</h2>
					<p class="user_registered-text">Silahkan login dengan usename dan password yang benar!</p>
					<button class="buttonl user_registered-login" id="login-button">Login</button>
				</div>
			</div>

			<div class="user_options-forms" id="user_options-forms">
				<div class="user_forms-login">
					<h2 class="forms_title">Login</h2>
					<form class="forms_form" action="" method="POST">
						<fieldset class="forms_fieldset">
							<div class="forms_field">
								<input type="text" name="xuser" placeholder="Username" class="forms_field-input" required autofocus />
							</div>
							<div class="forms_field">
								<input type="password" name="xpass" placeholder="Password" class="forms_field-input" required />
							</div>
						</fieldset>
						<div class="forms_buttons">
							<button type="submit" name="login" class="forms_buttons-action">Log In</button>
						</div>
					</form>
					<?php
					if (isset($_POST['login'])) {
						$u = $_POST['xuser'];
						$p = $_POST['xpass'];

						$sql = mysqli_query($con, "select * from tb_pelanggan where username='$u'") or die("error");
						//cek username
						if (mysqli_num_rows($sql) == 1) {
							//cek password
							$r2 = mysqli_fetch_assoc($sql);
							if (password_verify($p, $r2['password'])) {
								$_SESSION["id_pelanggan"] = $r2['id_pelanggan']; //$user;
								echo "<script>location='.'</script>";
								exit;
							} else {
								echo "<script>alert('Password yang dimasukkan salah!');location='login.php'</script>";
							}
						} else {
							echo "<script>alert('Username yang dimasukkan salah!');location='login.php'</script>";
						}
					}
					?>
				</div>
				<div class="user_forms-signup">
					<h2 class="forms_title">Daftar Akun</h2>
					<form class="forms_form" action="" method="POST">
						<fieldset class="forms_fieldset">
							<div class="forms_field">
								<input type="text" name="xnama" placeholder="Nama Lengkap" class="forms_field-input" required />
							</div>
							<div class="forms_field">
								<input type="text" name="xusername" placeholder="Username" class="forms_field-input" required />
							</div>
							<div class="forms_field">
								<input type="password" name="xpassword" placeholder="Password" class="forms_field-input" required />
							</div>
							<div class="forms_field">
								<input type="password" name="xpassword2" placeholder="Tulis Ulang Password" class="forms_field-input" required />
							</div>
						</fieldset>
						<div class="forms_buttons">
							<button type="submit" name="daftar" class="forms_buttons-action">Daftar</button>
						</div>
					</form>
					<?php
					function registrasi($data)
					{
						global $con;

						$nama = $data['xnama'];
						$username = strtolower(stripcslashes($data['xusername']));
						$password = mysqli_real_escape_string($con, $data['xpassword']);
						$password2 = mysqli_real_escape_string($con, $data['xpassword2']);

						//cek username ada apa tidak
						$duser = mysqli_query($con, "SELECT username FROM tb_pelanggan WHERE username='$username'");
						if (mysqli_fetch_assoc($duser)) {
							echo "<script>alert('Username sudah terdaftar!')</script>";
							return false;
						}

						//cek konfirmasi password
						if ($password != $password2) {
							echo "<script>alert('Password anda tidak sama!')</script>";
							return false;
						}

						//enkripsi password
						$password = password_hash($password, PASSWORD_DEFAULT);

						//input user ke database
						mysqli_query($con, "INSERT INTO tb_pelanggan(nama,username,password) values ('$nama','$username','$password')");
						return  mysqli_affected_rows($con);
					}
					if (isset($_POST['daftar'])) {

						if (registrasi($_POST) > 0) {
							echo "<script>alert('Akun anda telah ditambahkan!')</script>";
						} else {
							mysqli_errno($con);
						}
					}
					?>
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
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>
	<script>
		/**
		 * Variables
		 */
		const signupButton = document.getElementById('signup-button'),
			loginButton = document.getElementById('login-button'),
			userForms = document.getElementById('user_options-forms')

		/**
		 * Add event listener to the "Sign Up" button
		 */
		signupButton.addEventListener('click', () => {
			userForms.classList.remove('bounceRight')
			userForms.classList.add('bounceLeft')
		}, false)

		/**
		 * Add event listener to the "Login" button
		 */
		loginButton.addEventListener('click', () => {
			userForms.classList.remove('bounceLeft')
			userForms.classList.add('bounceRight')
		}, false)
	</script>
</body>

</html>