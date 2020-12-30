<?php

if (isset($_POST['tambah_produk'])) {
    $depan = $_POST['ydepan'];
    $belak = $_POST['ybelakang'];
    $singkat = $_POST['ysingkat'];
    $deskripsi = $_POST['ydeskripsi'];
    $gambar = $_FILES['ygambar']['name'];
    $tmp_gambar = $_FILES['ygambar']['tmp_name'];
    $namagambar = str_replace(" ", "", date("YmdHis") . $gambar);

    mysqli_query($con, "insert into tb_produk(nama_depan,nama_belakang,gambar_produk,deskripsi_singkat,deskripsi) values ('$depan','$belak','$namagambar','$singkat','$deskripsi')");
    copy($tmp_gambar, "images/produk/$namagambar");
    echo "<script>location='.?page=produk'</script>";
}

if (isset($_POST['update_produk'])) {
    $id = $_GET['id'];
    $depan = $_POST['ydepan'];
    $belak = $_POST['ybelakang'];
    $singkat = $_POST['ysingkat'];
    $deskripsi = $_POST['ydeskripsi'];
    $gambar = $_FILES['ygambar']['name'];
    $tmp_gambar = $_FILES['ygambar']['tmp_name'];
    $namagambar = str_replace(" ", "", date("YmdHis") . $gambar);

    if (empty($gambar)) {
        mysqli_query($con, "update tb_produk set nama_depan='$depan',nama_belakang='$belak',deskripsi_singkat='$singkat',deskripsi='$deskripsi' where id_produk='$id'");
    } else {
        mysqli_query($con, "update tb_produk set nama_depan='$depan',nama_belakang='$belak',gambar='$namagambar',deskripsi_singkat='$singkat',deskripsi='$deskripsi' where id_produk='$id'");
        copy($tmp_gambar, "images/produk/$namagambar");
    }
    echo "<script>location='.?page=produk'</script>";
}

if (isset($_POST['tambah_petugas'])) {
    $nama = $_POST['xnama'];
    $user = $_POST['xusername'];
    $pass = $_POST['xpassword'];
    $telp = $_POST['xtelp'];
    $leve = $_POST['xlevel'];
    $alam = $_POST['xalamat'];

    mysqli_query($con, "insert into tb_petugas(nama,username,password,no_telp,alamat,level) values ('$nama','$user','$pass','$telp','$alam','$leve')");
    echo "<script>location='.?page=petugas'</script>";
}

if (isset($_POST['update_petugas'])) {
    $id = $_GET['id'];
    $nama = $_POST['xnama'];
    $user = $_POST['xusername'];
    $telp = $_POST['xtelp'];
    $pass = $_POST['xpassword'];
    $level = $_POST['xlevel'];
    $alam = $_POST['xalamat'];

    mysqli_query($con, "update tb_petugas set nama='$nama', username='$user', no_telp='$telp',password='$pass',level='$level',alamat='$alam' where id_petugas='$id'");
    echo "<script>location='.?page=petugas'</script>";
}

if (isset($_POST['update_pelanggan'])) {
    $id = $_GET['id'];
    $user = $_POST['xuser'];
    $pass = $_POST['xpass'];

    mysqli_query($con, "update tb_pelanggan set username='$user', password='$pass' where id_pelanggan='$id'");
    echo "<script>location='.?page=pelanggan'</script>";
}

if (isset($_POST['tambah_kota'])) {
    $nama = $_POST['xkota'];
    $harga = $_POST['xharga'];
    mysqli_query($con, "insert into tb_ongkir(nama_kota,harga_ongkir)values('$nama','$harga')");
    echo "<script>location='.?page=kota'</script>";
}

if (isset($_POST['update_kota'])) {
    $id = $_GET['id'];
    $nama = $_POST['xkota'];
    $harga = $_POST['xongkir'];
    mysqli_query($con, "update tb_ongkir set nama_kota='$nama', harga_ongkir='$harga' where id_ongkir='$id'");
    echo "<script>location='.?page=kota'</script>";
}

