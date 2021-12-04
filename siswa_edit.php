<?php
include './koneksi.php';
include './header.php';
include './menu.php';
// echo "<pre>";
// var_dump($_GET['id-siswa']);
// var_dump($_REQUEST['id-siswa']);
// die();

// cek apakah get id ada?
if (isset($_GET['id-siswa'])) {

  $id = $_GET['id-siswa'];
  // echo "<pre>";
  // var_dump($id);die();
  // cek di bagian tabel siswa

  $sql = "SELECT * FROM siswa WHERE id='$id'";
  $query_siswa = mysqli_query($conn, $sql);
  $jml = mysqli_num_rows($query_siswa);
  
  if ($jml===0) {
    echo "<script>
        alert('error id tidak sama di tabel siswa');
        document.location = 'siswa.php?keterangan=error';
      </script>";
      exit();
  }else{
    $data_siswa = mysqli_fetch_assoc($query_siswa);
    // echo "<pre>";
    // var_dump($data_siswa);die();

    $id = $data_siswa['id'];
    $nama = $data_siswa['nama'];
    $tgl_lahir = $data_siswa['tgl_lahir'];
    $sekolah_id = $data_siswa['sekolah_id'];
    $nis = $data_siswa['nis'];

  }
}else{

  echo "<script>
        alert('error id tidak ditemukan');
        document.location = 'siswa.php?keterangan=error';
    </script>";
    exit();
}
?>

<!-- content -->
<div class="container">
  <h1>Edit Data siswa</h1>

  <form method="post" action="siswa_edit_proses.php">
  <!-- <form method="post" action="siswa_tambah.php"> -->
    <div class="form-group">
      <label for="exampleInputEmail1">Nama</label>
      <input value="<?=$nama;?>" name="txt-nama" id="nama" autofocus type="text" class="form-control" placeholder="isikan nama">
      <small id="emailHelp" class="form-text text-muted">Isikan nama</small>
    </div>

    <div class="form-group nis">
      <label for="exampleInputEmail1">NIS</label>
      <input value="<?=$nis;?>"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" minlength="8" name="txt-nis" id="nis" onkeyup="cek_nis('edit','<?=$_GET['id-siswa'];?>')" type="text" class="form-control" placeholder="pastikan NIS tidak ada yang sama">
      <small id="nis" class="form-text text-muted">Isikan NIS</small>
      
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Tanggal Lahir</label>
      <input value="<?=$tgl_lahir;?>" name="txt-tgl_lahir" id="tgl" type="date" class="form-control">
      <small id="tgl" class="form-text text-muted">Masukan Tanggal Lahir</small>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Pilih siswa</label>
      <select class="form-control" name="txt-siswa_id" id="id_siswa">
        <?php
        $sql = "SELECT * FROM siswa order by nama ASC";
        // pengiriman data ke mysql
        $query = mysqli_query($conn, $sql);
        $jml = mysqli_num_rows($query);
        if ($jml==0) {
          echo "<option value=\"\">--Lakukan Penambahan siswa--</option>";
        }else{
          echo "<option value=\"\">--Pilih siswa--</option>";
          while($data = mysqli_fetch_assoc($query)){
            $id = $data['id'];
            $nama = $data['nama'];
            echo "<option value=\"$id\">$nama</option>";
          }
        }
        ?>
      </select>
      <small id="id_siswa" class="form-text text-muted">Isikan Alamat</small>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>

<?php
include './footer.php';
?>