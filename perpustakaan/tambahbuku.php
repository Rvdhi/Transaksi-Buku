<!-- proses penyimpanan -->

<?php 
	include "koneksi.php";

	//jika tombol simpan diklik
	if(isset($_POST['btnSimpan']))
	{
		//baca isi inputan form
		$nokartu_buku = $_POST['nokartu_buku'];
		$judul    = $_POST['judul'];
		$pengarang  = $_POST['pengarang'];
		$penerbit  = $_POST['penerbit'];
		$tanggal  = $_POST['tanggal'];

		//simpan ke tabel karyawan
		$simpan = mysqli_query($konek, "insert into db_buku (nokartu_buku, judul, pengarang, tahun)values('$nokartu_buku', '$judul', '$pengarang' '$tahun')");

		//jika berhasil tersimpan, tampilkan pesan Tersimpan,
		//kembali ke data karyawan
		if($simpan)
		{
			echo "
				<script>
					alert('Tersimpan');
					location.replace('buku.php');
				</script>
			";
		}
		else
		{
			echo "
				<script>
					alert('Gagal Tersimpan');
					location.replace('buku.php');
				</script>
			";
		}

	}

	//kosongkan tabel tmprfid
	mysqli_query($konek, "delete from tmprfid");
?>

<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Tambah Data Buku</title>

	<!-- pembacaan no kartu otomatis -->
	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				$("#norfid").load('nokartu.php')
			}, 0);  //pembacaan file nokartu.php, tiap 1 detik = 1000
		});
	</script>

</head>
<body>

	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid">
		<h3>Tambah Data Buku</h3>

		<!-- form input -->
		<form method="POST">
			<div id="norfid"></div>

			<div class="form-group">
				<label>Judul Buku</label>
				<textarea class="form-control" name="Judul" id="Judul" placeholder="Judul" style="width: 400px"></textarea>
			</div>
			<div class="form-group">
				<label>Pengarang</label>
				<input type="text" name="" id="pengarang" placeholder="Pengarang" class="form-control" style="width: 400px">
			</div>
			<div class="form-group">
				<label>Penerbit</label>
				<input type="text" name="penerbit" id="penerbit" placeholder="Penerbit" class="form-control" style="width: 400px">
			</div>
			<div class="form-group">
				<label>Tanggal Terbit</label>
				<input type="text" name="tanggal" id="tanggal" placeholder="Tanggal" class="form-control" style="width: 400px">
			</div>

			<button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
		</form>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>