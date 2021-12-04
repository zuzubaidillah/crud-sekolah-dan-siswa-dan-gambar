<?php
include './koneksi.php';
include './header.php';
include './menu.php';
// echo "<pre>";
// var_dump($_POST);
?>

<!-- content -->
<div class="container">
  <h1>Tambah Data Siswa</h1>

  <form method="post" action="siswa_tambah_proses.php" enctype="multipart/form-data">
  <!-- <form method="post" action="siswa_tambah.php"> -->
    <div class="form-group">
      <label for="exampleInputEmail1">Nama</label>
      <input name="txt-nama" id="nama" autofocus type="text" class="form-control" placeholder="isikan nama">
      <small id="emailHelp" class="form-text text-muted">Isikan nama</small>
    </div>

    <div class="form-group nis">
      <label for="exampleInputEmail1">NIS</label>
      <input autocomplete="off" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" minlength="8" name="txt-nis" id="nis" onkeyup="cek_nis('tambah')" type="text" class="form-control" placeholder="pastikan NIS tidak ada yang sama">
      <small id="nis" class="form-text text-muted">Isikan NIS</small>
      
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Tanggal Lahir</label>
      <input name="txt-tgl_lahir" id="tgl" type="date" class="form-control">
      <small id="tgl" class="form-text text-muted">Masukan Tanggal Lahir</small>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Pilih Sekolah</label>
      <select class="form-control" name="txt-sekolah_id" id="id_sekolah">
        <?php
        $sql = "SELECT * FROM sekolah order by nama ASC";
        // pengiriman data ke mysql
        $query = mysqli_query($conn, $sql);
        $jml = mysqli_num_rows($query);
        if ($jml==0) {
          echo "<option value=\"\">--Lakukan Penambahan Sekolah--</option>";
        }else{
          echo "<option value=\"\">--Pilih Sekolah--</option>";
          while($data = mysqli_fetch_assoc($query)){
            $id = $data['id'];
            $nama = $data['nama'];
            echo "<option value=\"$id\">$nama</option>";
          }
        }
        ?>
      </select>
      <small id="id_sekolah" class="form-text text-muted">Isikan Alamat</small>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>
<?php
include './footer.php';
?>