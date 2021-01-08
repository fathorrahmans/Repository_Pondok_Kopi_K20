<?php
session_start();
include "koneksi/koneksi.php";
if (empty($_SESSION['id_pelanggan'])) {
    echo "<script>alert('Silahkan login!');location='.' </script>";
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
    <link rel="stylesheet" href="css/croppie.css">
    <style>
        .btn-ubah {
            background: transparent;
            color: #4e1c1b;
            border: transparent;
            transition: 0.3s;
        }

        .btn-ubah:hover {
            color: red;
        }
    </style>

</head>

<body>

    <?php
    include "navbar.php";
    ?>



    <section class="ftco1" style="background: white; color: black;">
        <div class="container ">
            <div class="row ">
                <div class="col-md-2"></div>
                <div class="col-md-3" style="background: #FFFFF5; padding: 20px;">
                    <div style=" padding: 20px; height: 400px; background: #FFFFE5; margin-bottom: 10px;">
                        <?php
                        $sql = mysqli_query($con, "select * from tb_pelanggan where id_pelanggan='$_SESSION[id_pelanggan]'");
                        $d = mysqli_fetch_assoc($sql);
                        ?>
                        <div id="uploaded_image" style="width: 100%; display: flex; justify-content: center;">
                            <img src="<?= $d['gambar_profil']; ?>" width="220px" height="220px">
                        </div>
                        <label for=" upload_image" class="mt-2 mb-0"><b>Pilih Foto</b></label>
                        <input type="file" name="upload_image" id="upload_image" accept="image/*"><br>
                    </div>
                    <div id="uploadimageModal" class="modal" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Crop &amp; Upload Gambar</h4>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span aria-hidden="true">&times;</span>
                                        <span class="sr-only">Close</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <div id="image_demo"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success crop_image">Crop &amp; Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button data-toggle="modal" data-target="#myPassword<?php echo $_SESSION['id_pelanggan'] ?>" class="btn btn-outline-dark btn-sm" style="width: 100%;">Ubah Password</button>
                    <!-- modal untuk Update Password -->
                    <div class="modal fade" id="myPassword<?php echo $_SESSION['id_pelanggan'] ?>">
                        <!-- Modal content -->
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>Ubah Password</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <form action="" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Password Sekarang</label>
                                            <input type="password" name="xpasswordl" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password Baru</label>
                                            <input type="password" name="xpassword" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tulis Ulang Password Baru</label>
                                            <input type="password" name="xpassword2" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="update_password" class="btn btn-success btn-lg">Update</button>
                                    </div>
                                </form>
                                <?php
                                function password($data)
                                {
                                    global $con;

                                    $id = $_SESSION['id_pelanggan'];
                                    $passwordl = $data['xpasswordl'];
                                    $password = mysqli_real_escape_string($con, $data['xpassword']);
                                    $password2 = mysqli_real_escape_string($con, $data['xpassword2']);

                                    //cek password sama apa tidak
                                    $dpass = mysqli_query($con, "SELECT * FROM tb_pelanggan WHERE id_pelanggan='$id'");
                                    $dp = mysqli_fetch_assoc($dpass);

                                    if (password_verify($passwordl, $dp['password'])) {
                                        //cek konfirmasi password
                                        if ($password != $password2) {
                                            echo "<script>alert('Password baru anda tidak sama!')</script>";
                                            return false;
                                        }
                                        //enkripsi password
                                        $password = password_hash($password, PASSWORD_DEFAULT);

                                        //update user ke database
                                        mysqli_query($con, "update tb_pelanggan set password='$password' where id_pelanggan='$id'");
                                        return  mysqli_affected_rows($con);
                                    } else {
                                        echo "<script>alert('Password lama anda salah!')</script>";
                                        return false;
                                    }
                                }
                                if (isset($_POST['update_password'])) {
                                    if (password($_POST) > 0) {
                                        echo "<script>alert('Password telah di perbarui!')</script>";
                                    } else {
                                        mysqli_errno($con);
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- akhir modal untuk Edit -->
                </div>
                <div class="col-md-5 " style="background: #FFFFF5;">

                    <div class="text pl-md-5 py-3">

                        <br>
                        <?php
                        $sql = mysqli_query($con, "select * from tb_pelanggan where id_pelanggan='$_SESSION[id_pelanggan]'");
                        $dt = mysqli_fetch_assoc($sql);
                        ?>
                        <b style="text-transform: uppercase; margin-right: 10px;">Biodata Diri</b><a href="#" data-toggle="modal" data-target="#myEditData<?php echo $_SESSION['id_pelanggan'] ?>" class="btn-ubah">Ubah Data</a>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style="width: 35%;">Nama</td>
                                    <td><?= $dt['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><?= $dt['username']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir</td>
                                    <td><?= $dt['tgl_lahir']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td><?= $dt['jenis_kelamin']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat Rumah</td>
                                    <td><?= $dt['alamat']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- modal untuk Edit Biodata -->
                        <div class="modal fade" id="myEditData<?php echo $_SESSION['id_pelanggan'] ?>">
                            <!-- Modal content -->
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>Ubah Biodata</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <form action="" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" name="xnama" value="<?= $dt['nama']; ?>" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="xusername" value="<?= $dt['username']; ?>" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal lahir (Tahun-bulan-tanggal) </label>
                                                <input type="text" name="xtanggal" value="<?= $dt['tgl_lahir']; ?>" class="form-control" placeholder="contoh: 1992-12-31" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select class="form-control" name="xjenisk" id="xjenisk" required>
                                                    <option value="<?php echo $dt['jenis_kelamin'] ?>"><?php echo $dt['jenis_kelamin'] ?></option>
                                                    <option value="Pria">Pria</option>
                                                    <option value="Wanita">Wanita</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat Rumah</label>
                                                <textarea type="text" name="xalamat" class="form-control" cols="30" rows="3" required><?= $dt['alamat']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="update_biodata" class="btn btn-success btn-lg">Update</button>
                                        </div>
                                    </form>
                                    <?php
                                    function biodata($data)
                                    {
                                        global $con;

                                        $id = $_SESSION['id_pelanggan'];
                                        $nama = $data['xnama'];
                                        $user = $data['xusername'];
                                        $tgl = $data['xtanggal'];
                                        $jk = $data['xjenisk'];
                                        $alamat = $data['xalamat'];

                                        mysqli_query($con, "update tb_pelanggan set nama='$nama', username='$user', tgl_lahir='$tgl', jenis_kelamin='$jk', alamat='$alamat' where id_pelanggan='$id'");
                                        return  mysqli_affected_rows($con);
                                    }
                                    if (isset($_POST['update_biodata'])) {
                                        if (biodata($_POST) > 0) {
                                            echo "<script>alert('Biodata berhasil di perbarui!');location='akun_saya.php'</script>";
                                        } else {
                                            mysqli_errno($con);
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- akhir modal untuk Edit -->

                        <table class="table table-borderless">
                            <b style="text-transform: uppercase; margin-right: 15px;">Info Kontak</b><a href="#" data-toggle="modal" data-target="#myEditKontak<?php echo $_SESSION['id_pelanggan'] ?>" class="btn-ubah">Edit Kontak</a>
                            <tbody>
                                <tr>
                                    <td style="width: 35%;">E-mail</td>
                                    <td><?= $dt['email']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Hp</td>
                                    <td><?= $dt['no_telp']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- modal untuk Edit Info Kontak -->
                        <div class="modal fade" id="myEditKontak<?php echo $_SESSION['id_pelanggan'] ?>">
                            <!-- Modal content -->
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>Ubah Info Kontak</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <form action="" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>E-mail</label>
                                                <input type="email" name="xemail" value="<?= $dt['email']; ?>" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Nomor Hp</label>
                                                <input type="text" name="xno" value="<?= $dt['no_telp']; ?>" class="form-control" required>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="update_kontak" class="btn btn-success btn-lg">Update</button>
                                        </div>
                                    </form>
                                    <?php
                                    function kontak($data)
                                    {
                                        global $con;

                                        $id = $_SESSION['id_pelanggan'];
                                        $email = $data['xemail'];
                                        $no = $data['xno'];

                                        mysqli_query($con, "update tb_pelanggan set email='$email', no_telp='$no' where id_pelanggan='$id'");
                                        return  mysqli_affected_rows($con);
                                    }
                                    if (isset($_POST['update_kontak'])) {
                                        if (kontak($_POST) > 0) {
                                            echo "<script>alert('Info Kontak berhasil di perbarui!');location='akun_saya.php'</script>";
                                        } else {
                                            mysqli_errno($con);
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- akhir modal untuk Edit -->
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>




    <!-- Start Footer Section -->
    <footer class="ftco-footer py-5 mt-5">
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
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/croppie.min.js"></script>

    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>

    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(document).ready(function() {
            $image_crop = $('#image_demo').croppie({
                enableExif: true,
                viewport: {
                    width: 300,
                    height: 300,
                    type: 'square' //circle
                },
                boundary: {
                    width: 300,
                    height: 300
                }
            });

            $('#upload_image').on('change', function() {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function() {
                        console.log('jQuery bind complete');
                    });
                }
                reader.readAsDataURL(this.files[0]);
                $('#uploadimageModal').modal('show');
            });

            $('.crop_image').click(function(event) {
                $image_crop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(response) {
                    $.ajax({
                        url: "akun_gambar_aksi.php",
                        type: "POST",
                        data: {
                            "image": response
                        },
                        success: function(data) {
                            $('#uploadimageModal').modal('hide');
                            $('#uploaded_image').html(data);
                        }
                    });
                })
            });
        });
    </script>
</body>

</html>