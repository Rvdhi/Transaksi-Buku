<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Transaksi</title>
</head>
<body>

	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid">
		<h3>Transaksi</h3>
		<table class="table table-bordered" style="padding-left : 20%;">
			<thead>
				<tr style="background-color: grey; color:white">
					<th style="width: 0px; text-align: center">No.</th>
					<th style="width: 150px; text-align: center">Nomor Induk Mahasiswa</th>
					<th style="width: 500px; text-align: center">Nama</th>					
					<th style="width: 50px; text-align: center">Lainnya</th>					
				</tr>
			</thead>
			<tbody>
				<?php
					include "koneksi.php";

					//baca tabel absensi dan relasikan dengan tabel karyawan berdasarkan nomor kartu RFID untuk tanggal hari ini

					//baca tanggal saat ini
					date_default_timezone_set('Asia/Makassar');
					$tanggal = date('Y-m-d');

					//filter absensi berdasarkan tanggal saat ini
					$sql = mysqli_query($konek, "select b.nama, b.nim from transaksi a, mahasiswa b where a.nokartu=b.nokartu");

					$no = 0;
					while($data = mysqli_fetch_array($sql))
					{
						$no++;
				?>
				<tr>
					<td> <?php echo $no; ?> </td>
					<td><center> <?php echo $data['nim']; ?></center> </td>
					<td> <?php echo $data['nama']; ?> </td>	
					<td><center>
						<a href="pinjam.php?id=<?php echo $data['nim']; ?>"> Pinjam</a> | <a href="kembali.php?id=<?php echo $data['nim']; ?>"> Kembali</a>
					</center></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>