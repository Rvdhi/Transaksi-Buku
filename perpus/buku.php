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
					<th style="width: 1px; text-align: center">No.</th>
					<th style="width: 150px; text-align: center">ISBN</th>
					<th style="text-align: center">Judul</th>
					<th style="width: 350px; text-align: center">Pengarang</th>
					<th style="width: 100px; text-align: center">Tahun</th>
					<th style="width: 100px; text-align: center">Aksi</th>
				</tr>
			</thead>
			<tbody>

				<?php
					//koneksi ke database
					include "koneksi.php";


					//baca data buku
					$sql = mysqli_query($konek, "select * from buku");
					$no = 0;
					while($data = mysqli_fetch_array($sql))
					{
						$no++;
				?>

				<tr>
					<td> <?php echo $no; ?> </td>
					<td> <?php echo $data['isbn']; ?> </td>
					<td> <?php echo $data['judul']; ?> </td>
					<td> <?php echo $data['pengarang']; ?> </td>
					<td style="text-align: center"> <?php echo $data['tahun']; ?> </td>
					<td>
						<a href="editbuku.php?id=<?php echo $data['isbn']; ?>"> Edit</a> | <a href="hapusbuku.php?id=<?php echo $data['isbn']; ?>"> Hapus</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<!-- tombol tambah data buku -->
		<a href="tambahbuku.php"> <button class="btn btn-primary">Tambah Buku</button> </a>
	</div>

	<?php include "footer.php"; ?>

</body>
</html>