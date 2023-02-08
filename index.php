<?php
include 'functions.php';
if (empty($_SESSION['login']))
	header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&display=swap" rel="stylesheet">
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" href="./assets/images/Lambang_Kota_Sungai_Penuh.png" />

	<title> Dinas Perumahan, Permukiman dan Pertanahan kota sungai penuh</title>
	<link href="assets/css/yeti-bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/general.css" rel="stylesheet" />
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/highcharts.js"></script>
	<script src="assets/js/highcharts-3d.js"></script>
	<script src="assets/js/exporting.js"></script>
	<style>
		a:hover {
			text-decoration: none;
		}
	</style>
</head>

<body style="font-family: 'Poppins', sans-serif; background-color: #A5C9CA;">
	<nav class="navbar navbar-default navbar-static-top" style="background-color: #395B64;">
		<div>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<div style="display: flex; justify-content: space-between;">

					<div>
						<img src="./assets/images/Lambang_Kota_Sungai_Penuh.png" alt="" style="width: 45px;">
						<a href="?" style="color:white; font-size: 25px;">
							Dinas Perumahan, kawasan Permukiman& Pertanahan kota Sungai Penuh
						</a>
					</div>
					<ul class="nav navbar-nav">
						<?php if ($_SESSION['level'] == 'admin') : ?>
							<li><a href="?m=user"><span class="glyphicon glyphicon-user"></span> User</a></li>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Alternatif <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="?m=alternatif"><span class="glyphicon glyphicon-user"></span> Alternatif</a></li>
									<li><a href="?m=rel_alternatif"><span class="glyphicon glyphicon-signal"></span> Nilai bobot alternatif</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="?m=kriteria" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-th-large"></span> AHP <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="?m=kriteria"><span class="glyphicon glyphicon-th-large"></span> Kriteria</a></li>
									<li><a href="?m=rel_kriteria"><span class="glyphicon glyphicon-th-list"></span> Nilai bobot kriteria</a></li>
									<!-- navigasi crips -->
									<!-- <li><a href="?m=crisp"><span class="glyphicon glyphicon-th-large"></span> Crisp</a></li> -->
								</ul>
							</li>
							<li><a href="?m=hitung"><span class="glyphicon glyphicon-signal"></span> ELECTRE</a></li>
							<li><a href="?m=laporan"><span class="glyphicon glyphicon-calendar"></span> Laporan</a></li>
							<li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
							<li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						<?php endif ?>

						<?php if ($_SESSION['level'] == 'staf') : ?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Alternatif <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="?m=alternatif"><span class="glyphicon glyphicon-user"></span> Alternatif</a></li>
									<li><a href="?m=rel_alternatif"><span class="glyphicon glyphicon-signal"></span> Nilai bobot alternatif</a></li>
								</ul>
							</li>
							<li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
							<li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						<?php endif ?>

						<?php if ($_SESSION['level'] == 'pengawas') : ?>
							<li class="dropdown">
								<a href="?m=kriteria" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-th-large"></span> AHP <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="?m=kriteria"><span class="glyphicon glyphicon-th-large"></span> Kriteria</a></li>
									<li><a href="?m=rel_kriteria"><span class="glyphicon glyphicon-th-list"></span> Nilai bobot kriteria</a></li>
									<!-- navigasi crips -->
									<!-- <li><a href="?m=crisp"><span class="glyphicon glyphicon-th-large"></span> Crisp</a></li> -->
								</ul>
							</li>
							<li><a href="?m=hitung"><span class="glyphicon glyphicon-signal"></span> ELECTRE</a></li>
							<li><a href="?m=laporan"><span class="glyphicon glyphicon-calendar"></span> Laporan</a></li>
							<li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
							<li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						<?php endif ?>
					</ul>
					<div class="navbar-text"></div>
				</div>
				<!--/.nav-collapse -->
			</div>
	</nav>

	<div class="container">
		<?php
		if (file_exists($mod . '.php'))
			include $mod . '.php';
		else
			include 'home.php';
		?>
	</div>
	<footer style="background-color: #395B64; padding: 15px; color:#A5C9CA; position:absolute;left: 0; bottom: 0; right: 0;">
		<div class="container" style="text-align: center;">
			<p>Copyright &copy; Ladyka Febby Olivia_19101152610252</p>
		</div>
	</footer>
	<script type="text/javascript">
		$('.form-control').attr('autocomplete', 'off');
	</script>
</body>

</html>