<div class="page-header">
    <h1>Laporan</h1>
</div>
<?php
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
                <div class="form-group">
                    <a class="btn btn-default" target="_blank" href="cetak.php?m=hitung&tahun=<?= $tahun ?>"><span class="glyphicon glyphicon-print"></span> Cetak</a>
                </div>
            <?php endif ?>
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