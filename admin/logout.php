<?php
session_start();
unset($_SESSION['id_petugas']);
unset($_SESSION['password']);
unset($_SESSION['nama']);
unset($_SESSION['level']);

echo "<script>location='login.php'</script>";
