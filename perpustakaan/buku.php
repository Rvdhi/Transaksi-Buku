<!DOCTYPE html>
<html>
<head>
	<?php include "header.php"; ?>
	<title>Data Buku</title>
</head>
<body>

	<?php include "menu.php"; ?>

	<!--isi -->
	<div class="container-fluid">
		<h3>Data Buku</h3>
		<table class="table table-bordered">
			<thead>
				<tr style="background-color: grey; color: white;">
					<th style="width: 10px; text-align: center">No.</th>
					<th style="width: 100px; text-align: center">no. Kartu</th>
					<th style="width: 400px; text-align: center">Judul</th>
					<th style="width: 200px; text-align: center">Pengarang</th>
					<th style="width: 70px; text-align: center">Tahun</th>
					<th style="width: 55px; text-align: center">Aksi</th>
				</tr>
			</thead>
			<tbody>

				<?php
					//koneksi ke database
					include "koneksi.php";


					//baca data karyawan
					$sql = mysqli_query($konek, "select * from db_buku");
					$no = 0;
					while($data = mysqli_fetch_array($sql))
					{
						$no++;
				?>

				<tr>
					<td> <?php echo $no; ?> </td>
					<td> <?php echo $data['nokartu_buku']; ?> </td>
					<td> <?php echo $data['judul']; ?> </td>
					<td> <?php echo $data['pengarang']; ?> </td>
					<td style="text-align: center"> <?php echo $data['tahun']; ?> </td>
					<td>
						<a href="edit_buku.php?id=<?php echo $data['id']; ?>"> Edit</a> | <a href="hapusbuku.php?id=<?php echo $data['id']; ?>"> Hapus</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<!-- tombol tambah data karyawan -->
		<a href="tambahbuku.php"> <button class="btn btn-primary">Tambah Data Buku</button> </a>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>