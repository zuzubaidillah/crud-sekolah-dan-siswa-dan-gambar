<?php
include './header.php';
include './menu.php';
// echo "<pre>";
// var_dump($_POST);
?>

<!-- content -->
<div class="container">
  <h1>Tambah Data Sekolah</h1>

  <form method="post" action="sekolah_tambah_proses.php" enctype="multipart/form-data">
  <!-- <form method="post" action="sekolah_tambah.php"> -->
    <div class="form-group">
      <label for="exampleInputEmail1">Nama</label>
      <input name="txt-nama" id="nama" autofocus type="text" class="form-control" placeholder="isikan nama">
      <small id="emailHelp" class="form-text text-muted">Isikan nama</small>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Telpon</label>
      <input name="txt-telpon" id="telpon" type="number" class="form-control" placeholder="isikan telpon">
      <small id="emailHelp" class="form-text text-muted">Isikan Telpon</small>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Alamat</label>
      <textarea class="form-control" name="txt-alamat" id="alamat" cols="30" rows="10" placeholder="isikan alamat"></textarea>
      <small id="emailHelp" class="form-text text-muted">Isikan Alamat</small>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Gambar Sekolah</label>
      <input class="form-control" name="txt-gambar" id="gambar" type="file"/>
      <small id="emailHelp" class="form-text text-muted">Isikan gmabar</small>
    </div>
    <button type="submit" class="btn btn-primary" onclick="click_simpan()">Simpan</button>
  </form>
</div>

<script>
  function click_simpan(){
    var nama = document.getElementById('nama').value;
    console.log(nama);
  }
</script>
<?php
include './footer.php';
?>