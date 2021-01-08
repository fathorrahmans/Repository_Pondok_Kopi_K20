<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Daftar Kota</h2>
    </div>
</div>

<section class="no-padding-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <div class="block no-margin-bottom">
                    <div class="title">
                        <button data-toggle="modal" data-target="#myTambah" class="btn btn-outline-primary"><i class="fad fa-map-marker-plus"></i> Tambah Kota</button>
                        <div id="myTambah" class="modal fade">
                            <div class="modal-dialog">
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <span class="close" data-dismiss="modal">&times;</span>
                                        <h2>Tambah Kota</h2>
                                    </div>
                                    <form action=".?page=aksi" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama Kota</label>
                                                <input type="text" name="xkota" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Harga Ongkir</label>
                                                <input type="text" name="xharga" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="tambah_kota" class="btn btn-success">Tambah</button> &nbsp;
                                            <button type="reset" name="reset" class="btn btn-secondary">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table id="datatables" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Kota</th>
                                <th>Harga Ongkir</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 1;
                            $sql = mysqli_query($con, "select * from tb_ongkir");
                            while ($d = mysqli_fetch_assoc($sql)) {
                            ?>
                                <tr>
                                    <td class="text-center"><?= $nomor++; ?></td>
                                    <td><?= $d['nama_kota']; ?></td>
                                    <td>Rp. <?= number_format($d['harga_ongkir']) ?>,-</td>
                                    <td class="text-center"> <button data-toggle="modal" data-target="#myKota<?php echo $d['id_ongkir'] ?>" class="btn btn-outline-info btn-sm">Edit</button> &nbsp; - &nbsp;
                                        <button data-toggle="modal" data-target="#myHapus<?php echo $d['id_ongkir'] ?>" class="btn btn-outline-primary btn-sm">Hapus</button>
                                    </td>
                                </tr>
                                <!-- modal untuk hapus -->
                                <div class="modal fade" id="myHapus<?php echo $d['id_ongkir'] ?>">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin?
                                            </div>
                                            <div class="modal-footer">
                                                <a href=".?page=aksi_hapus&p=kota&id=<?php echo $d['id_ongkir']; ?>" class="btn btn-primary">&nbsp; Iya &nbsp;</a> &nbsp;
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- akhir modal untuk hapus -->

                                <div class="modal fade" id="myKota<?php echo $d['id_ongkir'] ?>">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <span class="close" data-dismiss="modal">&times;</span>
                                                <h2>Detail Kota</h2>
                                            </div>
                                            <form action=".?page=aksi&id=<?php echo $d['id_ongkir']; ?>" method="post">
                                                <div class="modal-body">
                                                    <?php
                                                    $idpt = $d['id_ongkir'];
                                                    $sqlpt = mysqli_query($con, "select * from tb_ongkir where id_ongkir='$idpt'");
                                                    while ($dat = mysqli_fetch_assoc($sqlpt)) {
                                                    ?>
                                                        <div class="form-group">
                                                            <label>Nama Kota</label>
                                                            <input type="text" name="xkota" class="form-control" value="<?php echo $dat['nama_kota']; ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Harga Ongkir</label>
                                                            <input type="text" name="xongkir" class="form-control" value="<?php echo $dat['harga_ongkir']; ?>" required>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="update_kota" class="btn btn-success">Update</button>
                                                </div>
                                            <?php } ?>
                                            </form>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                </div>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</section>