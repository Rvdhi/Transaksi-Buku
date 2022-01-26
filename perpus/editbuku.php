<!-- proses penyimpanan -->

<?php 
	include "koneksi.php";

	//baca ID data yang akan di edit
	$id = $_GET['id'];

	//baca data dataanggota berdasarkan id
	$cari = mysqli_query($konek, "select * from buku where isbn='$id'");
	$hasil = mysqli_fetch_array($cari);


	//jika tombol simpan diklik
	if(isset($_POST['btnSimpan']))
	{
		//baca isi inputan form
		$nokartu    = $_POST['nokartu'];
		$isbn       =$_POST['isbn'];
		$judul      = $_POST['judul'];
		$pengarang  = $_POST['pengarang'];
		$tahun      = $_POST['tahun'];

		//simpan ke tabel dataanggota
		$simpan = mysqli_query($konek, "update buku set nokartu='$nokartu', judul='$judul', pengarang='$pengarang', tahun='$tahun' where isbn='$id'");
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
				<label>ISBN</label>
				<input type="text" name="isbn"  name="isbn" id="isbn" placeholder="Masukkan ISBN" class="form-control" style="width: 400px" readonly value="<?php echo $hasil['isbn']; ?>">
			</div>
			<div class="form-group">
				<label>Judul</label>
				<textarea class="form-control" name="judul" id="judul" style="width: 400px"><?php echo $hasil['judul']; ?></textarea>
			</div>
			<div class="form-group">
				<label>Pengarang</label>
				<input type="text" name="pengarang" id="pengarang" class="form-control" style="width: 400px" value="<?php echo $hasil['pengarang']; ?>">
			</div>
			<div class="form-group">
                <label>Tanggal Terbit</label>
                <input type="date" name="tahun" id="tahun" class="form-control" style="width: 400px" value="<?php echo $hasil['tahun']; ?>">
            </div>

			<button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
		</form>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>