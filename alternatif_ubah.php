<?php
$row = $db->get_row("SELECT * FROM tb_alternatif WHERE nik='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Alternatif</h1>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>NIK <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nik" readonly="readonly" value="<?= $row->nik ?>" />
            </div>
            <div class="form-group">
                <label>Nama Alternatif <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_alternatif" value="<?= set_value('nik', $row->nama_alternatif) ?>" />
            </div>
            <div class="form-group">
                <label>Alamat <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="alamat" value="<?= set_value('alamat', $row->alamat) ?>" />
            </div>
            <div class="form-group">
                <label>Telpon <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="telpon" value="<?= set_value('telpon', $row->telpon) ?>" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=alternatif"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>