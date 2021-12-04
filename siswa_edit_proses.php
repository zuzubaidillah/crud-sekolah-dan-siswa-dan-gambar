<?php
include './koneksi.php';

// deklarasi variabel metode GET
$id = $_GET['id-siswa'];
// array(4) {
//   ["txt-nama"]=> string(12) "ahmad muzaky"
//   ["txt-nis"]=> string(8) "12923423"
//   ["txt-tgl_lahir"]=> string(10) "1997-01-09"
//   ["txt-siswa_id"]=> string(4) "2079"
// }
// deklarasi variabel metode POST
$nama = $_POST['txt-nama'];
$nis = $_POST['txt-nis'];
$tgl_lahir = $_POST['txt-tgl_lahir'];
$sekolah_id = $_POST['txt-sekolah_id'];

$sql = "UPDATE siswa SET nama='$nama', tgl_lahir='$tgl_lahir', nis='$nis', sekolah_id='$sekolah_id' WHERE id='$id'";

// proses kirim code sql ke mysql
$query = mysqli_query($conn, $sql);
// cek apakah berhasil = 1 / -1
$hasil = mysqli_affected_rows($conn);

if ($hasil == 1) {
  echo "<script>
      alert('BERHASIL DIRUBAH');
      document.location = 'siswa.php?keterangan=berhasil-di-rubah';
    </script>";
  exit();
} else {
  echo "<script>
      alert('GAGAL DIRUBAH');
      document.location = 'siswa.php?keterangan=gagal-di-rubah';
    </script>";
  exit();
}
