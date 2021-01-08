<?php
session_start();
include "koneksi/koneksi.php";
$p = $_GET['p'];

if ($p == "diterima") {
    $id = $_GET['id'];
    date_default_timezone_set('Asia/Jakarta');
    $tanggal_terima = date("Y-m-d H:i:s");
    mysqli_query($con, "update tb_pesan set tanggal_terima='$tanggal_terima', status='selesai' where id_pesan='$id'");
    echo "<script>alert('Terimakasih membeli produk kami.');location='pesanan.php'</script>";
}

if ($p == "cekbayar") {
    $id = $_GET['id'];
    $sql = mysqli_query($con, "select * from tb_pesan where id_pesan='$id'");
    $d = mysqli_fetch_assoc($sql);

    $gambar = $_FILES['xgambar']['name'];
    $tmp_gambar = $_FILES['xgambar']['tmp_name'];
    $namagambar = str_replace(" ", "", $d['id_pesan'] . date("YmdHis") . $gambar);

    mysqli_query($con, "update tb_pesan set bukti_bayar='$namagambar',status='sudah bayar' where id_pesan = '$id'");
    copy($tmp_gambar, "admin/images/bukti/$namagambar");
    echo "<script>alert('Terimakasih telah melakukan pembayaran');location='pesanan.php'</script>";
}

if ($p == "batal") {
    $id = $_GET['id'];
    mysqli_query($con, "update tb_pesan set status='dibatalkan' where id_pesan='$id'");
    $sql = mysqli_query($con, "select * from tb_pesan_detail where id_pesan='$id'");
    while ($data = mysqli_fetch_assoc($sql)) {
        mysqli_query($con, "UPDATE tb_produk_variasi SET stok=stok+$data[jumlah] WHERE id_variasi='$data[id_variasi]' ");
    }
    echo "<script>alert('Pesanan Dibatalkan!');location='pesanan_detail.php?id=$id'</script>";
}
