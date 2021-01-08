<?php
$p = $_GET['p'];

if ($p == "petugas") {
    $id = $_GET['id'];
    mysqli_query($con, "delete from tb_petugas where id_petugas='$id'");
    echo "<script>location='.?page=petugas'</script>";
}

if ($p == "produk") {
    $id = $_GET['id'];
    mysqli_query($con, "delete from tb_produk where id_produk='$id'");
    echo "<script>location='.?page=produk'</script>";
}

if ($p == "kota") {
    $id = $_GET['id'];
    mysqli_query($con, "delete from tb_ongkir where id_ongkir='$id'");
    echo "<script>location='.?page=kota'</script>";
}

if ($p == "galeri") {
    $id = $_GET['id'];
    mysqli_query($con, "delete from tb_galeri where id_galeri='$id'");
    echo "<script>location='.?page=galeri'</script>";
}
if ($p == "berita") {
    $id = $_GET['id'];
    mysqli_query($con, "delete from tb_berita where id_berita='$id'");
    echo "<script>location='.?page=berita'</script>";
}

if ($p == "variasi") {
    $id = $_GET['id'];
    $idv = $_GET['idv'];
    mysqli_query($con, "delete from tb_produk_variasi where id_variasi='$idv'");
    echo "<script>location='.?page=produk_variasi&id=$id'</script>";
}
