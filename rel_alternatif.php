<?php
$data = get_rel_alternatif(esc_field(_get('q')));
?>
<div class="page-header">
    <h1>Nilai Alternatif</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="rel_alternatif" />
            <div class="form-group">
                <input class="form-control" type="text" name="q" value="<?= _get('q') ?>" placeholder="Pencarian..." />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <!-- <div class="form-group">
                <a class="btn btn-default" href="cetak.php?m=rel_alternatif" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>
            </div> -->
        </form>
    </div>
    <table class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Alternatif</th>
                <th>Tanggal Survey</th>
                <?php foreach ($KRITERIA as $key => $val) : ?>
                    <th><?= $val->nama_kriteria ?></th>
                <?php endforeach ?>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $q = esc_field(_get('q'));
        $rows = $db->get_results("SELECT * FROM tb_alternatif WHERE nama_alternatif LIKE '%$q%' ORDER BY nik");
        foreach ($rows as $row) : ?>
            <tr>
                <td><?= $row->nik ?></td>
                <td><?= $row->nama_alternatif ?></td>
                <td><?= $row->tanggal_survey ? date('d M Y', strtotime($row->tanggal_survey)) : '' ?></td>
                <?php foreach ($data[$row->nik] as $k => $v) : ?>
                    <td><?= isset($CRISP[$v]) ? $CRISP[$v]->nama_crisp : '' ?></td>
                <?php endforeach ?>
                <td>
                    <a class="btn btn-xs btn-warning" href="?m=rel_alternatif_ubah&ID=<?= $row->nik ?>"><span class="glyphicon glyphicon-edit"></span> Ubah</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>