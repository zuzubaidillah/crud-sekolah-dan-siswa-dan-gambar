<?php
include './koneksi.php';

// deklarasi variabel metode GET
$id = $_GET['id-sekolah'];

// cek id-sekolah apakah sudah ada di tabel siswa
$sql_relasi = "SELECT sekolah.id FROM sekolah INNER JOIN siswa ON sekolah.id=siswa.sekolah_id WHERE sekolah.id='$id'";

// proses kirim code sql_relasi ke mysql
$query = mysqli_query($conn, $sql_relasi);
$jml = mysqli_num_rows($query);
if ($jml>=1) {
  echo "<script>
    alert('SEKOLAH INI MASIH MEMPUNYAI SISWA');
    document.location = 'sekolah.php?keterangan=SEKOLAH-INI-MASIH-MEMPUNYAI-SISWA';
  </script>";
  exit();

}


$gambar = base64_decode($_GET['gambar']);
if (is_file('gambar/' . $gambar)) {
  unlink('gambar/' . $gambar);
}

$sql = "DELETE FROM sekolah WHERE id='$id'";

// proses kirim code sql ke mysql
$query = mysqli_query($conn, $sql);
// cek apakah berhasil = 1 / -1
$hasil = mysqli_affected_rows($conn);

if ($hasil == 1) {
  echo "<script>
      alert('BERHASIL DIHAPUS');
      document.location = 'sekolah.php?keterangan=berhasil-di-hapus';
    </script>";
  exit();
} else {
  echo "<script>
      alert('GAGAL DIHAPUS');
      document.location = 'sekolah.php?keterangan=gagal-di-hapus';
    </script>";
  exit();
}
