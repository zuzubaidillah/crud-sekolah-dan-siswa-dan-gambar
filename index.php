<?php
include './koneksi.php';
include './header.php';
include './menu.php';

$sql_sekolah = "SELECT * FROM sekolah";
$query_sekolah = mysqli_query($conn, $sql_sekolah);
$jml_sekolah = mysqli_num_rows($query_sekolah);

$sql_siswa = "SELECT * FROM siswa";
$query_siswa = mysqli_query($conn, $sql_siswa);
$jml_siswa = mysqli_num_rows($query_siswa);
?>

<!-- content -->
<div class="container">
  <h1>Dashboard</h1>
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Sekolah
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <p>
              Berikut yang bisa kami tampilkan untuk jumlah keseluruhan sekolah yang terdaftar di data kami.
            </p>
            <footer class="blockquote-footer">Jumlah: <cite title="Source Title"><?=$jml_sekolah;?> sekolah</cite></footer>
          </blockquote>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          Siswa
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <p>
              Berikut yang bisa kami tampilkan untuk jumlah keseluruhan siswa yang terdaftar dibeberapa sekolah.
            </p>
            <footer class="blockquote-footer">Jumlah: <cite title="Source Title"><?=$jml_siswa;?> siswa</cite></footer>
          </blockquote>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include './footer.php';
?>