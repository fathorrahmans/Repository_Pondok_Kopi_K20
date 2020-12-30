<div class="page-header">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Laporan Penjualan</h2>
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
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Harga Produk</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Keluar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $nomor = 1;
                                $sql = mysqli_query($con, "select * from tb_pesan_detail d inner join tb_pesan p on d.id_pesan=p.id_pesan inner join tb_produk_variasi r on d.id_variasi=r.id_variasi inner join tb_produk k on r.id_produk=k.id_produk order by d.id_detail_pesan asc");
                                while ($d = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <tr>
                                        <td><?= $nomor++; ?></td>
                                        <td><?= $d['nama_depan'] ?> <?= $d['nama_belakang'] ?></td>
                                        <td><?= $d['harga_variasi']; ?></td>
                                        <td><?= $d['jumlah']; ?></td>
                                        <td><?= $d['tanggal_pesan']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>