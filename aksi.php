<?php
require_once 'functions.php';

if ($act == 'login') {
    $user = esc_field($_POST['user']);
    $pass = esc_field($_POST['pass']);

    $row = $db->get_row("SELECT * FROM tb_user WHERE user='$user' AND pass='$pass'");
    if ($row) {
        $_SESSION['login'] = $row->user;
        $_SESSION['level'] = strtolower($row->level);
        redirect_js("index.php");
    } else {
        print_msg("Salah kombinasi username dan password.");
    }
} elseif ($mod == 'password') {
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];

    $row = $db->get_row("SELECT * FROM tb_user WHERE user='$_SESSION[login]' AND pass='$pass1'");

    if ($pass1 == '' || $pass2 == '' || $pass3 == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif (!$row)
        print_msg('Password lama salah.');
    elseif ($pass2 != $pass3)
        print_msg('Password baru dan konfirmasi password baru tidak sama.');
    else {
        $db->query("UPDATE tb_user SET pass='$pass2' WHERE user='$_SESSION[login]'");
        print_msg('Password berhasil diubah.', 'success');
    }
} elseif ($act == 'logout') {
    unset($_SESSION['login'], $_SESSION['level']);
    header("location:login.php");
}

/** crisp */
elseif ($mod == 'crisp_tambah') {
    $kode_kriteria = $_POST['kode_kriteria'];
    $nilai = $_POST['nilai'];
    $nama = $_POST['nama'];

    if ($kode_kriteria == '' || $nilai == '' || $nama == '')
        print_msg("Nilai dan nama tidak boleh kosong!");
    else {
        $db->query("INSERT INTO tb_crisp (kode_kriteria, nilai, nama_crisp) VALUES ('$_POST[kode_kriteria]', '$nilai', '$nama')");
        redirect_js("index.php?m=crisp");
    }
} else if ($mod == 'crisp_ubah') {
    $kode_kriteria = $_POST['kode_kriteria'];
    $nilai = $_POST['nilai'];
    $nama = $_POST['nama'];

    if ($kode_kriteria == '' || $nilai == '' || $nama == '')
        print_msg("Nilai dan nama tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_crisp SET kode_kriteria='$kode_kriteria', nilai='$nilai', nama_crisp='$nama' WHERE kode_crisp='$_GET[ID]'");
        redirect_js("index.php?m=crisp");
    }
} else if ($act == 'crisp_hapus') {
    $db->query("DELETE FROM tb_crisp WHERE kode_crisp='$_GET[ID]'");
    header("location:index.php?m=crisp");
}
/** user */
elseif ($mod == 'user_tambah') {
    $kode_user = $_POST['kode_user'];
    $nama_user = $_POST['nama_user'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $level = $_POST['level'];

    if ($kode_user == '' || $user == '' || $pass == '' || $nama_user == '' || $level == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    elseif ($db->get_row("SELECT * FROM tb_user WHERE kode_user='$kode_user'")) {
        print_msg("Kode sudah ada!");
    } elseif ($db->get_row("SELECT * FROM tb_user WHERE user='$user'")) {
        print_msg("User sudah ada!");
    } else {
        $db->query("INSERT INTO tb_user (kode_user, user, pass, nama_user, level) 
                                    VALUES ('$kode_user', '$user', '$pass', '$nama_user', '$level')");
        redirect_js("index.php?m=user");
    }
} else if ($mod == 'user_ubah') {
    $kode_user = $_POST['kode_user'];
    $nama_user = $_POST['nama_user'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $level = $_POST['level'];

    if ($kode_user == '' || $user == '' || $pass == '' || $nama_user == '' || $level == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    elseif ($db->get_row("SELECT * FROM tb_user WHERE user='$user' AND kode_user<>'$_GET[ID]'")) {
        print_msg("User sudah ada!");
    } else {
        $db->query("UPDATE tb_user SET 
                user='$user', 
                pass='$pass', 
                nama_user='$nama_user',                                         
                level='$level'
            WHERE kode_user='$_GET[ID]'");
        redirect_js("index.php?m=user");
    }
} else if ($act == 'user_hapus') {
    $db->query("DELETE FROM tb_user WHERE kode_user='$_GET[ID]'");
    header("location:index.php?m=user");
}
/** alternatif */
elseif ($mod == 'alternatif_tambah') {
    $nik = $_POST['nik'];
    $nama_alternatif = $_POST['nama_alternatif'];
    $alamat = $_POST['alamat'];
    $telpon = $_POST['telpon'];
    if ($nik == '' || $nama_alternatif == '' || $alamat == '' || $telpon == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_alternatif WHERE nik='$nik'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("INSERT INTO tb_alternatif (nik, nama_alternatif, alamat, telpon) VALUES ('$nik', '$nama_alternatif', '$alamat', '$telpon')");

        $db->query("INSERT INTO tb_rel_alternatif(nik, kode_kriteria) 
            SELECT '$nik', kode_kriteria FROM tb_kriteria");
        redirect_js("index.php?m=alternatif");
    }
} else if ($mod == 'alternatif_ubah') {
    $nik = $_POST['nik'];
    $nama_alternatif = $_POST['nama_alternatif'];
    $alamat = $_POST['alamat'];
    $telpon = $_POST['telpon'];
    if ($nik == '' || $nama_alternatif == '' || $alamat == '' || $telpon == '')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_alternatif SET nama_alternatif='$nama_alternatif', alamat='$alamat', telpon='$telpon' WHERE nik='$_GET[ID]'");
        redirect_js("index.php?m=alternatif");
    }
} else if ($act == 'alternatif_hapus') {
    $db->query("DELETE FROM tb_alternatif WHERE nik='$_GET[ID]'");
    $db->query("DELETE FROM tb_rel_alternatif WHERE nik='$_GET[ID]'");
    header("location:index.php?m=alternatif");
}

/** kriteria */
elseif ($mod == 'kriteria_tambah') {
    $kode_kriteria = $_POST['kode_kriteria'];
    $nama_kriteria = $_POST['nama_kriteria'];

    if ($kode_kriteria == '' || $nama_kriteria == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_kriteria WHERE kode_kriteria='$kode_kriteria'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("INSERT INTO tb_kriteria (kode_kriteria, nama_kriteria) 
            VALUES ('$kode_kriteria', '$nama_kriteria')");
        $db->query("INSERT INTO tb_rel_kriteria(ID1, ID2, nilai) 
            SELECT '$kode_kriteria', kode_kriteria, 1 FROM tb_kriteria");
        $db->query("INSERT INTO tb_rel_kriteria(ID1, ID2, nilai) 
            SELECT kode_kriteria, '$kode_kriteria', 1 FROM tb_kriteria WHERE kode_kriteria<>'$kode'");

        $db->query("INSERT INTO tb_rel_alternatif(nik, kode_kriteria) 
            SELECT nik, '$kode_kriteria'  FROM tb_alternatif");

        redirect_js("index.php?m=kriteria");
    }
} else if ($mod == 'kriteria_ubah') {
    $kode_kriteria = $_POST['kode_kriteria'];
    $nama_kriteria = $_POST['nama_kriteria'];

    if ($kode_kriteria == '' || $nama_kriteria == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_kriteria WHERE kode_kriteria='$kode_kriteria' AND kode_kriteria<>'$_GET[ID]'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("UPDATE tb_kriteria SET kode_kriteria='$kode_kriteria', nama_kriteria='$nama_kriteria' WHERE kode_kriteria='$_GET[ID]'");
        redirect_js("index.php?m=kriteria");
    }
} else if ($act == 'kriteria_hapus') {
    $db->query("DELETE FROM tb_kriteria WHERE kode_kriteria='$_GET[ID]'");
    $db->query("DELETE FROM tb_rel_kriteria WHERE ID1='$_GET[ID]' OR ID2='$_GET[ID]'");
    $db->query("DELETE FROM tb_rel_alternatif WHERE kode_kriteria='$_GET[ID]'");
    header("location:index.php?m=kriteria");
}

/** RELASI ALTERNATIF */
else if ($mod == 'rel_alternatif_ubah') {
    $tanggal_survey = $_POST['tanggal_survey'];
    if ($tanggal_survey == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_alternatif SET tanggal_survey='$tanggal_survey' WHERE nik='$_GET[ID]'");

        foreach ($_POST['nilai'] as $key => $val) {
            $db->query("UPDATE tb_rel_alternatif SET kode_crisp='$val' WHERE ID='$key'");
        }

        // redirect_js("index.php?m=rel_alternatif");
        header("Refresh:0");
    }
}


/** rel_kriteria */
else if ($mod == 'rel_kriteria') {
    $ID1 = $_POST['ID1'];
    $ID2 = $_POST['ID2'];
    $nilai = abs($_POST['nilai']);

    if ($ID1 == $ID2 && $nilai <> 1)
        print_msg("Kriteria yang sama harus bernilai 1.");
    else {
        $db->query("UPDATE tb_rel_kriteria SET nilai=$nilai WHERE ID1='$ID1' AND ID2='$ID2'");
        $db->query("UPDATE tb_rel_kriteria SET nilai=1/$nilai WHERE ID2='$ID1' AND ID1='$ID2'");
        print_msg("Nilai kriteria berhasil diubah.", 'success');
    }
}
