<?php 
	error_reporting(0);
	include "koneksi.php";
	//baca tabel mahasiswa
	$sql = mysqli_query($konek, "select * from mahasiswa");
	$data = mysqli_fetch_array($sql);
	$mode_tansaksi = $data['mode'];

	$mode = "";
	if($mode_transaksi==1)
	$mode = "pinjam";
	else if($mode_transaksi==2)
	$mode = "kembali";
	
	//baca tabel tmprfid
	$baca_kartu = mysqli_query($konek, "select * from tmprfid");
	$data_kartu = mysqli_fetch_array($baca_kartu);
	$nokartu    = $data_kartu['nokartu'];
?>


<div class="container-fluid" style="text-align: center;">
	<?php if($nokartu=="") { ?>

	<h3>Transaksi Perpustakaan</h3>
	<h3>Silahkan Tempelkan Kartu RFID Anda</h3>
	<img src="images/rfid.png" style="width: 200px"> <br>
	<img src="images/animasi2.gif">
	

	<?php } else {
		//cek nomor kartu RFID tersebut apakah terdaftar di tabel mahasiswa
		$cari_mahasiswa = mysqli_query($konek, "select * from mahasiswa where nokartu='$nokartu'");
		$jumlah_data = mysqli_num_rows($cari_mahasiswa);

		if($jumlah_data==0)
			echo "<h1>Maaf! Kartu Tidak Dikenali</h1>";
		else
		{
			//ambil nama mahasiswa
			$data_mahasiswa = mysqli_fetch_array($cari_mahasiswa);
			$nama = $data_mahasiswa['nama'];
			$nim = $data_mahasiswa['nim'];
				

			//tanggal hari ini
			date_default_timezone_set('Asia/Jakarta') ;
			$tanggal = date('Y-m-d');
			
						
			//hitung jumlah datanya
			$jumlah_transaksi = mysqli_num_rows($cari_transaksi);
			if($jumlah_transaksi == 0)
			{
				echo "<h1>Hallo<br><strong>$nama</strong></h1>";
				mysqli_query($konek, "insert into transaksi(nokartu, nim)values('$nokartu', '$nim')");
			}
			else
			{
				//update sesuai pilihan mode absen
				if($jumlah_transaksi == 0)
				{
				 mysqli_query($konek, "update transaksi  where nokartu='$nokartu'");
				}
				
			}
		}

		//kosongkan tabel tmprfid
		mysqli_query($konek, "delete from tmprfid");
	} ?>

</div>