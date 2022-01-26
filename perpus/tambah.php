<!-- proses penyimpanan -->

<?php 
	include "koneksi.php";

	//jika tombol simpan diklik
	if(isset($_POST['btnSimpan']))
	{
		//baca isi inputan form
		$nim	 = $_POST['nim'];
		$nokartu = $_POST['nokartu'];		
		$nama    = $_POST['nama'];
		$alamat  = $_POST['alamat'];

		//simpan ke tabel mahasiswa
		$simpan = mysqli_query($konek, "insert into mahasiswa(nim, nokartu, nama, alamat)values('$nim', '$nokartu', '$nama', '$alamat')");

		//jika berhasil tersimpan, tampilkan pesan Tersimpan,
		//kembali ke data mahasiswa
		if($simpan)
		{
			echo "
				<script>
					alert('Tersimpan');
					location.replace('mahasiswa.php');
				</script>
			";
		}
		else
		{
			echo "
				<script>
					alert('Gagal Tersimpan');
					location.replace('tambah.php');
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
	<title>Tambah Mahasiswa</title>

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
		<h3>Tambah Data Mahasiswa</h3>

		<!-- form input -->
		<form method="POST">
			<div id="norfid"></div>

			<div class="form-group">
				<label>Nomer Induk Mahasiswa</label>
				<input type="text" name="nim" id="nim" placeholder="Masukkan NIM" class="form-control" style="width: 400px">
			</div>
			<div class="form-group">
				<label>Nama Mahasiswa</label>
				<input type="text" name="nama" id="nama"  class="form-control" style="width: 400px">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="alamat" id="alamat"  style="width: 400px"></textarea>
			</div>

			<button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
		</form>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>