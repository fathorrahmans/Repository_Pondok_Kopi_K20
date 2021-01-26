<?php
include "koneksi/koneksi.php";

$vkey = $_GET['vkey'];

// echo $vkey;
$sql = mysqli_query($con, "SELECT vkey from tb_pelanggan where vkey='$vkey'");

if (mysqli_fetch_assoc($sql)) {
    $update = mysqli_query($con, "UPDATE tb_pelanggan SET vkey='', verifikasi=1 WHERE vkey='$vkey'");
    echo "<script>alert('Akun anda telah aktif, silahkan login');location='login.php'</script>";
} else {
    die("Terjadi Kesalahan");
}
