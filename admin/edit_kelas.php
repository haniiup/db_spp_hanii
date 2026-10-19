<?php
include_once "../src/koneksi.php";

# SKRIP TOMBOL SIMPAN DIKLIK
if(isset($_POST['btnSimpan'])){
    $id_kelas            = $_POST['id_kelas'];
    $nama_kelas          = $_POST['nama_kelas'];
    $kompetensi_keahlian = $_POST['kompetensi_keahlian'];

    // Validasi Form Inputs
    $pesanError = array();
    if (trim($id_kelas)=="") {
        $pesanError[] = "Data <b>ID KELAS</b> tidak boleh kosong !";
    }
    if (trim($nama_kelas)=="") {
        $pesanError[] = "Data <b>nama kelas</b> tidak boleh kosong !";
    }
    if (trim($kompetensi_keahlian)=="") {
        $pesanError[] = "Data <b>kompetensi keahlian</b> tidak boleh kosong !";
    }

    // Menampilkan Pesan Error dari Form
    if (count($pesanError)>=1 ){
        $noPesan=0;
        foreach ($pesanError as $indeks=>$pesan_tampil) {
            $noPesan++;
            echo "&nbsp; $noPesan. $pesan_tampil<br>";
        }
        echo "<br>";
    }
    else {
        // Skrip Simpan data ke Database
        $sqlEdit = mysqli_query($koneksi, "UPDATE kelas SET nama_kelas='$nama_kelas', 
                   kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas = '$id_kelas'");
        if($sqlEdit){
            echo "<center> <b> <font color = 'red' size = '4' > <p> Data Berhasil diubah </p>
                  </center> </b> </font> <br>
                  <meta http-equiv='refresh' content='2; url=halaman_admin.php?open=data_kelas'>";
        }
        else{
            echo "<center> <b> <font color = 'red' size = '4' > <p> Data Gagal Diubah! </p>
                  </center> </b> </font> <br>
                  <meta http-equiv='refresh' content='2; url=halaman_admin.php?open=data_kelas'>";
        }
        exit;
    }
}

# MEMBACA DATA DARI DATABASE UNTUK DIEDIT
if(isset($_GET['id_kelas'])){
    $id_kelas = $_GET['id_kelas'];
    $sql      = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'");
    $data     = mysqli_fetch_array($sql);
}
?>

<form action="halaman_admin.php?open=edit_kelas&id_kelas=<?php echo isset($data['id_kelas']) ? $data['id_kelas'] : ''; ?>" method="post" name="form1" target="_self" >
<table class="table-list" width="650" border="0" cellspacing="1" cellpadding="3">
    <tr>
        <td bgcolor="#CCCCCC" colspan="3"><strong>UBAH DATA KELAS</strong></td>
    </tr>
    <tr>
        <td width="182"><strong>ID KELAS</strong></td>
        <td>:</td>
        <td width="440"><input name="id_kelas" type="text" value="<?php echo isset($data['id_kelas']) ? $data['id_kelas'] : ''; ?>" readonly = "true" /></td>
    </tr>
    <tr>
        <td><strong>Nama Kelas</strong></td>
        <td>:</td>
        <td><input name="nama_kelas" type="text" value="<?php echo isset($data['nama_kelas']) ? $data['nama_kelas'] : ''; ?>" size="60" maxlength="100" /></td>
    </tr>
    <tr>
        <td><strong>Kompetensi Keahlian</strong></td>
        <td>:</td>
        <td><input name="kompetensi_keahlian" type="text" value="<?php echo isset($data['kompetensi_keahlian']) ? $data['kompetensi_keahlian'] : ''; ?>" size="60" maxlength="100" /></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input name="btnSimpan" type="submit" id="btnSimpan" value="Simpan" /></td>
    </tr>
</table>
</form>
