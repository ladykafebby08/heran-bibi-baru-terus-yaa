<?php
function get_crisp_option($kriteria, $selected = 0)
{
    global $db;
    $rows = $db->get_results("SELECT kode_crisp, nilai, nama_crisp FROM tb_crisp WHERE kode_kriteria='$kriteria' ORDER BY kode_crisp");
    $a = '';
    foreach ($rows as $row) {
        if ($row->kode_crisp == $selected)
            $a .= "<option value='$row->kode_crisp' selected>$row->nama_crisp</option>";
        else
            $a .= "<option value='$row->kode_crisp'>$row->nama_crisp</option>";
    }
    return $a;
}
$row = $db->get_row("SELECT * FROM tb_alternatif WHERE nik='$_GET[ID]'");
?>
<div class="page-header">
    <h1>Ubah Nilai &raquo; <small><?= $row->nama_alternatif ?></small></h1>
</div>
<div class="row">
    <div class="col-lg-4">
        <?php if ($_POST) include 'aksi.php' ?>
        <form method="post">
            <div class="form-group">
                <label>Nama <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama_alternatif" value="<?= $row->nama_alternatif ?>" readonly />
            </div>
            <div class="form-group">
                <label>Tanggal Survey <span class="text-danger">*</span></label>
                <input class="form-control" type="date" name="tanggal_survey" value="<?= set_value('tanggal_survey', $row->tanggal_survey) ?>" />
            </div>
            <?php
            $rows = $db->get_results("SELECT ra.ID, k.kode_kriteria, k.nama_kriteria, ra.kode_crisp FROM tb_rel_alternatif ra INNER JOIN tb_kriteria k ON k.kode_kriteria=ra.kode_kriteria  WHERE nik='$_GET[ID]' ORDER BY kode_kriteria");
            foreach ($rows as $row) : ?>
                <div class="form-group">
                    <div class="form-group">
                        <label><?= $row->nama_kriteria ?></label>
                        <?php if (isset($KRITERIA_CRISP[$row->kode_kriteria])) : ?>
                            <div style="display: grid; grid-template-columns: 1fr 40px; gap: 24px; ">
                                <select class="form-control" name="nilai[<?= $row->ID ?>]"><?= get_crisp_option($row->kode_kriteria, $row->kode_crisp) ?></select>
                            <?php else : ?>
                                <input class="form-control" name="nilai[<?= $row->ID ?>]" value="<?= $row->kode_crisp ?>" />
                            <?php endif ?>

                            <?php
                            $nilai = 0;
                            $kode = $row->kode_crisp;

                            if (in_array($kode, array(4, 8,  12, 13, 14, 27, 31, 35, 41))) {
                                $nilai = 1;
                            } elseif (in_array($kode, array(1, 9, 15, 16, 17, 18, 28, 32, 36))) {
                                $nilai = 2;
                            } elseif (in_array($kode, array(2, 5, 10, 19, 20, 21, 22, 29, 33, 37, 40))) {
                                $nilai = 3;
                            } elseif (in_array($kode, array(11, 23, 24, 25, 26, 30, 34, 38))) {
                                $nilai = 4;
                            } elseif (in_array($kode, array(3, 6, 7, 39))) {
                                $nilai = 5;
                            }

                            ?>

                            <input type="text" value=<?= $nilai ?> style="text-align: center;">
                            </div>
                    </div>
                </div>
            <?php endforeach ?>

            <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=rel_alternatif"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
        </form>
    </div>
</div>


</form>
</div>
</div>