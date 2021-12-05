<?php
include './koneksi.php';
// array(4) {
//   ["txt-nama"]=> string(23) "mohammad zuz ubaidillah"
//   ["txt-nis"]=> string(12) "001.001.2067"
//   ["txt-tgl_lahir"]=> string(10) "1997-11-11"
//   ["txt-sekolah_id"]=> string(4) "2079"
// }
// echo "<pre>";
// var_dump($_REQUEST);die();

// deklarasi variabel
$nama = $_POST['txt-nama'];
$nis = $_POST['txt-nis'];
$tgl_lahir = $_POST['txt-tgl_lahir'];
$sekolah_id = $_POST['txt-sekolah_id'];

// buat id uniq
$id = mt_rand(1000, 9000);

$sql = "INSERT INTO siswa VALUES('$id', '$nis', '$nama', '$tgl_lahir','$sekolah_id')";
// proses kirim sql
$query = mysqli_query($conn, $sql);
// cek apakah berhasil = 1 / -1
$hasil = mysqli_affected_rows($conn);

if ($hasil == 1) {
  echo "<script>
          alert('BERHASIL DISIMPAN');
          document.location = 'siswa.php?keterangan=berhasil-di-simpan';
      </script>";
  exit();
} else {
  echo "<script>
      alert('GAGAL DISIMPAN');
      document.location = 'siswa.php?keterangan=gagal-di-simpan';
    </script>";
  exit();
}
