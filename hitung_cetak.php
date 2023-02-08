<?php
include 'functions.php';

$kodeJabatan = $_GET['kodeJabatan'];

if ($kodeJabatan == 1) {
    $jabatan = "Kasi";
    $nama = "alif";
    $nip = "1910123";
} else if ($kodeJabatan == 2) {
    $jabatan = "Staf";
    $nama = "bibi";
    $nip = "19103424";
}
if ($kodeJabatan == 3) {
    $jabatan = "Kepala Dinas";
    $nama = "acim";
    $nip = "1910234234";
}
?>

<!doctype html>
<html>

<head>
    <title>Cetak Laporan</title>
    <style>
        body {
            font-family: Verdana;
            font-size: 13px;
        }

        h1 {
            font-size: 16px;

            padding: 3px 0;
        }

        table {
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        td,
        th {
            border: 1px solid #000;
            padding: 3px;
        }

        .wrapper {
            margin: 0 auto;
            max-width: 1024px;
        }
    </style>
</head>

<body onload="window.prin()">

    <div style="border-bottom: 4px double black; display:flex ;">
        <div style="margin-right: 20px;">
            <img src="assets/images/Lambang_Kota_Sungai_Penuh.png" height="50" />
        </div>
        <div style="text-align: center;">
            <h2 style="margin: 0;">Dinas Perumahan, kawasan Pemukiman & Pertanahan Kota Sungai Penuh</h2>
            <p style="margin: 10px 0;">Jl. Prof. Dr. Sri Sidewi, Koto Renah, Kec. Sungai Bungkal, Kota Sungai Penuh, Jambi 37114</p>
        </div>

    </div>

    <h1>Hasil Perhitungan</h1>
    <table class="table table-bordered table-hover table-striped" style="margin-inline: auto;">
        <thead>
            <tr>
                <th>Rank</th>
                <th>NIK</th>
                <th>Nama Alternatif</th>
                <th>Alamat</th>
                <th>Tanggal Survey</th>
                <th>Hasil ELECTRE</th>
                <th>Keputusan</th>
            </tr>
        </thead>
        <?php
        $where = '';
        $tahun = set_value('tahun');
        if ($tahun)
            $where .= " AND YEAR(tanggal_survey)='$tahun'";
        $rows = $db->get_results("SELECT * FROM tb_alternatif WHERE 1 $where ORDER BY rank");
        $no = 0;
        foreach ($rows as $row) : ?>
            <tr>
                <td style="text-align: center;"><?= $row->rank ?></td>
                <td style="text-align: center;"><?= $row->nik ?></td>
                <td> <?= $row->nama_alternatif ?></td>
                <td><?= $row->alamat ?></td>
                <td style="text-align: center;"><?= date('d M Y', strtotime($row->tanggal_survey)) ?></td>
                <td style="text-align: center;"><?= round($row->total, 4) ?></td>
                <td style="text-align: center;">
                    <?php
                    if (round($row->total, 4) > 0) {
                        echo "Tidak Layak Huni";
                    } else {
                        echo "Layak Huni";
                    }
                    ?>
                </td>


            </tr>
        <?php endforeach ?>
    </table>
    <div>

        <div style="float: right; text-align: center; margin-top: 20px;">
            Diketahui Oleh <br>
            Sungai Penuh, <?= tgl_indo(date('Y-m-d')) ?><br />
            <?= $jabatan ?> <br />
            <br />
            <br />
            <br />
            <br />
            <?= $nama ?> <br />
            <hr>
            <?= $nip ?> <br />
            <br>
        </div>
    </div>
</body>

</html>