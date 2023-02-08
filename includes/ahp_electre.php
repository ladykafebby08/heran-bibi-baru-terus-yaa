<?php
class AHP
{
    public $data;
    public $baris_total;
    public $normal;
    public $prioritas;
    public $cm;

    function __construct($data)
    {
        $this->data = $data;
        $this->baris_total();
        $this->normal();
        $this->prioritas();
        $this->cm();
    }
    function baris_total()
    {
        $this->baris_total = array();
        foreach ($this->data as $key => $val) {
            foreach ($val as $k => $v) {
                if (!isset($this->baris_total[$k]))
                    $this->baris_total[$k] = 0;
                $this->baris_total[$k] += $v;
            }
        }
    }
    function normal()
    {
        $this->normal = array();
        foreach ($this->data as $key => $val) {
            foreach ($val as $k => $v) {
                $this->normal[$key][$k] = $v / $this->baris_total[$k];
            }
        }
    }
    function prioritas()
    {
        $this->prioritas = array();
        foreach ($this->normal as $key => $val) {
            $this->prioritas[$key] = array_sum($val) / count($val);
        }
    }
    function cm()
    {
        $this->cm = array();
        foreach ($this->data as $key => $val) {
            $this->cm[$key] = 0;
            foreach ($val as $k => $v) {
                $this->cm[$key] += $v * $this->prioritas[$k];
            }
            $this->cm[$key] /= $this->prioritas[$key];
        }
    }
}

class ELECTRE
{
    public $rel_alternatif;
    public $bobot;

    public $kriteria;
    public $x_jarak;
    public $normal;
    public $terbobot;
    public $concordance;
    public $discordance;
    public $m_concordance;
    public $m_discordance;
    public $t_concordance;
    public $t_discordance;
    public $md_concordance;
    public $md_discordance;
    public $agregate;
    public $total;
    public $rank;

    function __construct($rel_alternatif, $bobot)
    {
        $this->rel_alternatif = $rel_alternatif;
        $this->bobot = $bobot;

        $this->x_jarak();
        $this->normal();
        $this->terbobot();
        $this->concordance();
        $this->discordance();
        $this->m_concordance();
        $this->m_discordance();

        $this->t_concordance = $this->treshold($this->m_concordance);
        $this->t_discordance = $this->treshold($this->m_discordance);
        $this->md_concordance();
        $this->md_discordance();
        $this->agregate();
        $this->total();
        $this->rank();
    }
    function rank()
    {
        $temp = $this->total;
        arsort($temp);
        $no = 1;
        $this->rank = array();
        foreach ($temp as $key => $value) {
            $this->rank[$key] = $no++;
        }
    }
    function total()
    {
        foreach ($this->agregate as $key => $val) {
            $this->total[$key] = array_sum($val);
        }
    }
    function agregate()
    {
        foreach ($this->md_concordance as $key => $val) {
            foreach ($val as $k => $v) {
                $this->agregate[$key][$k] = $v * $this->md_discordance[$key][$k];
            }
        }
    }
    function md_discordance()
    {
        // dd($this->m_discordance);
        foreach ($this->m_discordance as $key => $val) {
            foreach ($val as $k => $v) {
                $this->md_discordance[$key][$k] = $v >= $this->t_discordance ? 1 : 0;
            }
        }
    }
    function md_concordance()
    {
        foreach ($this->m_concordance as $key => $val) {
            foreach ($val as $k => $v) {
                $this->md_concordance[$key][$k] = $v >= $this->t_concordance ? 1 : 0;
            }
        }
    }
    function treshold($matriks)
    {
        $pembilang = 0;
        $count = count($matriks);
        foreach ($matriks as $key => $val) {
            foreach ($val as $k => $v) {
                if ($key != $k) {
                    $pembilang += $v;
                }
            }
        }
        return $pembilang / ($count * ($count - 1));
    }
    function m_discordance()
    {
        $arr = array();
        $arr2 = array();
        foreach ($this->terbobot as $key => $val) {
            foreach ($this->terbobot as $k => $v) {
                $arr[$key][$k] = array();
                $arr2[$key][$k] = array();
                foreach ($this->kriteria as $a => $b) {
                    $selisih = abs($val[$a] - $v[$a]);

                    if ($val[$a] < $v[$a])
                        $arr[$key][$k][] = $selisih;

                    $arr2[$key][$k][] = $selisih;
                }
            }
        }
        // dd($arr);
        foreach ($arr as $key => $val) {
            foreach ($val as $k => $v) {
                $this->m_discordance[$key][$k] = !$v ? 0 : max($v) / max($arr2[$key][$k]);
            }
        }
    }
    function m_concordance()
    {
        // dd($this->concordance);
        foreach ($this->concordance as $key => $val) {
            foreach ($val as $k => $v) {
                $this->m_concordance[$key][$k] = 0;
                foreach ($v as $a => $b) {
                    $this->m_concordance[$key][$k] += $this->bobot[$b];
                }
            }
        }
    }
    function discordance()
    {
        foreach ($this->normal as $key => $val) {
            foreach ($this->normal as $k => $v) {
                $this->discordance[$key][$k] = array();
                foreach ($this->kriteria as $a => $b) {
                    if ($val[$a] < $v[$a])
                        $this->discordance[$key][$k][] = $a;
                }
            }
        }
    }
    function concordance()
    {
        foreach ($this->normal as $key => $val) {
            foreach ($this->normal as $k => $v) {
                $this->concordance[$key][$k] = array();
                foreach ($this->kriteria as $a => $b) {
                    if ($val[$a] >= $v[$a])
                        $this->concordance[$key][$k][] = $a;
                }
            }
        }
    }
    function terbobot()
    {
        foreach ($this->normal as $key => $val) {
            foreach ($val as $k => $v) {
                $this->terbobot[$key][$k] = $v * $this->bobot[$k];
            }
        }
    }
    function normal()
    {
        foreach ($this->rel_alternatif as $key => $val) {
            foreach ($val as $k => $v) {
                $this->normal[$key][$k] = $v / $this->x_jarak[$k];
            }
        }
    }
    function x_jarak()
    {
        $arr = array();
        foreach ($this->rel_alternatif as $key => $val) {
            foreach ($val as $k => $v) {
                if (!isset($arr[$k]))
                    $arr[$k] = 0;
                $arr[$k] += $v * $v;
            }
        }
        foreach ($arr as $key => $val) {
            $this->kriteria[$key] = $key;
            $this->x_jarak[$key] = sqrt($val);
        }
    }
}
