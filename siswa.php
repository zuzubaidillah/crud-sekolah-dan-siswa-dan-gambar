<?php
include './header.php';
include './menu.php';
include './koneksi.php';
?>

<!-- content -->
<div class="container">
  <h1>Data Siswa</h1>

  <a href="siswa_tambah.php" class="btn btn-info">Tambah data</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Siswa</th>
        <th scope="col">NIS</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Sekolah</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>

      <?php
      $sql = "SELECT 
        sekolah.nama AS nama_sekolah, siswa.* 
      FROM
        sekolah 
      INNER JOIN siswa on sekolah.id=siswa.sekolah_id 
      ORDER BY siswa.nama ASC, sekolah.nama ASC";
      // pengiriman data ke mysql
      $query = mysqli_query($conn, $sql);

      // melihat jumlah data pada tabel siswa
      $jml = mysqli_num_rows($query);

      // logika if
      if ($jml == 0) {
        echo "<tr><td colspan=\"6\">Data masih Kosong</td></tr>";
      } else {
        // melakukan perulangan
        $no = 1;
        while ($data_siswa = mysqli_fetch_assoc($query)) {
          // echo "<pre>";
          // var_dump($data_siswa);die();
          // array(6) {
          //   ["nama_sekolah"]=> string(6) "smk ti"
          //   ["id"]=> string(1) "1"
          //   ["nis"]=> string(3) "200"
          //   ["nama"]=> string(7) "moh zuz"
          //   ["tgl_lahir"]=> string(10) "2021-11-28"
          //   ["sekolah_id"]=> string(4) "2615"
          // }
          // deklarasi variabel
          $id = $data_siswa['id'];
          $nama = $data_siswa['nama'];
          $nis = $data_siswa['nis'];
          $tgl_lahir = $data_siswa['tgl_lahir'];
          $nama_sekolah = $data_siswa['nama_sekolah'];

          echo '<tr>
            <th scope="row">'.$no++.'</th>
            <td>'.$nama.'</td>
            <td>'.$nis.'</td>
            <td>'.$tgl_lahir.'</td>
            <td>'.$nama_sekolah.'</td>
            <td>
              <a href="siswa_edit.php?id-siswa='.$id.'" class="btn btn-warning btn-sm">EDIT</a>
              <a href="siswa_hapus.php?id-siswa='.$id.'" class="btn btn-danger btn-sm">HAPUS</a>
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