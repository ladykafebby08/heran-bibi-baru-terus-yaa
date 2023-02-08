<div class="page-header">
    <h1>Perhitungan ELECTRE</h1>
</div>
<?php
$tahun = set_value('tahun');
$q = esc_field(_get('q'));
$rows = $db->get_results("SELECT * FROM tb_alternatif WHERE nama_alternatif LIKE '%$q%' AND YEAR(tanggal_survey)='$tahun' ORDER BY rank");
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="hitung" />
            <div class="form-group">
                <select class="form-control" name="tahun">
                    <?= get_tahun_option($tahun) ?>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-signal"></span> Hitung</button>
            </div>
            <?php if ($rows) : ?>
                <div class="form-group">
                    <a class="btn btn-default" target="_blank" href="cetak.php?m=hitung&tahun=<?= $tahun ?>"><span class="glyphicon glyphicon-print"></span> Cetak</a>
                </div>
            <?php endif ?>
        </form>
    </div>
</div>
<?php
$tahun = set_value('tahun');
if ($tahun)
    include 'hitung_hasil.php';
