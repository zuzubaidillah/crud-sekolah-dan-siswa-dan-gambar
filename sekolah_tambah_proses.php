<?php
// echo "<pre>";
// var_dump($_FILES);
// var_dump($_POST);die();
include './koneksi.php';
// array(4) {
//   ["txt-nama"]=> string(6) "smk ti"
//   ["txt-telpon"]=> string(6) "078923"
//   ["txt-alamat"]=> string(7) "jombang"
// }

// deklarasi variabel
$nama = $_POST['txt-nama'];
$alamat = $_POST['txt-alamat'];
$telpon = $_POST['txt-telpon'];

// buat id uniq
$id = mt_rand(1000, 9000);

// UPLOAD GAMBAR
$lokasi_simpan_gambar = "gambar/";
// PEMANGGILAN NAMA DARI SUATU FOTO YANG AKAN DIAMBIL TIPE FILENYA
//  $_FILES MEMANGGIL TXTFOTO DENGAN ATTRIBUT NAME
$nama_gambar_asli = $_FILES['txt-gambar']['name'];
// EXPLODE DIGUNAKAN UNTUK MEMISAHKAN KALIMAT DARI SEBELUM TITIK . DAN SESUDAH TITIK .
$x = explode(".", $nama_gambar_asli);
// strtolower(end($x)) MENGAMBIL NILAI PALING AKHIR DARI VARIABEL X
$ekstensi = strtolower(end($x));
// $ekstensi = $x[1];
$nama_gambar = date(('YmdHis')).".".$ekstensi;

$tmp_name = $_FILES['txt-gambar']['tmp_name'];
$gabung_nama_dan_tempat_gambar = $lokasi_simpan_gambar.$nama_gambar;

$hasil_upload_gambar = move_uploaded_file($tmp_name, $gabung_nama_dan_tempat_gambar);

if ($hasil_upload_gambar == true) {
  // simpan data cara 1
  $sql = "INSERT INTO sekolah VALUES('$id', '$nama', '$telpon','$alamat','$nama_gambar')";

  // cara ke 2
  // $sql = "INSERT INTO sekolah 
  // (id, nama, alamat, telpon) VALUES
  // ('$id', '$nama','$alamat', '$telpon')";

  // proses kirim sql
  $query = mysqli_query($conn, $sql);
  // cek apakah berhasil = 1 / -1
  $hasil = mysqli_affected_rows($conn);

  if ($hasil == 1) {
    echo "<script>
          alert('BERHASIL DISIMPAN');
          document.location = 'sekolah.php?keterangan=berhasil-di-simpan';
      </script>";
    exit();
  } else {
    echo "<script>
      alert('GAGAL DISIMPAN');
      document.location = 'sekolah.php?keterangan=gagal-di-simpan';
    </script>";
    exit();
  }
} else {
  echo "<script>
    alert('GAMBAR TIDAK BISA DIUPLOAD');
    document.location = 'sekolah.php?keterangan=gambar-gagal';
  </script>";
  exit();
}
