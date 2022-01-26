<!-- proses penyimpanan -->

<?php 
    include "koneksi.php";

    //jika tombol simpan diklik
    if(isset($_POST['btnSimpan']))
    {
        //baca isi inputan form    
        $isbn      = $_POST['isbn'];
        $nokartu   = $_POST['nokartu'];
        $judul     = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $tahun     = $_POST['tahun'];
        
        //
        $simpan = mysqli_query($konek, "insert into buku (isbn, nokartu, judul, pengarang, tahun)values('$isbn', '$nokartu', '$judul', '$pengarang', '$tahun')");
            
            //jika berhasil tersimpan, tampilkan pesan Tersimpan,
            //kembali ke data buku
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
                        location.replace('tambahbuku.php');
                    </script>
                ";
            }
            
     }

    //kosongkan tabel tmprfid
    mysqli_query($konek, "delete from tmprfid");
?>
<!DOCTYPE html>
<html>
<head>
    <?php include "header.php"; ?>
    <title>Tambah Data Buku</title>

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
                <label>Nomor ISBN</label>
                <input type="numeric" name="isbn" id="isbn" placeholder="Masukkan ISBN" class="form-control" style="width: 400px">
            </div>       
            <div class="form-group">
                <label>Judul Buku</label>
                <textarea type="text" name="judul" id="judul"  class="form-control" style="width: 400px"></textarea>
            </div>
            <div class="form-group">
                <label>Pengarang</label>
                <input type="text" name="pengarang" id="pengarang"  class="form-control" style="width: 400px">
            </div>
            <div class="form-group">
                <label>Tanggal Terbit</label>
                <input type="date" name="tahun" id="tahun" class="form-control" style="width: 400px">
            </div>

            <button class="btn btn-primary" name="btnSimpan" id="btnSimpan">Simpan</button>
        </form>
    </div>

    <?php include "footer.php"; ?>

</body>
</html>