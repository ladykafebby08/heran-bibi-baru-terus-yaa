<!-- <h1>Alternatif</h1>
<table>
    <thead>
        <tr>
            <th>NIK</th>
            <th>Nama Alternatif</th>
            <th>Alamat</th>
            <th>Telpon</th>
        </tr>
    </thead>
    <?php
    $q = esc_field(_get('q'));
    $rows = $db->get_results("SELECT * FROM tb_alternatif WHERE nama_alternatif LIKE '%$q%' ORDER BY nik");
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= $row->nik ?></td>
            <td><?= $row->nama_alternatif ?></td>
            <td><?= $row->alamat ?></td>
            <td><?= $row->telpon ?></td>
        </tr>
    <?php endforeach ?>
</table> -->