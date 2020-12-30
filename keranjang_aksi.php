<?php
session_start();
if (empty($_SESSION['id_pelanggan'])) {
    echo "<script>location='login.php'</script>";
} else {

    $p = $_GET['p'];

    if ($p == "tambah") {
        $id_variasi = $_GET['id'];
        if (isset($_SESSION['keranjang'][$id_variasi])) {
            $_SESSION['keranjang'][$id_variasi] += 1;
        } else {
            $_SESSION['keranjang'][$id_variasi] = 1;
        }
        echo "<script>location='keranjang.php'</script>";
    }

    if ($p == "kurangi") {
        $id_variasi = $_GET['id'];
        if (isset($_SESSION['keranjang'][$id_variasi])) {
            $_SESSION['keranjang'][$id_variasi] += -1;
        }
        echo "<script>location='keranjang.php'</script>";
    }

    if ($p == "hapus") {
        $id_variasi = $_GET['id'];
        unset($_SESSION["keranjang"][$id_variasi]);

        echo "<script>location='keranjang.php'</script>";
    }

    if ($p = "input") {
        $id_variasi = $_POST['id'];
        $jumlah = $_POST['jumlah'];
        if (isset($_SESSION['keranjang'][$id_variasi])) {
            $_SESSION['keranjang'][$id_variasi] = $jumlah;
        }
        echo "<script>location='keranjang.php'</script>";
    }
}
?>
<pre>
    <?php print_r($_SESSION['keranjang']); ?>
</pre>