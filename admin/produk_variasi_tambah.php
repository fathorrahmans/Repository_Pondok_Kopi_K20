<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Variasi Produk</h2>
    </div>
</div>

<section class="no-padding-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <div class="block">
                    <?php
                    $id_produk = $_GET['id'];
                    ?>
                    <form method="post" action=".?page=aksi&id=<?php echo $id_produk ?>" enctype="multipart/form-data" name="form1">
                        <!-- Buat tombol untuk menambah form data -->
                        <button type="button" id="btn-tambah-form" class="btn btn-outline-warning btn-sm">Tambah Form</button>
                        <button type="button" id="btn-reset-form" class="btn btn-outline-secondary btn-sm">Reset Form</button><br><br>

                        <b>Data ke 1 :</b>
                        <table>
                            <tr>
                                <td>Nama Variasi</td>
                                <td><input type="text" name="vnama[]" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td><input type="text" name="vharga[]" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td><input type="text" name="vstok[]" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Berat</td>
                                <td><input type="text" name="vberat[]" class="form-control" required></td>
                            </tr>
                            <!-- <tr>
                                <td>Gambar</td>
                                <td><input type="file" name="vgambar[]" id="vgambar[]" class="form-control" multiple /></td>
                            </tr> -->
                            <tr>
                                <td><input type="hidden" name="vid[]" value="<?php echo $id_produk ?>" class="form-control" /></td>
                            </tr>
                        </table>
                        <br><br>

                        <div id="insert-form"></div>

                        <hr>
                        <button type="submit" name="tambah_variasi" class="btn btn-outline-success btn-sm">Simpan</button>
                    </form>

                    <!-- Kita buat textbox untuk menampung jumlah data form -->
                    <input type="hidden" id="jumlah-form" value="1">

                </div>
            </div>

        </div>
    </div>
</section>