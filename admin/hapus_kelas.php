<?php
include_once "../src/koneksi.php";

// Memeriksa variabel id_kelas pada URL (alamat browser)
if(isset($_GET['id_kelas'])){
    $id_kelas = $_GET['id_kelas'];

    // Hapus data sesuai Kode yang terbaca
    $sql = mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas='$id_kelas'");
    if($sql){
        // Refresh halaman ke tempat yang benar
        echo "<center> <b> <font color = 'red' size = '4' > <p> Data Berhasil dihapus </p>
              </center> </b> </font> <br>
              <meta http-equiv='refresh' content='2; url=halaman_admin.php?open=data_kelas'>";
    }
    else {
        echo "<center> <b> <font color = 'red' size = '4' > <p> Data Gagal Dihapus! </p>
              </center> </b> </font> <br>
              <meta http-equiv='refresh' content='2; url=halaman_admin.php?open=data_kelas'>";
    }
}
else {
    // Jika tidak ada data Kode ditemukan di URL
    echo "<meta http-equiv='refresh' content='0; url=halaman_admin.php?open=data_kelas'>";
}
?>
