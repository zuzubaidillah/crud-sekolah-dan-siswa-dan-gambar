<?php

include './header.php';
include './menu.php';
include './koneksi.php';
?>

<!-- content -->
<div class="container">
  <h1>Data Sekolah</h1>

  <a href="sekolah_tambah.php" class="btn btn-info">Tambah data</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Nomor</th>
        <th scope="col">Alamat</th>
        <th scope="col">Gambar</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $sql = "SELECT * FROM sekolah order by nama ASC";
      // pengiriman data ke mysql
      $query = mysqli_query($conn, $sql);

      // melihat jumlah data pada tabel sekolah
      $jml = mysqli_num_rows($query);

      // logika if
      if ($jml == 0) {
        echo "<tr><td colspan=\"6\">Data masih Kosng</td></tr>";
      } else {
        // array(4) {
        //   ["id"]=> string(1) "3"
        //   ["nama"]=> string(3) "SMK"
        //   ["telpon"]=> string(2) "12"
        //   ["alamat"]=> string(6) "Madiun"
        // }
        // melakukan perulangan
        $no = 1;
        while ($data_sekolah = mysqli_fetch_assoc($query)) {

          // deklarasi variabel
          $id = $data_sekolah['id'];
          $nama = $data_sekolah['nama'];
          $telpon = $data_sekolah['telpon'];
          $alamat = $data_sekolah['alamat'];
          $gambar = $data_sekolah['gambar'];

          if ($gambar=='') {
            $gmb = "<img src=\"gambar/default.png\" width=\"100px\"/>";
          }else{
            $gmb = "<img src=\"gambar/$gambar\" width=\"100px\"/>";
          }
          echo '<tr>
            <th scope="row">'.$no++.'</th>
            <td>'.$nama.'</td>
            <td>'.$telpon.'</td>
            <td>'.$alamat.'</td>
            <td>
              '.$gmb.'
            </td>
            <td>
              <a href="sekolah_edit.php?id-sekolah='.$id.'" class="btn btn-warning">EDIT</a>
              <a href="sekolah_hapus.php?id-sekolah='.$id.'&gambar='.base64_encode($gambar).'" class="btn btn-danger">HAPUS</a>
            </td>
          </tr>';
          // $no++;
        }
      }
      ?>

    </tbody>
  </table>
</div>

<?php
include './footer.php';
?>