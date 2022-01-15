<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Transaksi Buku</title>
</head>
<body><?php include "menu.php"; ?>

	<!-- isi -->
	<div class="container-fluid">
		<h3>Tansaksi Buku</h3>
		<table class="table table-bordered">
			<thead>
				<tr style="background-color: grey; color:white">
					<th style="width: 10px; text-align: center">No.</th>
					<th style="text-align: center">Nama Anggota</th>
					<th style="text-align: center">Judul Buku</th>
					<th style="text-align: center">Peminjaman</th>
					<th style="text-align: center">Pengembalian</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include "koneksi.php";

					//baca tabel tanskasi, relasikan dengan tabel anggota dan buku berdasarkan nomor kartu RFID untuk tanggal hari ini

					//baca tanggal saat ini
					date_default_timezone_set('Asia/Jakarta');
					$tanggal = date('Y-m-d');


					//filter transaksi berdasarkan tanggal saat ini
					$sql = mysqli_query($konek, "select b.nama, a.judul, a.peminjaman, a.pengembalian from absensi a, tansaksi b where a.nokartu=b.nokartu and a.tanggal='$tanggal'");

					$no = 0;
					while($data = mysqli_fetch_array($sql))
					{
						$no++;
				?>
				<tr>
					<td> <?php echo $no; ?> </td>
					<td> <?php echo $data['nama']; ?> </td>
					<td> <?php echo $data['judul']; ?> </td>
					<td> <?php echo $data['peminjaman']; ?> </td>
					<td> <?php echo $data['pengembalian']; ?> </td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>
