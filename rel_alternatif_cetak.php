<?php
$data = get_rel_alternatif();
?>
<h1>Nilai Alternatif</h1>

<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama Alternatif</th>
            <?php foreach ($KRITERIA as $key => $val) : ?>
                <th><?= $val->nama_kriteria ?></th>
            <?php endforeach ?>
        </tr>
    </thead>
    <?php
    foreach ($data as $key => $val) : ?>
        <tr>
            <td><?= $key ?></td>
            <td><?= $ALTERNATIF[$key]->nama_alternatif ?></td>
            <?php foreach ($val as $k => $v) : ?>
                <td><?= isset($CRISP[$v]) ? $CRISP[$v]->nama_crisp : '' ?></td>
            <?php endforeach ?>
        </tr>
    <?php endforeach; ?>
</table>