<?php
	error_reporting(0);
	include "koneksi.php";
	//baca isi tabel tmprfid
	$sql = mysqli_query($konek, "select * from tmprfid");
	$data = mysqli_fetch_array($sql);
	//baca nokartu
	$nokartu = $data['nokartu'];
?>

<div class="form-group">
	<label>Nomor Kartu</label>
	<input type="text" name="nokartu" id="nokartu" placeholder="Tempekan Kartu RFID" class="form-control" style="width: 200px" value="<?php echo $nokartu; ?>">
</div>