if (isset($_POST['tambah_galeri'])) {
    $judul = $_POST['zjudul'];
    $tanggal = $_POST['date-input'];
    $info = $_POST['zsingkat'];
    $desk = $_POST['zdesk'];
    $gambar = $_FILES['zgambar']['name'];
    $tmp_gambar = $_FILES['zgambar']['tmp_name'];
    $namagambar = str_replace(" ", "", date("YmdHis") . $gambar);
    mysqli_query($con, "insert into tb_galeri(judul_gambar,tanggal,gambar,deskripsi_singkat,deskripsi)values('$judul','$tanggal','$namagambar','$info','$desk')");
    copy($tmp_gambar, "images/galeri/$namagambar");
    echo "<script>location='.?page=galeri'</script>";
}

if (isset($_POST['update_galeri'])) {
    $id = $_GET['id'];
    $judul = $_POST['zjudul'];
    $tanggal = $_POST['date-input2'];
    $info = $_POST['zsingkat'];
    $desk = $_POST['zdesk'];
    $gambar = $_FILES['zgambar']['name']; //id_galeri
    $tmp_gambar = $_FILES['zgambar']['tmp_name'];
    $namagambar = str_replace(" ", "", date("YmdHis") . $gambar);

    if (empty($gambar)) {
        mysqli_query($con, "update tb_galeri set judul_gambar='$judul',tanggal='$tanggal',deskripsi_singkat='$info',deskripsi='$desk' where id_galeri='$id'");
        echo "<script>location='.?page=galeri'</script>";
    } else {
        mysqli_query($con, "update tb_galeri set judul_gambar='$judul',tanggal='$tanggal',gambar='$namagambar',deskripsi_singkat='$info',deskripsi='$desk' where id_galeri='$id'");
        copy($tmp_gambar, "images/galeri/$namagambar");
        echo "<script>location='.?page=galeri'</script>";
    }

    echo "<script>location='.?page=galeri'</script>";
}

if (isset($_POST['tambah_variasi'])) {
    $id = $_GET['id'];
    $id_produk = $_POST['vid'];
    $nama = $_POST['vnama'];
    $harga = $_POST['vharga'];
    $stok = $_POST['vstok'];
    $berat = $_POST['vberat'];
    // $gambar = $_FILES['vgambar']['name'];
    // $tmp_gambar = $_FILES['vgambar']['tmp_name'];
    // $namagambar = str_replace(" ", "", date("YmdHis") . $gambar);

    $query = "INSERT INTO tb_produk_variasi VALUES";
    $index = 0;
    foreach ($nama as $datanama) {
        $query .= "('" . NULL . "','" . $datanama . "','" . $harga[$index] . "','" . $stok[$index] . "','" . $berat[$index] . "','" . $namagambar[$index] . "','" . $id_produk[$index] . "'),";
        $index++;
    }
    $query = substr($query, 0, strlen($query) - 1) . ";";
    mysqli_query($con, $query);
    // copy($tmp_gambar, "images/produk/variasi/$namagambar");
    // header("location:.?page=produk_variasi&id=$id_produk");
    echo "<script>location='.?page=produk_variasi&id=$id'</script>";
}

if (isset($_POST['update_variasi'])) {
    $idt = $_GET['idv'];
    $id = $_GET['id'];
    $nama = $_POST['vnama'];
    $harga = $_POST['vharga'];
    $stok = $_POST['vstok'];
    $berat = $_POST['vberat'];

    mysqli_query($con, "update tb_produk_variasi set nama_variasi='$nama',harga_variasi='$harga',stok='$stok',berat='$berat' where id_variasi='$idt'");

    echo "<script>location='.?page=produk_variasi&id=$id'</script>";
}

$p = $_GET['p'];
if ($p = "update") {
    $id = $_GET['id'];
    $sta = $_GET['status'];
    $ket = $_POST['xalasan'];
    if ($sta == "kirim") {
        mysqli_query($con, "update tb_pesan set status='sedang dikirim',keterangan='-' where id_pesan='$id'");
    } else if ($sta == "tolak") {
        mysqli_query($con, "update tb_pesan set status='dibatalkan',keterangan='$ket' where id_pesan='$id'");
        $sql = mysqli_query($con, "select * from tb_pesan_detail where id_pesan='$id'");
        while ($data = mysqli_fetch_assoc($sql)) {
            mysqli_query($con, "UPDATE tb_produk_variasi SET stok=stok+$data[jumlah] WHERE id_variasi='$data[id_variasi]' ");
        }
    }
    echo "<script>location='.?page=pesanan'</script>";
}
