<?php
$rel_alternatif = get_rel_alternatif();
foreach ($rel_alternatif as $key => $val) {
    if ($ALTERNATIF[$key]->tahun != $tahun) {
        unset($rel_alternatif[$key]);
        continue;
    }
    foreach ($val as $k => $v) {
        $rel_alternatif[$key][$k] =  isset($CRISP[$v]) ? $CRISP[$v]->nilai : 0;
    }
}
$rel_kriteria = get_rel_kriteria();
$ahp = new AHP($rel_kriteria);
$electre = new ELECTRE($rel_alternatif, $ahp->prioritas);
?>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#electre_analisa" data-toggle="collapse">Hasil Analisa</a>
        </h3>
    </div>
    <div class="table-responsive collapse" id="electre_analisa">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <?php foreach ($KRITERIA as $key => $val) : ?>
                        <th><?= $val->nama_kriteria ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($electre->rel_alternatif as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= $ALTERNATIF[$key]->nama_alternatif ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= $v ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#electre_normal" data-toggle="collapse">Normalisasi</a>
        </h3>
    </div>
    <div class="table-responsive collapse" id="electre_normal">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <?php foreach ($KRITERIA as $key => $val) : ?>
                        <th><?= $val->nama_kriteria ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($electre->normal as $key => $val) : ?>
                <tr>
                    <td><?= $ALTERNATIF[$key]->nama_alternatif ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= round($v, 4) ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#electre_terbobot" data-toggle="collapse">Terbobot</a>
        </h3>
    </div>
    <div class="table-responsive collapse" id="electre_terbobot">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <?php foreach ($KRITERIA as $key => $val) : ?>
                        <th><?= $val->nama_kriteria ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($electre->terbobot as $key => $val) : ?>
                <tr>
                    <td><?= $ALTERNATIF[$key]->nama_alternatif ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= round($v, 4) ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="#concordance" data-toggle="collapse">Concordance</a></h3>
    </div>
    <div class="table-responsive collapse" id="concordance">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <?php foreach ($electre->concordance as $key => $val) : ?>
                        <th><?= $ALTERNATIF[$key]->nama_alternatif ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($electre->concordance as $key => $val) : ?>
                <tr>
                    <td class="nw"><?= $ALTERNATIF[$key]->nama_alternatif ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td class="nw"><?= $key == $k ? '-' : implode(', ', $v) ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="#discordance" data-toggle="collapse">Disordance</a></h3>
    </div>
    <div class="table-responsive collapse" id="discordance">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <?php foreach ($electre->discordance as $key => $val) : ?>
                        <th><?= $ALTERNATIF[$key]->nama_alternatif ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($electre->discordance as $key => $val) : ?>
                <tr>
                    <td class="nw"><?= $ALTERNATIF[$key]->nama_alternatif ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td class="nw"><?= $key == $k ? '-' : implode(', ', $v) ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="#m_concordance" data-toggle="collapse">Matriks Concordance</a></h3>
    </div>
    <div class="table-responsive collapse" id="m_concordance">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <?php foreach ($electre->m_concordance as $key => $val) : ?>
                        <th><?= $ALTERNATIF[$key]->nama_alternatif ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($electre->m_concordance as $key => $val) : ?>
                <tr>
                    <td class="nw"><?= $ALTERNATIF[$key]->nama_alternatif ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= $key == $k ? '-' : round($v, 4) ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="#m_discordance" data-toggle="collapse">Matriks Discordance</a></h3>
    </div>
    <div class="table-responsive collapse" id="m_discordance">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <?php foreach ($electre->m_discordance as $key => $val) : ?>
                        <th><?= $ALTERNATIF[$key]->nama_alternatif ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($electre->m_discordance as $key => $val) : ?>
                <tr>
                    <td class="nw"><?= $ALTERNATIF[$key]->nama_alternatif ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= $key == $k ? '-' : round($v, 4) ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="#mdc" data-toggle="collapse">Matriks Dominan Concordance</a></h3>
    </div>
    <div class="table-responsive collapse" id="mdc">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <?php foreach ($electre->md_concordance as $key => $val) : ?>
                        <th><?= $ALTERNATIF[$key]->nama_alternatif ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($electre->md_concordance as $key => $val) : ?>
                <tr>
                    <td class="nw"><?= $ALTERNATIF[$key]->nama_alternatif ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= $key == $k ? '-' : $v ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="#mdd" data-toggle="collapse">Matriks Dominan Discordance</a></h3>
    </div>
    <div class="table-responsive collapse" id="mdd">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <?php foreach ($electre->md_discordance as $key => $val) : ?>
                        <th><?= $ALTERNATIF[$key]->nama_alternatif ?></th>
                    <?php endforeach ?>
                </tr>
            </thead>
            <?php foreach ($electre->md_discordance as $key => $val) : ?>
                <tr>
                    <td class="nw"><?= $ALTERNATIF[$key]->nama_alternatif ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= $key == $k ? '-' : $v ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="#rank" data-toggle="collapse">Agregate Dominance Matrix E</a></h3>
    </div>
    <div class="table-responsive collapse in" id="rank">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <?php foreach ($electre->agregate as $key => $val) : ?>
                        <th><?= $ALTERNATIF[$key]->nama_alternatif ?></th>
                    <?php endforeach ?>
                    <th>Total</th>
                </tr>
            </thead>
            <?php
            foreach ($electre->rank as $key => $val) :
                $db->query("UPDATE tb_alternatif SET total='{$electre->total[$key]}', rank='{$electre->rank[$key]}' WHERE nik='$key'"); ?>
                <tr>
                    <td><?= $val ?></td>
                    <td><?= $key ?></td>
                    <td><?= $ALTERNATIF[$key]->nama_alternatif ?></td>
                    <?php foreach ($electre->agregate[$key] as $k => $v) : ?>
                        <td><?= $key == $k ? '-' : round($v, 4) ?></td>
                    <?php endforeach ?>
                    <td><?= $electre->total[$key] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="panel-footer">
        <style>
            .highcharts-credits {
                display: none;
            }
        </style>
        <?php
        function get_chart1()
        {
            global $electre, $ALTERNATIF;

            foreach ($electre->total as $key => $val) {
                $data[$ALTERNATIF[$key]->nama_alternatif] = $val * 1;
            }

            $chart = array();

            $chart['chart']['type'] = 'column';
            $chart['chart']['options3d'] = array(
                'enabled' => true,
                'alpha' => 15,
                'beta' => 15,
                'depth' => 50,
                'viewDistance' => 25,
            );
            $chart['title']['text'] = 'Grafik Hasil Perangkingan';
            $chart['plotOptions'] = array(
                'column' => array(
                    'depth' => 25,
                )
            );

            $chart['xAxis'] = array(
                'categories' => array_keys($data),
            );
            $chart['yAxis'] = array(
                'min' => 0,
                'title' => array('text' => 'Total'),
            );
            $chart['tooltip'] = array(
                'headerFormat' => '<span style="font-size:10px">{point.key}</span><table>',
                'pointFormat' => '<tr><td style="color:{series.color};padding:0">{series.name}: </td>
                            <td style="padding:0"><b>{point.y:.3f}</b></td></tr>',
                'footerFormat' => '</table>',
                'shared' => true,
                'useHTML' => true,
            );

            $chart['series'] = array(
                array(
                    'name' => 'Total nilai',
                    'data' => array_values($data),
                )
            );
            return $chart;
        }

        ?>
        <script>
            $(function() {
                $('#chart1').highcharts(<?= json_encode(get_chart1()) ?>);
            })
        </script>
        <div id="chart1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
</div>

<a class="btn btn-default" href="cetak.php?m=hitung&tahun=<?= $tahun ?>" target="_blank"><span class="glyphicon glyphicon-print"></span> Cetak</a>