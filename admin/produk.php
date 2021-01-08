<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Data Produk</h2>
    </div>
</div>

<section class="no-padding-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="block margin-bottom-sm">
                    <div class="title">
                        <button data-toggle="modal" data-target="#myProduk" class="btn btn-outline-primary"><i class="fad fa-file-plus"></i> Tambah Produk</button>
                        <div id="myProduk" class="modal fade">
                            <div class="modal-dialog">
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <span class="close" data-dismiss="modal">&times;</span>
                                        <h2>Tambah Produk</h2>
                                    </div>
                                    <form action=".?page=aksi" method="post" enctype="multipart/form-data" name="form1">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama Depan</label>
                                                <input type="text" name="ydepan" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Belakang</label>
                                                <input type="text" name="ybelakang" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Gambar</label>
                                                <input type="file" name="ygambar" id="ygambar" class="form-control" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Informasi Singkat</label>
                                                <textarea class="form-control" name="ysingkat" cols="30" rows="3" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea class="form-control" name="ydeskripsi" cols="30" rows="3" required></textarea>
                                            </div>
                                            <div class="alert alert-info">
                                                <p style="color:#0c5460">Untuk menambahkan <b>variasi</b> produk, silahkan selesaikan data produk diatas!</p>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="tambah_produk" class="btn btn-success">Tambah</button> &nbsp;
                                            <button type="reset" name="reset" class="btn btn-secondary">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="datatables" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th class="text-center" style="width:150px">Gambar</th>
                                    <th class="text-center" style="width:230px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;
                                $sql = mysqli_query($con, "select * from tb_produk");
                                while ($d = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <tr>
                                        <td><?= $nomor++ ?></td>
                                        <td><?= $d['nama_depan'] ?> <?= $d['nama_belakang'] ?></td>
                                        <td align="center">
                                            <div style=" height: 100px; width:150px; overflow: hidden; border-radius: 10px; ">
                                                <div style=" background-image: url(images/produk/<?= $d['gambar_produk']; ?>); background-repeat: no-repeat; background-size: cover; background-position: top center; height:150px;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center" width="400px">
                                            <a href=".?page=produk_variasi&id=<?php echo $d['id_produk'] ?>" class="btn btn-outline-success ">Variasi</a> -
                                            <button data-toggle="modal" data-target="#myEdit<?php echo $d['id_produk'] ?>" class="btn btn-outline-info ">Edit</button> -
                                            <button data-toggle="modal" data-target="#myHapus<?php echo $d['id_produk'] ?>" class="btn btn-outline-primary ">Hapus</button>
                                        </td>
                                    </tr>

                                    <!-- modal untuk hapus -->
                                    <div class="modal fade" id="myHapus<?php echo $d['id_produk'] ?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin?
                                                </div>
                                                <div class="modal-footer">
                                                    <a href=".?page=aksi_hapus&p=produk&id=<?php echo $d['id_produk']; ?>" class="btn btn-primary">&nbsp; Iya &nbsp;</a> &nbsp;
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- akhir modal untuk hapus -->
                                    <!-- modal untuk Edit -->
                                    <div class="modal fade" id="myEdit<?php echo $d['id_produk'] ?>">
                                        <!-- Modal content -->
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <span class="close" data-dismiss="modal">&times;</span>
                                                    <h2>Ubah Data Produk</h2>
                                                </div>
                                                <form action=".?page=aksi&id=<?php echo $d['id_produk']; ?>" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <?php
                                                        $idp = $d['id_produk'];
                                                        $sqlp = mysqli_query($con, "select * from tb_produk where id_produk='$idp'");
                                                        while ($dat = mysqli_fetch_assoc($sqlp)) {
                                                        ?>
                                                            <div class="form-group">
                                                                <label>Nama Depan</label>
                                                                <input type="text" name="ydepan" class="form-control" value="<?php echo $dat['nama_depan']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nama Belakang</label>
                                                                <input type="text" name="ybelakang" class="form-control" value="<?php echo $dat['nama_belakang']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Gambar</label>
                                                                <input type="file" id="ygambar" class="form-control" name="ygambar"><br>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Informasi Singkat</label>
                                                                <textarea class="form-control" name="ysingkat" cols="30" rows="2"><?= $dat['deskripsi_singkat']; ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Deskripsi</label>
                                                                <textarea class="form-control" name="ydeskripsi" cols="30" rows="3"><?= $dat['deskripsi']; ?></textarea>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="update_produk" class="btn btn-success">Update</button>
                                                    </div>
                                                <?php } ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- akhir modal untuk Edit -->
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>
</section>