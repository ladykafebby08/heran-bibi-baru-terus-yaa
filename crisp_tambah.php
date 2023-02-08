<div class="page-header">
	<h1>Tambah Crisp</h1>
</div>
<div class="row">
	<div class="col-sm-6">
		<?php if ($_POST) include 'aksi.php' ?>
		<form method="post">
			<div class="form-group">
				<label>Kriteria <span class="text-danger">*</span></label>
				<select class="form-control" name="kode_kriteria"><?= get_kriteria_option($_GET['kode_kriteria']) ?></select>
			</div>
			<div class="form-group">
				<label>Nama <span class="text-danger">*</span></label>
				<input class="form-control" type="text" name="nama" value="<?= set_value('nama') ?>" />
			</div>
			<div class="form-group">
				<label>Nilai <span class="text-danger">*</span></label>
				<input class="form-control" type="text" name="nilai" value="<?= set_value('nilai') ?>" />
			</div>
			<div class="form-group">
				<button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
				<a class="btn btn-danger" href="?m=crisp"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
			</div>
		</form>
	</div>
</div>