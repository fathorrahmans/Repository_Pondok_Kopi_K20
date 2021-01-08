<?php
session_start();
unset($_SESSION['id_pelanggan']);
unset($_SESSION['pass']);
unset($_SESSION['namaplg']);
unset($_SESSION['alamat']);
unset($_SESSION['no_telp']);
unset($_SESSION['keranjang']);

echo "<script>location='.'</script>";
