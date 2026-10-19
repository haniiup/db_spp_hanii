<?php
include_once "../src/koneksi.php";

# SKRIP TOMBOL SIMPAN DIKLIK
if(isset($_POST['btnSimpan'])){
    $nisn     = $_POST['nisn'];
    $nis      = $_POST['nis'];
    $nama     = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat   = $_POST['alamat'];
    $no_telp  = $_POST['no_telp'];
    $id_spp   = $_POST['id_spp'];

    // Validasi Form Inputs
    $pesanError = array();
    if (trim($nisn)=="") {
        $pesanError[] = "Data <b>NISN</b> tidak boleh kosong !";
    }
    if (trim($nis)=="") {
        $pesanError[] = "Data <b>NIS</b> tidak boleh kosong !";
    }
    if (trim($nama)=="") {
        $pesanError[] = "Data <b>NAMA</b> tidak boleh kosong !";
    }
    if (trim($id_kelas)=="") {
        $pesanError[] = "Data <b>ID KELAS</b> tidak boleh kosong !";
    }
    if (trim($alamat)=="") {
        $pesanError[] = "Data <b>ALAMAT</b> tidak boleh kosong !";
    }
    if (trim($no_telp)=="") {
        $pesanError[] = "Data <b>NOMOR TELEPON</b> tidak boleh kosong !";
    }
    if (trim($id_spp)=="") {
        $pesanError[] = "Data <b>ID SPP</b> tidak boleh kosong !";
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
        $sqlEdit = mysqli_query($koneksi, "UPDATE siswa SET nis='$nis', nama='$nama', 
                   id_kelas='$id_kelas', alamat='$alamat', no_telp='$no_telp', id_spp='$id_spp' WHERE nisn='$nisn'");
        if($sqlEdit){
            echo "<center> <b> <font color = 'red' size = '4' > <p> Data Berhasil diubah </p>
                  </center> </b> </font> <br>
                  <meta http-equiv='refresh' content='2; url=halaman_admin.php?open=data_siswa'>";
        }
        else{
            echo "<center> <b> <font color = 'red' size = '4' > <p> Data Gagal Disimpan! </p>
                  </center> </b> </font> <br>
                  <meta http-equiv='refresh' content='2; url=halaman_admin.php?open=data_siswa'>";
        }
        exit;
    }
}

# MEMBACA DATA DARI DATABASE UNTUK DIEDIT
if(isset($_GET['nisn'])){
    $nisn  = $_GET['nisn'];
    $sql   = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn = '$nisn'");
    $data  = mysqli_fetch_array($sql);
}
?>

<form action="halaman_admin.php?open=edit_siswa&nisn=<?php echo isset($data['nisn']) ? $data['nisn'] : ''; ?>" method="post" >
<table cellspacing="1" cellpadding="3">
    <tr>
        <td bgcolor="#CCCCCC" colspan="3"><strong>EDIT DATA SISWA</strong></td>
    </tr>
    <tr>
        <td>NISN</td>
        <td>:</td>
        <td><input name="nisn" type="text" size="10" maxlength="10" value="<?php echo isset($data['nisn']) ? $data['nisn'] : ''; ?>" readonly="true" /></td>
    </tr>
    <tr>
        <td>NIS</td>
        <td>:</td>
        <td><input name="nis" type="text" size="20" maxlength="10" value="<?php echo isset($data['nis']) ? $data['nis'] : ''; ?>" /></td>
    </tr>
    <tr>
        <td>NAMA</td>
        <td>:</td>
        <td><input name="nama" type="text" size="50" maxlength="50" value="<?php echo isset($data['nama']) ? $data['nama'] : ''; ?>" /></td>
    </tr>
    <tr>
        <td>KELAS</td>
        <td>:</td>
        <td>
            <select name="id_kelas">
                <option value="Kosong">.....</option>
                <?php
                $tampilkankelas = mysqli_query($koneksi, "SELECT * FROM kelas");
                while ($bacaData = mysqli_fetch_array($tampilkankelas)){
                    if(isset($data['id_kelas']) && $bacaData['id_kelas'] == $data['id_kelas']){
                        $cek = "selected";
                    } else {
                        $cek = "";
                    }
                    echo "<option value='".$bacaData['id_kelas']."' $cek>".$bacaData['nama_kelas']."</option>";
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><input name="alamat" type="text" size="50" maxlength="50" value="<?php echo isset($data['alamat']) ? $data['alamat'] : ''; ?>" /></td>
    </tr>
    <tr>
        <td>No. Telepon</td>
        <td>:</td>
        <td><input name="no_telp" type="text" size="50" maxlength="50" value="<?php echo isset($data['no_telp']) ? $data['no_telp'] : ''; ?>" /></td>
    </tr>
    <tr>
        <td>Nominal SPP</td>
        <td>:</td>
        <td>
            <select name="id_spp">
                <option value="Kosong">.....</option>
                <?php
                $tampilkanSPP = mysqli_query($koneksi, "SELECT * FROM spp");
                while ($bacaData = mysqli_fetch_array($tampilkanSPP)){
                    if(isset($data['id_spp']) && $bacaData['id_spp'] == $data['id_spp']){
                        $cek = "selected";
                    } else {
                        $cek = "";
                    }
                    echo "<option value='".$bacaData['id_spp']."' $cek>".$bacaData['nominal']."</option>";
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input name="btnSimpan" type="submit" value="Simpan" /></td>
    </tr>
</table>
</form>
