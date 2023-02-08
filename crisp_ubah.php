<?php
$row = $db->get_row("SELECT * FROM tb_crisp WHERE kode_crisp='$_GET[ID]'");
?>
<div class="page-header">
	<h1>Ubah Crisp</h1>
</div>
<div class="row">
	<div class="col-sm-6">
		<?php if ($_POST) include 'aksi.php' ?>
		<form method="post">
			<div class="form-group">
				<label>Kriteria <span class="text-danger">*</span></label>
				<select class="form-control" name="kode_kriteria">
					<?= get_kriteria_option($row->kode_kriteria) ?>
				</select>
			</div>
			<div class="form-group">
				<label>Nama <span class="text-danger">*</span></label>
				<input class="form-control" type="text" name="nama" value="<?= $row->nama_crisp ?>" />
			</div>
			<div class="form-group">
				<label>Nilai <span class="text-danger">*</span></label>
				<input class="form-control" type="text" name="nilai" value="<?= $row->nilai ?>" />
			</div>
			<button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
			<a class="btn btn-danger" href="?m=crisp"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
		</form>
	</div>
</div>