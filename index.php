<?php
include './header.php';
include './menu.php';
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
            <footer class="blockquote-footer">Jumlah: <cite title="Source Title">300 sekolah</cite></footer>
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
            <footer class="blockquote-footer">Jumlah: <cite title="Source Title">300 siswa</cite></footer>
          </blockquote>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include './footer.php';
?>