<div class="page-header">
    <h1>Nilai Crisp</h1>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <form class="form-inline">
            <input type="hidden" name="m" value="crisp" />
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= _get('q') ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</button>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" href="?m=crisp_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kriteria</th>
                    <th>Nama Crisp</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $q = esc_field(_get('q'));
            $rows = $db->get_results("SELECT c.kode_crisp, c.kode_kriteria, k.nama_kriteria, c.nama_crisp, c.nilai 
                FROM tb_crisp c INNER JOIN tb_kriteria k ON k.kode_kriteria=c.kode_kriteria 
                WHERE nama_kriteria LIKE '%$q%' OR nama_crisp LIKE '%$q%' 
                ORDER BY k.kode_kriteria, nilai");
            $no = 1;
            foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->kode_kriteria ?> - <?= $row->nama_kriteria ?></td>
                    <td><?= $row->nama_crisp ?></td>
                    <td><?= $row->nilai ?></td>
                    <td>
                        <a class="btn btn-xs btn-warning" href="?m=crisp_ubah&ID=<?= $row->kode_crisp ?>&kode_kriteria=<?= $row->kode_kriteria ?>"><span class="glyphicon glyphicon-edit"></span></a>
                        <a class="btn btn-xs btn-danger" href="aksi.php?act=crisp_hapus&ID=<?= $row->kode_crisp ?>&kode_kriteria=<?= $row->kode_kriteria ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
            <?php endforeach;
            ?>
        </table>
    </div>
</div>