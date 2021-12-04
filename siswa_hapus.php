<?php
include './koneksi.php';

// deklarasi variabel metode GET
$id = $_GET['id-siswa'];

$sql = "DELETE FROM siswa WHERE id='$id'";

// proses kirim code sql ke mysql
$query = mysqli_query($conn, $sql);
// cek apakah berhasil = 1 / -1
$hasil = mysqli_affected_rows($conn);

if ($hasil == 1) {
  echo "<script>
      alert('BERHASIL DIHAPUS');
      document.location = 'siswa.php?keterangan=berhasil-di-hapus';
    </script>";
  exit();
} else {
  echo "<script>
      alert('GAGAL DIHAPUS');
      document.location = 'siswa.php?keterangan=gagal-di-hapus';
    </script>";
  exit();
}
