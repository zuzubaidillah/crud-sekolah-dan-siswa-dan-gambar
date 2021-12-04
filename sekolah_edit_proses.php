<?php
include './koneksi.php';

// deklarasi variabel metode GET
$id = $_GET['id-sekolah'];

// deklarasi variabel metode POST
$nama = $_POST['txt-nama'];
$alamat = $_POST['txt-alamat'];
$telpon = $_POST['txt-telpon'];

// mengetahui jumlah file yang dikirim
if (count($_FILES)>=1) {

  // name = '' maka tidak merubah gambar
  if ($_FILES['txt-gambar']['name']=='') {
    $jenis = 'simpan-saja';
    $hasil_upload_gambar = TRUE;
  }else{
    // UPLOAD GAMBAR

    // deklarasi ke variabel untuk lokasi gambar
    $lokasi_simpan_gambar = "gambar/";

    // PEMANGGILAN NAMA DARI SUATU FOTO YANG AKAN DIAMBIL TIPE FILENYA
    //  $_FILES MEMANGGIL txt-gambar DENGAN ATTRIBUT name
    $nama_gambar_asli = $_FILES['txt-gambar']['name'];

    // EXPLODE DIGUNAKAN UNTUK MEMISAHKAN KALIMAT DARI SEBELUM TITIK . DAN SESUDAH TITIK .
    $x = explode(".", $nama_gambar_asli);

    // strtolower(end($x)) MENGAMBIL NILAI PALING AKHIR DARI VARIABEL X
    $ekstensi = strtolower(end($x));

    // $ekstensi = $x[1];
    $nama_gambar = date(('YmdHis')) . "." . $ekstensi;

    // tmp_name lokasi file gambar yang ada didalam browser
    $tmp_name = $_FILES['txt-gambar']['tmp_name'];

    $gambar = base64_decode($_GET['gambar']);
    if (is_file('gambar/'.$gambar)) {
      unlink('gambar/'.$gambar);
    }
    $hasil_upload_gambar = move_uploaded_file($tmp_name, $lokasi_simpan_gambar . $nama_gambar);
    $jenis = 'simpan-dengan-gambar';
  }
}else{
  echo "<script>
    alert('TERDAPAT NILAI NULL PADA FILE');
    document.location = 'sekolah.php?keterangan=TERDAPAT-NILAI-NULL-PADA-FILE';
  </script>";
  exit();
}

if ($hasil_upload_gambar == true) {
  // simpan data dengan 2 cara
  switch ($jenis) {
    case 'simpan-dengan-gambar':
      $sql = "UPDATE sekolah SET nama='$nama', alamat='$alamat', telpon='$telpon', gambar='$nama_gambar' WHERE id='$id'";
      break;
    default:
      $sql = "UPDATE sekolah SET nama='$nama', alamat='$alamat', telpon='$telpon' WHERE id='$id'";
      break;
  }

  // cara ke 2
  // $sql = "INSERT INTO sekolah 
  // (id, nama, alamat, telpon) VALUES
  // ('$id', '$nama','$alamat', '$telpon')";

  // proses kirim code sql ke mysql
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
