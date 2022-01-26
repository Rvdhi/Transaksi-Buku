<!-- proses penyimpanan -->

<?php 
	include "koneksi.php";

	//baca ID data yang akan di edit
	$id = $_GET['id'];

	//baca data mahasiswa berdasarkan id
	$cari = mysqli_query($konek, "select * from mahasiswa where nim='$id'");
	$hasil = mysqli_fetch_array($cari);


	//jika tombol simpan diklik
	if(isset($_POST['btnSimpan']))
	{
		//baca isi inputan form
		$nim	 = $_POST['nim'];
		$nokartu = $_POST['nokartu'];
		$nama    = $_POST['nama'];
		$alamat  = $_POST['alamat'];

		//simpan ke tabel mahasiswa
		$simpan = mysqli_query($konek, "update mahasiswa set nokartu='$nokartu', nim='$nim',nama='$nama', alamat='$alamat' where nim='$id'");
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
					location.replace('edit.php');
				</script>
			";
		}

	}

	
	mysqli_query($konek, "delete from tmprfid");

?>

<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Update Data Mahasiswa</title>
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
		<h3>Mahasiswa</h3>

		<!-- form input -->
		<form method="POST">
			<div id="norfid"></div>
		
			<div class="form-group">
				<label>Nomor Induk Mahasiswa</label>
				<input type="text" name="nim" id="nim" placeholder="Masukkan NIM" class="form-control" style="width: 400px" readonly value="<?php echo $hasil['nim']; ?>">
			</div>
			<div class="form-group">
				<label>Nama Mahasiswa</label>
				<input type="text" name="nama" id="nama" placeholder="Nama Mahasiswa" class="form-control" style="width: 400px" value="<?php echo $hasil['nama']; ?>">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" style="width: 400px"><?php echo $hasil['alamat']; ?></textarea>
			</div>

			<button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
		</form>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>