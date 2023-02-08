<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }
    </style>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex, nofollow" />
    <title>LOGIN</title>
    <link rel="icon" href="./assets/images/Lambang_Kota_Sungai_Penuh.png" />
    <link href="assets/css/yeti-bootstrap.min.css" rel="stylesheet" />
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>

<body style="background-color: #A5C9CA;">
    <header style="background-color: #395B64; color:white; padding: 12px; text-align: center; display: flex; align-items: center; justify-content: center; gap: 30px;">
        <div>
            <img src="./assets/images/Lambang_Kota_Sungai_Penuh.png" alt="logo" width="50px">
        </div>
        <div>
            <h2>DINAS PERUMAHAN, KAWASAN PEMUKIMAN & PERTANAHAN KOTA SUNGAI PENUH</h2>
            <p> Jl. Prof. Dr. Sri Sidewi, Koto Renah, Kec. Sungai Bungkal, Kota Sungai Penuh, Jambi 37114</p>
        </div>
    </header>



    <div style="display: grid; grid-template-columns: 1fr 1fr; justify-items: end; margin-top: 60px;">
        <div style="margin-left: 70px;">
            <img src="./assets/images/perkim.png" alt="perkim" width="80%" style="border-radius: 45px;margin-bottom: 36px;">
            <p style="color: #2C3333;">Dinas Perumahan, Kawasan Permukiman dan Pertahanan Kota Sungai Penuh (Dinas Perkim) dibentuk Berdasarkan Peraturan Daerah Kota Sungai Penuh nomor 10 Tahun 2016 tentang Pembentukan dan Penyusunan Perangkat Daerah Kota Sungai Penuh . Dinas Perumahan, Permukiman dan Pertahanan Kota Sungai Penuh, mempunyai tugas pokok membantu Walikota dalam melaksanakan Urusan Pemerintahan yang menjadi kewenangan Daerah dibidang Perumahan Rakyat, Permukiman dan Pertahanan dan tugas pembantuan yang diberikan kepada walikota.</p>

        </div>


        <div class="col-md-4 col-md-offset-4">
            <div class="panel" style="background-color: #E7F6F2;">
                <div class="panel-heading" style="background-color: #395B64; color: white;">
                    <h3 class="panel-title" style="text-align: center; font-weight: 900;">Silahkan Masukan Username &Password Anda</h3>
                </div>
                <div class="panel-body">
                    <?php if ($_POST) include 'aksi.php'; ?>
                    <form class="form-signin" action="?act=login" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" name="user" autofocus autocomplete="off" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="pass" />
                        </div>
                        <button class="btn btn-lg  btn-block" type="submit" style="background-color: #395B64; color: #E7F6F2;">MASUK</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer style="background-color: #395B64; padding: 15px; color:#A5C9CA; position:absolute;left: 0; bottom: 0; right: 0;">
        <div class="container" style="text-align: center;">
            <p>Copyright &copy; Ladyka Febby Olivia_19101152610252</p>
        </div>
    </footer>
</body>

</html>