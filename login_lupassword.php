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
                    <h2 class="user_unregistered-title">Lupa Password anda?</h2>
                    <p class="user_unregistered-text">Silahkan masukkan email anda untuk verifikasi data diri anda.</p>
                </div>

            </div>

            <div class="user_options-forms" id="user_options-forms">
                <div class="user_forms-login">
                    <h2 class="forms_title">E-Mail</h2>
                    <form class="forms_form" action="" method="POST">
                        <fieldset class="forms_fieldset">
                            <div class="forms_field">
                                <input type="text" name="xemail" placeholder="Masukkan E-mail anda" class="forms_field-input" required autofocus />
                            </div>
                        </fieldset>
                        <div class="forms_buttons">
                            <button type="submit" name="lupa" class="forms_buttons-action">Kirim Verifikasi</button>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['lupa'])) {
                        $email = $_POST['xemail'];

                        $sql = mysqli_query($con, "SELECT * FROM tb_pelanggan WHERE email='$email'") or die("error");
                        //cek email
                        if (mysqli_num_rows($sql) == 1) {

                            $d = mysqli_fetch_assoc($sql);

                            if ($d['verifikasi'] == 2) {
                                echo '<div class="alert alert-danger"><b>Akun</b> anda terblokir!</div>';
                                return false;
                            }

                            $vkey = md5(time() . $d['nama']);

                            //update vkey user
                            mysqli_query($con, "UPDATE tb_pelanggan SET vkey='$vkey' WHERE email='$email'");

                            $email_pengirim = 'ftrrahman173@gmail.com'; // Isikan dengan email pengirim
                            $nama_pengirim = 'Admin Pondok Kopi'; // Isikan dengan nama pengirim
                            $email_penerima = $email; // Ambil email penerima dari inputan form
                            $subjek = 'Verifikasi Update Password'; // Ambil subjek dari inputan form
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
                            $mail->Body = "Perbarui password anda, silahkan klik link berikut ini.
						<a href='http://localhost/kopi-v3/login_ubahpassword.php?vkey=$vkey'>Verifikasi Ubah Password</a>  ";
                            $mail->send();
                            echo "<script>alert('Verifikasi pada E-mail anda.');location='login.php'</script>";
                        } else {
                            echo "<script>alert('E-mail yang dimasukkan tidak terdaftar!');location='login.php'</script>";
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