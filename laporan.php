<div class="page-header">
    <h1>Laporan</h1>
</div>
<?php
$kodeJabatan = $_POST['kodeJabatan'];

$tahun = set_value('tahun');
$q = esc_field(_get('q'));
$rows = $db->get_results("SELECT * FROM tb_alternatif WHERE nama_alternatif LIKE '%$q%' AND YEAR(tanggal_survey)='$tahun' ORDER BY rank");
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="laporan" />
            <div class="form-group">
                <select class="form-control" name="tahun">
                    <?= get_tahun_option($tahun) ?>
                </select>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= _get('q') ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <?php if ($rows) : ?>

            <?php endif ?>

        </form>
        <hr>
        <form method="get" action="hitung_cetak.php?m=hitung&tahun=<?= $tahun ?>&kodeJabatan=<?= $kodeJabatan ?>">
            <div class="form-group">
                <select class="form-control" name="kodeJabatan">
                    <option value="">--- Pilih jabatan ---</option>
                    <option value="1">Kasi</option>
                    <option value="2">Staf</option>
                    <option value="3">Kepala Dinas</option>
                </select>
            </div>

            <div class="form-group">
                <button class="btn btn-default"><span class="glyphicon glyphicon-print"></span> Cetak</button>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>NIK</th>
                    <th>Nama Alternatif</th>
                    <th>Alamat</th>
                    <th>Telpon</th>
                    <th>Tanggal Survey</th>
                    <th>Total</th>
                </tr>
            </thead>
            <?php
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $row->rank ?></td>
                    <td><?= $row->nik ?></td>
                    <td><?= $row->nama_alternatif ?></td>
                    <td><?= $row->alamat ?></td>
                    <td><?= $row->telpon ?></td>
                    <td><?= date('d M Y', strtotime($row->tanggal_survey)) ?></td>
                    <td><?= round($row->total, 2) ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>