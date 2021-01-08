<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Variasi Produk</h2>
    </div>
</div>

<section class="no-padding-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="block">
                    <?php
                    $id_produk = $_GET['id'];

                    ?>
                    <div class="title">
                        <a href=".?page=produk_variasi_tambah&id=<?php echo $id_produk ?>" class="btn btn-outline-primary">Tambah Variasi</a>
                    </div>
                    <div class="table-responsive">
                        <table id="datatables" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Variasi</th>
                                    <th>Berat</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <!-- <th class="text-center" style="width:150px">Gambar</th> -->
                                    <th class="text-center" style="width:230px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;
                                $sql = mysqli_query($con, "select * from tb_produk_variasi where id_produk='$id_produk'");
                                while ($d = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <tr>
                                        <td><?= $nomor++ ?></td>
                                        <td><?= $d['nama_variasi'] ?></td>
                                        <td><?= $d['berat']; ?> gr</td>
                                        <td><?= $d['stok']; ?></td>
                                        <td><?= $d['harga_variasi']; ?></td>
                                        <!-- <td align="center">
                                            <div style=" height: 100px; width:150px; overflow: hidden; border-radius: 10px; ">
                                                <div style=" background-image: url(images/produk/<?= $d['gambar_variasi']; ?>); background-repeat: no-repeat; background-size: cover; background-position: top center; height:150px;"></div>
                                            </div>
                                        </td> -->
                                        <td class="text-center">
                                            <button data-toggle="modal" data-target="#myEdit<?php echo $d['id_variasi'] ?>" class="btn btn-outline-info btn-sm">Edit</button> -
                                            <button data-toggle="modal" data-target="#myHapus<?php echo $d['id_variasi'] ?>" class="btn btn-outline-primary btn-sm">Hapus</button>
                                        </td>
                                    </tr>

                                    <!-- modal untuk hapus -->
                                    <div class="modal fade" id="myHapus<?php echo $d['id_variasi'] ?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin?
                                                </div>
                                                <div class="modal-footer">
                                                    <a href=".?page=aksi_hapus&p=variasi&id=<?php echo $d['id_produk']; ?>&idv=<?php echo $d['id_variasi']; ?>" class="btn btn-primary">&nbsp; Iya &nbsp;</a> &nbsp;
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- akhir modal untuk hapus -->
                                    <!-- modal untuk Edit -->
                                    <div class="modal fade" id="myEdit<?php echo $d['id_variasi'] ?>">
                                        <!-- Modal content -->
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <span class="close" data-dismiss="modal">&times;</span>
                                                    <h2>Ubah Data Variasi</h2>
                                                </div>
                                                <form action=".?page=aksi&id=<?php echo $d['id_produk'] ?>&idv=<?php echo $d['id_variasi']; ?>" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <?php
                                                        $idp = $d['id_variasi'];
                                                        $sqlp = mysqli_query($con, "select * from tb_produk_variasi where id_variasi='$idp'");
                                                        while ($dat = mysqli_fetch_assoc($sqlp)) {
                                                        ?>
                                                            <div class="form-group">
                                                                <label>Nama Variasi</label>
                                                                <input type="text" name="vnama" class="form-control" value="<?php echo $dat['nama_variasi']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Berat</label>
                                                                <input type="text" name="vberat" class="form-control" value="<?php echo $dat['berat']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Stok</label>
                                                                <input type="text" name="vstok" class="form-control" value="<?php echo $dat['stok']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Harga</label>
                                                                <input type="text" name="vharga" class="form-control" value="<?php echo $dat['harga_variasi']; ?>">
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="update_variasi" class="btn btn-success">Update</button>
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
</section>