<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dark Bootstrap Admin by Bootstrapious.com</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
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

</head>

<body>
  <div class="login-page">
    <div class="container d-flex align-items-center">
      <div class="form-holder has-shadow">
        <div class="row">
          <!-- Logo & Information Panel-->
          <div class="col-lg-6">
            <div class="info d-flex align-items-center">
              <div class="content">
                <div class="logo">
                  <h1>Pondok Kopi 57.58</h1>
                </div>
                <p>Selamat datang di web admin Pondok Kopi 57.58</p>
              </div>
            </div>
          </div>
          <!-- Form Panel    -->
          <div class="col-lg-6">
            <div class="form d-flex align-items-center">
              <div class="content">
                <form method="POST" action="" id="form1" name="form1" class="form-validate mb-4">
                  <div class="form-group">
                    <input id="xusername" type="text" name="xusername" required data-msg="Masukkan Username Anda" class="input-material">
                    <label for="login-username" class="label-material">User Name</label>
                  </div>
                  <div class="form-group">
                    <input id="xpassword" type="password" name="xpassword" required data-msg="Masukkan Password Anda" class="input-material">
                    <label for="login-password" class="label-material">Password</label>
                  </div>
                  <button type="submit" name="login" id="login" class="btn btn-primary" value="login">Login</button>
                </form>
                <?php
                if (@$_POST['login']) {
                  session_start();
                  require_once('../koneksi/koneksi.php');
                  $user = $_POST['xusername'];
                  $pass = $_POST['xpassword'];

                  $sql = mysqli_query($con, "select * from tb_petugas where username='$user'") or die("error");
                  $data = mysqli_fetch_array($sql);
                  if ($data['password'] == ($pass)) {
                    $_SESSION['id_petugas'] = $data['id_petugas'];
                    $_SESSION['password'] = $data['password']; //pwd
                    $_SESSION['namaptg'] = $data['nama_petugas'];
                    $_SESSION['level'] = $data['level'];

                    echo "<script>location='.'</script>";
                  } else {
                    echo "<script>alert('Username atau password salah!');location='login.php'</script>";
                  }
                }

                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="copyrights text-center">
      <p>Assalamualaikum <a href="" class="external">Wr Wb</a></p>
    </div>
  </div>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper.js/umd/popper.min.js"> </script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
  <script src="js/front.js"></script>
</body>

</html>