<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "kopi";
$con = mysqli_connect($host, $user, $password, $database);

if (!$con) {
    echo "gagal konek" . mysqli_connect_error();
}
error_reporting(0);
