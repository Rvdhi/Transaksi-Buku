<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Riwayat</title>
</head>
<body>

	<?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid">
		<h3>RIWAYAT</h3>
		<table class="table table-bordered">
			<thead>
				<tr style="background-color: grey; color:white">
					<th style="width: 10px; text-align: center">No.</th>
					<th style="text-align: center">ISBN</th>
					<th style="text-align: center">Judul</th>
					<th style="text-align: center">Peminjaman</th>
					<th style="text-align: center">Pengembalian</th>
					<th style="text-align: center">Lainnya
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
					$sql = mysqli_query($konek, "select b.judul, b.isbn, a.tanggal_pinjam, c.tanggal_kembali from transaksi a, buku b where a.nokartu=b.nokartu");
					$no = 0;
					while($data = mysqli_fetch_array($sql))
					{
						$no++;
				?>
				<tr>
					<td> <?php echo $no; ?> </td>
					<td> <?php echo $data['isbn']; ?> </td>
					<td> <?php echo $data['judul']; ?> </td>
					<td><center><?php echo $data['tanggal_pinjam']; ?></center> </td>
					<td><center><?php echo $data['tanggal_kembali']; ?></center> </td>	
						
					<td><center><a href="hapustransaksi.php?id=<?php echo $data['id']; ?>"> Hapus</a></center></td>						
					
					
				</tr>
				
				<?php } ?>
			</tbody>

		</table>
		<a href="transaksi.php"> <button class="btn btn-primary">Selesai</button></a>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>