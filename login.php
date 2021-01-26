<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include('phpmailer/src/Exception.php');
include('phpmailer/src/PHPMailer.php');
include('phpmailer/src/SMTP.php');
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
								<input type="text" name="xuser" placeholder="E-mail/Username" class="forms_field-input" required autofocus />
							</div>
							<div class="forms_field">
								<input type="password" name="xpass" placeholder="Password" class="forms_field-input" required />
							</div>
						</fieldset>
						<div class="forms_buttons">
							<a href="login_lupassword.php">Lupa password?</a> &nbsp; &nbsp;
							<button type="submit" name="login" class="forms_buttons-action">Log In</button>
						</div>
					</form>
					<?php
					if (isset($_POST['login'])) {
						$u = $_POST['xuser'];
						$p = $_POST['xpass'];

						$sql = mysqli_query($con, "SELECT * FROM tb_pelanggan WHERE username='$u' OR email='$u'") or die("error");
						//cek username dan email
						if (mysqli_num_rows($sql) == 1) {
							$r2 = mysqli_fetch_assoc($sql);
							if ($r2['verifikasi'] == 2) {
								echo '<div class="alert alert-danger mt-2"><b>Akun</b> anda terblokir!</div>';
								return false;
							}
							if ($r2['verifikasi'] == 1) {
								//cek password
								if (password_verify($p, $r2['password'])) {
									$_SESSION["id_pelanggan"] = $r2['id_pelanggan']; //$user;
									echo "<script>location='.'</script>";
									exit;
								} else {
									echo "<script>alert('Password yang dimasukkan salah!');location='login.php'</script>";
								}
							} else {
								echo "<script>alert('Silahkan verifikasi email anda! Cek di kotak masuk atau spam');location='login.php'</script>";
							}
						} else {
							echo "<script>alert('E-mail/Username yang dimasukkan salah!');location='login.php'</script>";
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
								<input type="email" name="xemail" placeholder="E-mail" class="forms_field-input" required />
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
						include "koneksi/koneksi.php";

						global $con;

						$nama = $data['xnama']; //nama penerima
						$email = $data['xemail']; //email penerima
						$password = mysqli_real_escape_string($con, $data['xpassword']);
						$password2 = mysqli_real_escape_string($con, $data['xpassword2']);


						//cek username dan email ada apa tidak
						$dusr = mysqli_query($con, "SELECT * FROM tb_pelanggan WHERE email='$email'");
						if (mysqli_fetch_assoc($dusr)) {
							echo "<script>alert('Email sudah terdaftar!')</script>";
							return false;
						}

						//cek konfirmasi password
						if ($password != $password2) {
							echo "<script>alert('Password anda tidak sama!')</script>";
							return false;
						}

						//enkripsi password
						$password = password_hash($password, PASSWORD_DEFAULT);

						//enkripsi verifikasi key
						$vkey = md5(time() . $nama);

						//input user ke database
						mysqli_query($con, "INSERT INTO tb_pelanggan(nama,email,vkey,password) values ('$nama','$email','$vkey','$password')");

						$email_pengirim = 'ftrrahman173@gmail.com'; // Isikan dengan email pengirim
						$nama_pengirim = 'Admin Pondok Kopi'; // Isikan dengan nama pengirim
						$email_penerima = $email; // Ambil email penerima dari inputan form
						$subjek = 'Verifikasi akun pendaftar'; // Ambil subjek dari inputan form
						$mail = new PHPMailer;
						$mail->isSMTP();
						$mail->Host = 'smtp.gmail.com';
						$mail->Username = $email_pengirim; // Email Pengirim
						$mail->Password = 'rmn122334'; // Isikan dengan Password email pengirim
						$mail->Port = 465;
						$mail->SMTPAuth = true;
						$mail->SMTPSecure = 'ssl';
						// $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging
						$mail->setFrom($email_pengirim, $nama_pengirim);
						$mail->addAddress($email_penerima, '');
						$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html
						// Load file content.php
						$mail->Subject = $subjek;
						$mail->Body = "Selemat, anda berhasil membuat akun. Untuk mengaktifkan akun anda silahkan klik link berikut ini.
						<a href='http://localhost/kopi-v3/login_verifikasi.php?s=input&vkey=$vkey'>Verifikasi Akun saya</a>  ";
						$mail->send();
						return  mysqli_affected_rows($con);
					}
					if (isset($_POST['daftar'])) {
						if (registrasi($_POST) > 0) {

							echo "<script>alert('Akun anda terdaftar, silahkan konfirmasi di email')</script>";
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