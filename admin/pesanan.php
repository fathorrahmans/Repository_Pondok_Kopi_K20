<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Pesanan</h2>
    </div>
</div>

<section class="no-padding-bottom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="block no-margin-bottom">
                    <div class="table-responsive">
                        <table id="datatables" class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Tanggal Pesan</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Atas Nama</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;
                                $sql = mysqli_query($con, "select * from tb_pesan p inner join tb_pelanggan a on p.id_pelanggan=a.id_pelanggan ");
                                while ($d = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $nomor++; ?></td>
                                        <td class="text-center"><?php echo date('d-m-Y', strtotime($d['tanggal_pesan'])) ?></td>
                                        <td>Rp. <?= number_format($d['total']) ?>,-</td>
                                        <td><?= $d['status']; ?></td>
                                        <td><?= $d['nama']; ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#myPesan<?php echo $d['id_pesan'] ?>">Detail</button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="myPesan<?php echo $d['id_pesan'] ?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <span class="close" data-dismiss="modal">&times;</span>
                                                    <h2>Detail Pesanan</h2>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                    $id = $d['id_pesan'];
                                                    $sqla = mysqli_query($con, "select * from tb_pesan p left join tb_pelanggan a on p.id_pelanggan=a.id_pelanggan where id_pesan='$id'");
                                                    while ($da = mysqli_fetch_assoc($sqla)) {
                                                    ?>
                                                        <label>Id Pesanan : <?= $da['id_pesan']; ?></label>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Atas Nama</label>
                                                                    <input class="form-control" type="text" value="<?= $da['nama'] ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Tanggal Pesan</label>
                                                                    <input class="form-control" type="text" value="<?php echo date('l, d-m-Y', strtotime($da['tanggal_pesan'])) ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Waktu/jam</label>
                                                                    <input class="form-control" type="text" value="<?php echo date('H:i', strtotime($da['tanggal_pesan'])) ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Total Bayar</label>
                                                                    <input class="form-control" type="text" value="Rp. <?= number_format($da['total']) ?>,-">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="false" style="margin-left:auto; margin-right:auto;">
                                                                    <label>Bukti Pembayaran</label>
                                                                    <figure class="click-zoom" style="width: 50%; height: 100%; ">
                                                                        <label>
                                                                            <input type="checkbox">
                                                                            <img src="images/bukti/<?php echo $da['bukti_bayar'] ?>" width="50%" height="60%">
                                                                        </label>
                                                                    </figure>
                                                                </div>
                                                                <form method="POST" action=".?page=aksi&p=update&status=tolak&id=<?= $da['id_pesan']; ?>">
                                                                    <div class="form-group">
                                                                        <label>Alasan menolak pesanan?</label>
                                                                        <textarea class="form-control" name="xalasan" id="" cols="2" rows="3"><?= $da['keterangan']; ?></textarea>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <?php if ($da['status'] == "verifikasi") { ?>
                                                                <a href=".?page=aksi&p=update&status=verifikasi&id=<?= $da['id_pesan']; ?>" class="btn btn-success" name="update_pesanan">Verifikasi</a>
                                                                <button class="btn btn-danger" type="submit">Tolak</button>
                                                            <?php } else if ($da['status'] == "sudah bayar") { ?>
                                                                <a href=".?page=aksi&p=update&status=kirim&id=<?= $da['id_pesan']; ?>" class="btn btn-success" name="update_pesanan">Kirim Pesanan</a>
                                                                <button class="btn btn-danger" type="submit">Tolak</button>
                                                            <?php } ?>
                                                            <?php
                                                            if ($da['status'] == "sedang dikirim") {
                                                                echo "Pesanan Sedang Dikirim";
                                                            } else if ($da['status'] == "dibatalkan") {
                                                                echo "Pesanan Di Batalkan";
                                                            } else if ($da['status'] == "selesai") {
                                                                echo "Pesanan Telah Selesai";
                                                            }
                                                            ?>
                                                        </div>
                                                        </form>
                                                </div>
                                            <?php } ?>
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