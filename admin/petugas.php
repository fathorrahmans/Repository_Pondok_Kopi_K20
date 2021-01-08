<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Data Petugas</h2>
    </div>
</div>

<section class="no-padding-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="block margin-bottom-sm">
                    <div class="title">
                        <button data-toggle="modal" data-target="#myTambah" class="btn btn-outline-primary"><i class=" fad fa-user-plus"></i> Tambah Petugas</button>
                        <div id="myTambah" class="modal fade">
                            <div class="modal-dialog">
                                <!-- Modal content -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <span class="close" data-dismiss="modal">&times;</span>
                                        <h2>Tambah Petugas</h2>
                                    </div>
                                    <form action=".?page=aksi" method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" name="xnama" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="xusername" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" name="xpassword" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>No Telepon</label>
                                                <input type="text" name="xtelp" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Level</label>
                                                <select name="xlevel" id="xlevel" class="form-control mb-3 mb-3">
                                                    <option value="admin">admin</option>
                                                    <option value="karyawan">karyawan</option>
                                                    <option value="pemilik">pemilik</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea class="form-control" name="xalamat" cols="30" rows="3"></textarea>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="tambah_petugas" class="btn btn-success">Tambah</button> &nbsp;
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
                                    <th>Nama Petugas</th>
                                    <th>Username</th>
                                    <th>No Telepon</th>
                                    <th>Level</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;
                                $sql = mysqli_query($con, "select * from tb_petugas");
                                while ($d = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <tr>
                                        <td><?= $nomor++ ?></td>
                                        <td><?= $d['nama_petugas'] ?></td>
                                        <td><?= $d['username'] ?></td>
                                        <td><?= $d['no_telp'] ?></td>
                                        <td><?= $d['level'] ?></td>
                                        <td class="text-center"> <button data-toggle="modal" data-target="#myEdit<?php echo $d['id_petugas'] ?>" class="btn btn-outline-info btn-sm">Edit</button> &nbsp; - &nbsp;
                                            <button data-toggle="modal" data-target="#myHapus<?php echo $d['id_petugas'] ?>" class="btn btn-outline-primary btn-sm">Hapus</button>
                                        </td>
                                    </tr>
                                    <!-- modal untuk hapus -->
                                    <div class="modal fade" id="myHapus<?php echo $d['id_petugas'] ?>">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin?
                                                </div>
                                                <div class="modal-footer">
                                                    <a href=".?page=aksi_hapus&p=petugas&id=<?php echo $d['id_petugas']; ?>" class="btn btn-primary">&nbsp; Iya &nbsp;</a> &nbsp;
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- akhir modal untuk hapus -->
                                    <!-- modal untuk Edit -->
                                    <div class="modal fade" id="myEdit<?php echo $d['id_petugas'] ?>">
                                        <!-- Modal content -->
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <span class="close" data-dismiss="modal">&times;</span>
                                                    <h2>Ubah Data Petugas</h2>
                                                </div>
                                                <form action=".?page=aksi&id=<?php echo $d['id_petugas']; ?>" method="post">
                                                    <div class="modal-body">
                                                        <?php
                                                        $idpt = $d['id_petugas'];
                                                        $sqlpt = mysqli_query($con, "select * from tb_petugas where id_petugas='$idpt'");
                                                        while ($dat = mysqli_fetch_assoc($sqlpt)) {
                                                        ?>
                                                            <div class="form-group">
                                                                <label>Nama</label>
                                                                <input type="text" name="xnama" class="form-control" value="<?php echo $dat['nama_petugas']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Username</label>
                                                                <input type="text" name="xusername" class="form-control" value="<?php echo $dat['username']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input type="text" name="xpassword" class="form-control" value="<?php echo $dat['password']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>No Telepon</label>
                                                                <input type="text" name="xtelp" class="form-control" value="<?php echo $dat['no_telp']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Level</label>
                                                                <select name="xlevel" id="xlevel" class="form-control mb-3 mb-3">
                                                                    <option value="<?= $dat['level']; ?>"><?= $dat['level']; ?></option>
                                                                    <option value="admin">admin</option>
                                                                    <option value="karyawan">karyawan</option>
                                                                    <option value="pemilik">pemilik</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Alamat</label>
                                                                <textarea class="form-control" name="xalamat" cols="30" rows="3"><?= $dat['alamat']; ?></textarea>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="update_petugas" class="btn btn-success">Update</button>
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