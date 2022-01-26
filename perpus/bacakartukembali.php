<?php 
	error_reporting(0);
	include "koneksi.php";
	//baca tabel 
	$sql = mysqli_query($konek, "select * from buku");
	$data = mysqli_fetch_array($sql);
	


	//baca tabel tmprfid
	$baca_kartu = mysqli_query($konek, "select * from tmprfid");
	$data_kartu = mysqli_fetch_array($baca_kartu);
	$nokartu    = $data_kartu['nokartu'];
?>


<div class="container-fluid" style="text-align: center;">
	<?php if($nokartu=="") { ?>

	<h3><strong>PROSES!</strong> </h3>
	<h4>Silahkan Tempelkan Kartu RFID Anda</h4>
	<img src="images/rfid.png" style="width: 200px"> <br>
	<img src="images/animasi2.gif">
	

	<?php } else {
		//cek nomor kartu RFID tersebut apakah terdaftar di tabel mahasiswa
		$cari_buku = mysqli_query($konek, "select * from buku where nokartu='$nokartu'");
		$jumlah_data = mysqli_num_rows($cari_buku);

		if($jumlah_data==0)
			echo "<h1>Maaf! Kartu Tidak Dikenali</h1>";
		else
		{
			//ambil nama mahasiswa
			$data_buku = mysqli_fetch_array($cari_buku);
			$judul = $data_buku['judul'];
				echo "";

			//tanggal dan jam hari ini
			date_default_timezone_set('Asia/Jakarta') ;
			$tanggal = date('Y-m-d');
			


			//cek di tabel transaksi, apakah nomor kartu tersebut sudah ada sesuai tanggal saat ini. Apabila belum ada, maka dianggap absen masuk, tapi kalau sudah ada, maka update data sesuai mode absensi
			
			
			//hitung jumlah datanya
			$jumlah_data = mysqli_num_rows($cari_buku);
			if($jumlah_pinjam == 0)
			{
				echo "<h1>MENGEMBALIKAN<br><strong>$judul</strong></h1>";
				mysqli_query($konek, "insert into kembali(nokartu, isbn, tanggal_kembali)values('$nokartu', '$isbn', '$tanggal')");
					
			}
		}

		//kosongkan tabel tmprfid
		mysqli_query($konek, "delete from tmprfid");
	} ?>

</div>