<?php
	include "koneksi.php";

	//baca id data yang akan dihapus
	$id = $_GET['id'];

	//hapus data
	$hapus = mysqli_query($konek, "delete from db_buku where id='$id'");

	//jika berhasil terhapus tampilkan pesan Terhapus
	//kemudian kembali ke data karyawan
	if($hapus)
	{
		echo "
			<script>
				alert('Terhapus');
				location.replace('buku.php');
			</script>
		";
	}
	else
	{
		echo "
			<script>
				alert('Gagal Terhapus');
				location.replace('buku.php');
			</script>
		";
	}

?>