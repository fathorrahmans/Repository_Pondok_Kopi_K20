<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Data Pelanggan</h2>
    </div>
</div>

<section class="no-padding-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="block">
                    <div class="table-responsive">
                        <table id="datatables" class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Telepon</th>
                                    <th>Alamat</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;
                                $sql = mysqli_query($con, "select * from tb_pelanggan");
                                while ($d = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $nomor++; ?></td>
                                        <td><?= $d['nama']; ?></td>
                                        <td><?= $d['jenis_kelamin']; ?></td>
                                        <td><?= $d['no_telp']; ?></td>
                                        <td><?= $d['alamat']; ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#myUser<?php echo $d['id_pelanggan'] ?>">Edit</button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="myUser<?php echo $d['id_pelanggan'] ?>" style="margin-top: 10%;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <span class="close" data-dismiss="modal">&times;</span>
                                                </div>
                                                <form action=".?page=aksi&id=<?php echo $d['id_pelanggan'] ?>" method="POST">
                                                    <div class="modal-body">
                                                        <?php
                                                        $id = $d['id_pelanggan'];
                                                        $sqla = mysqli_query($con, "select * from tb_pelanggan where id_pelanggan='$id'");
                                                        while ($da = mysqli_fetch_assoc($sqla)) {
                                                        ?>
                                                            <div class="form-group">
                                                                <label>Username</label>
                                                                <input class="form-control" type="text" name="xuser" id="xuser" value="<?= $d['username']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Password</label>
                                                                <input class="form-control" type="Password" name="xpass" id="xpass" value="<?= $d['password']; ?>">
                                                            </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="update_pelanggan" href=".?page=aksi&id=<?php echo $id ?>" class="btn btn-success">Update</button>
                                                    </div>
                                                <?php } ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>