<?php
include './koneksi.php';
include './header.php';
include './menu.php';
// echo "<pre>";
// var_dump($_GET['id-sekolah']);
// var_dump($_REQUEST['id-sekolah']);
// die();

// cek apakah get id ada?
if (isset($_GET['id-sekolah'])) {

  $id = $_GET['id-sekolah'];
  // echo "<pre>";
  // var_dump($id);die();
  // cek di bagian tabel sekolah

  $sql = "SELECT * FROM sekolah WHERE id='$id'";
  $query_sekolah = mysqli_query($conn, $sql);
  $jml = mysqli_num_rows($query_sekolah);
  
  if ($jml===0) {
    echo "<script>
        alert('error id tidak sama di tabel sekolah');
        document.location = 'sekolah.php?keterangan=error';
      </script>";
      exit();
  }else{
    $data_sekolah = mysqli_fetch_assoc($query_sekolah);
    // echo "<pre>";
    // var_dump($data_sekolah);die();
    // array(4) {
    //   ["id"]=> string(4) "2615"
    //   ["nama"]=> string(6) "smk ti"
    //   ["telpon"]=> string(6) "078923"
    //   ["alamat"]=> strinqg(7) "jombang"
    // }

    $id = $data_sekolah['id'];
    $nama = $data_sekolah['nama'];
    $telpon = $data_sekolah['telpon'];
    $alamat = $data_sekolah['alamat'];
    $gambar = $data_sekolah['gambar'];

    if ($gambar=='') {
      $gmb = "<img src=\"gambar/default.png\" width=\"200px\"/>";
    }else{
      $gmb = "<img src=\"gambar/$gambar\" width=\"200px\"/>";
    }
  }
}else{

  echo "<script>
        alert('error id tidak ditemukan');
        document.location = 'sekolah.php?keterangan=error';
    </script>";
    exit();
}
?>

<!-- content -->
<div class="container">
  <h1>Edit Data Sekolah</h1>

  <!-- <form method="post" action="sekolah_tambah_proses.php"> -->
  <form method="post" action="sekolah_edit_proses.php?id-sekolah=<?=$id;?>&gambar=<?=base64_encode($gambar);?>" enctype="multipart/form-data">
    <div class="form-group">
      <label for="exampleInputEmail1">Nama</label>
      <input value="<?=$nama;?>" name="txt-nama" id="nama" autofocus type="text" class="form-control" placeholder="isikan nama">
      <small id="emailHelp" class="form-text text-muted">Isikan nama</small>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Telpon</label>
      <input value="<?=$telpon;?>" name="txt-telpon" id="telpon" type="number" class="form-control" placeholder="isikan telpon">
      <small id="emailHelp" class="form-text text-muted">Isikan Telpon</small>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Alamat</label>
      <textarea class="form-control" name="txt-alamat" id="alamat" cols="30" rows="10" placeholder="isikan alamat"><?=$alamat;?></textarea>
      <small id="emailHelp" class="form-text text-muted">Isikan Alamat</small>
    </div>

    <div class="form-group">
      <?=$gmb;?><br>
      <label for="exampleInputEmail1">Gambar Sekolah</label>
      <input class="form-control" name="txt-gambar" id="gambar" type="file"/>
      <small id="emailHelp" class="form-text text-muted">Isikan gmabar</small>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
</div>

<?php
include './footer.php';
?>