<?php
include_once "../src/koneksi.php";

// Membaca variabel Kode pada URL (alamat browser)
if(isset($_GET['nisn'])){
    $nisn = $_GET['nisn'];

    // Hapus data sesuai Kode yang terbaca
    $sql = mysqli_query($koneksi, "DELETE FROM siswa WHERE nisn='$nisn'");
    if($sql){
        // Refresh halaman ke arah yang benar
        echo "<center> <b> <font color = 'red' size = '4' > <p> Data Berhasil dihapus </p>
              </center> </b> </font> <br>
              <meta http-equiv='refresh' content='2; url=halaman_admin.php?open=data_siswa'>";
    }
    else {
        echo "<center> <b> <font color = 'red' size = '4' > <p> Data Gagal Dihapus! </p>
              </center> </b> </font> <br>
              <meta http-equiv='refresh' content='2; url=halaman_admin.php?open=data_siswa'>";
    }
}
else {
    // Jika tidak ada data Kode ditemukan di URL
    echo "<meta http-equiv='refresh' content='0; url=halaman_admin.php?open=data_siswa'>";
}
?>
