<!-- proses penyimpanan -->

<?php 
	include "koneksi.php";

	//baca ID data yang akan di edit
	$id = $_GET['id'];

	//baca data dataanggota berdasarkan id
	$cari = mysqli_query($konek, "select * from db_buku where id='$id'");
	$hasil = mysqli_fetch_array($cari);


	//jika tombol simpan diklik
	if(isset($_POST['btnSimpan']))
	{
		//baca isi inputan form
		$nokartu_buku = $_POST['nokartu_buku'];
		$judul    = $_POST['judul'];
		$pengarang  = $_POST['pengarang'];
		$tahun  = $_POST['tahun'];

		//simpan ke tabel dataanggota
		$simpan = mysqli_query($konek, "update db_buku set nokartu_buku='$nokartu_buku', judul='$judul', pengarang='$pengarang', tahun='$tahun' where id='$id'");
		//jika berhasil tersimpan, tampilkan pesan Tersimpan,
		//kembali ke data dataanggota
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
?>

<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Tambah Data Anggota</title>
</head>
<body>

	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid">
		<h3>Tambah Data Buku</h3>

		<!-- form input -->
		<form method="POST">
			<div class="form-group">
				<label>No.Kartu</label>
				<input type="text" name="nokartu_buku" id="nokartu_buku" placeholder="No. Katu RFID" class="form-control" style="width: 200px" value="<?php echo $hasil['nokartu_buku']; ?>" /> 
			</div>
			<div class="form-group">
				<label>Judul</label>
				<textarea class="form-control" name="judul" id="judul" placeholder="Judul" style="width: 400px"><?php echo $hasil['judul']; ?></textarea>
			</div>
			<div class="form-group">
				<label>Pengarang</label>
				<input type="text" name="pengarang" id="pengarang" placeholder="Pengarang" class="form-control" style="width: 400px" value="<?php echo $hasil['pengarang']; ?>">
			</div>
			<div class="form-group">
				<label>Tahun</label>
				<input type="text" name="tahun" id="tahun" placeholder="Tahun" class="form-control" style="width: 400px" value="<?php echo $hasil['tahun']; ?>">
				
			</div>

			<button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
		</form>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>