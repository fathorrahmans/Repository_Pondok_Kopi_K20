<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Galeri Foto</h2>
    </div>
</div>

<section class="no-padding-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="block margin-bottom-sm">
                    <div class="title">
                        <button data-toggle="modal" data-target="#myGaleri" class="btn btn-outline-primary"><i class="fad fa-file-plus"></i> Tambah Gambar</button>
                        <div id="myGaleri" class="modal fade">
                            <div class="modal-dialog">
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <span class="close" data-dismiss="modal">&times;</span>
                                        <h2>Tambah Gambar</h2>
                                    </div>
                                    <form action=".?page=aksi" method="post" enctype="multipart/form-data" name="form1">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Judul Gambar</label>
                                                <input type="text" name="zjudul" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Dokumentasi</label>
                                                <input name="date-input" id="date-input" type="text" data-dd-theme="my-style" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Gambar</label>
                                                <input type="file" name="zgambar" id="zgambar" class="form-control" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Informasi Singkat</label>
                                                <input type="text" name="zsingkat" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi Lengkap</label>
                                                <input type="text" name="zdesk" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="tambah_galeri" class="btn btn-outline-success">Tambah</button> &nbsp;
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
                                    <th>Judul Foto</th>
                                    <th>Tanggal</th>
                                    <th width="250px">Informasi</th>
                                    <th style="text-align: center;">Gambar</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;
                                $sql = mysqli_query($con, "select * from tb_galeri");
                                while ($d = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <tr>
                                        <td><?= $nomor++ ?></td>
                                        <td><?= $d['judul_gambar'] ?></td>
                                        <td><?= date('d-m-Y', strtotime($d['tanggal'])) ?></td>
                                        <td><?= $d['deskripsi_singkat'] ?></td>
                                        <td align="center">
                                            <div style="height: 100px; width:150px; overflow: hidden; border-radius: 10px; ">
                                                <div style="background-image: url(images/galeri/<?= $d['gambar']; ?>); background-repeat: no-repeat; background-size: cover; background-position: top center; height:150px;"></div>
                                            </div>
                                        </td>
                                        <td class="text-center"> <button data-toggle="modal" data-target="#myEdit<?php echo $d['id_galeri'] ?>" class="btn btn-outline-info btn-sm">Edit</button> -
                                            <button data-toggle="modal" data-target="#myHapus<?php echo $d['id_galeri'] ?>" class="btn btn-outline-primary btn-sm">Hapus</button>
                                        </td>
                                    </tr>
                                    <!-- modal untuk hapus -->
                                    <div class="modal fade" id="myHapus<?php echo $d['id_galeri'] ?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin?
                                                </div>
                                                <div class="modal-footer">
                                                    <a href=".?page=aksi_hapus&p=galeri&id=<?php echo $d['id_galeri']; ?>" class="btn btn-primary">&nbsp; Iya &nbsp;</a> &nbsp;
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- akhir modal untuk hapus -->
                                    <!-- modal untuk Edit -->
                                    <div class="modal fade" id="myEdit<?php echo $d['id_galeri'] ?>">
                                        <!-- Modal content -->
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <span class="close" data-dismiss="modal">&times;</span>
                                                    <h2>Ubah Data Gambar</h2>
                                                </div>
                                                <form action=".?page=aksi&id=<?php echo $d['id_galeri']; ?>" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <?php
                                                        $idp = $d['id_galeri'];
                                                        $sqlp = mysqli_query($con, "select * from tb_galeri where id_galeri='$idp'");
                                                        while ($dat = mysqli_fetch_assoc($sqlp)) {
                                                        ?>
                                                            <div class="form-group">
                                                                <label>Judul Gambar</label>
                                                                <input type="text" name="zjudul" class="form-control" value="<?php echo $dat['judul_gambar']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tanggal Dokumentasi 2</label>
                                                                <input type="text" name="date-input2" id="date-input2" value="<?php echo $d['tanggal']; ?>" data-dd-theme="my-style" class="form-control date-input2" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Gambar</label>
                                                                <input type="file" id="zgambar" class="form-control" name="zgambar"><br>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Informasi Singkat</label>
                                                                <textarea class="form-control" name="zsingkat" cols="30" rows="2"><?= $dat['deskripsi_singkat']; ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Deskripsi</label>
                                                                <textarea class="form-control" name="zdesk" cols="30" rows="3"><?= $dat['deskripsi']; ?></textarea>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="update_galeri" class="btn btn-success">Update</button>
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