<?php
session_start();
if (empty($_SESSION['username']) AND empty($_SESSION['level'])) {
    echo "<center>Untuk mengakses halaman, Anda harus login <br>";
    echo "<a href=../index.php><b>LOGIN</b></a></center>";
} else { 
include "../../lib/config_web.php";
include "../../lib/koneksi.php";
include "../../lib/pagination.php";
//
// untuk mengetahui halaman keberapa yang sedang dibuka
// juga untuk men-set nilai default ke halaman 1 jika tidak ada
// data $_GET['page'] yang dikirimkan
$page = 1;
if (isset($_GET['page']) && !empty($_GET['page']))
	$page = (int)$_GET['page'];

// untuk mengetahui berapa banyak data yang akan ditampilkan
// juga untuk men-set nilai default menjadi 5 jika tidak ada
// data $_GET['perPage'] yang dikirimkan
$dataPerPage = 5;
if (isset($_GET['perPage']) && !empty($_GET['perPage']))
	$dataPerPage = (int)$_GET['perPage'];

// tabel yang akan diambil datanya
$table = 'pasien';

// ambil data
$dataTable = getTableData($koneksi, $table, $page, $dataPerPage);

include "../templates/header.php";
?>

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3><small>Master Laporan</small></h3>
			</div>

			
		</div>

		<div class="clearfix"></div>

		<div class="row">

			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><small>Data Laporan</small></h2>

						<div class="clearfix"></div>
					</div>
						<table>
							<tr>
							<div class="d-grid gap-2">
						<a href="<?php echo $admin_url; ?>transaksi/main.php?>">
						<button class="btn btn-primary">
							Transaksi
						</button></a>

						<a href="<?php echo $admin_url; ?>pembelian/main.php?>">
						<button class="btn btn-primary">
							Pembelian
						</button></a>

						<a href="<?php echo $admin_url; ?>pasien/main.php?>">
						<button class="btn btn-primary">
							Pasien
						</button></a>

						<a href="<?php echo $admin_url; ?>barang/main.php?>">
						<button class="btn btn-primary">
							Barang
						</button></a>

						<a href="<?php echo $admin_url; ?>resep/main.php?>">
						<button class="btn btn-primary">
							Resep
						</button></a>

						<a href="<?php echo $admin_url; ?>supplier/main.php?>">
						<button class="btn btn-primary">
							Supplier
						</button></a>
						</tr>
						<tr>
						</table>
				</div>
			</div>
			<!--<div class="col-xs-12">
				<a href="<?php echo $admin_url; ?>pasien/index.php?id_pasien=<?php echo $data['id_pasien'];?>">
				<button class="btn btn-primary">
					<i class="fa fa-print"></i> Print
				</button></a>
				<ul class="pagination pull-right">
	<?php showPagination($koneksi, $table, $dataPerPage); ?>
</ul>
			</div>
			</div>-->
			<div class="clearfix"></div>

		</div>
	</div>
</div>
<!-- /page content -->
<?php
include "../templates/footer.php";
}
?>