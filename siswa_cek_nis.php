<?php
// TUTORIAL HTTP STATUS
// https://developer.mozilla.org/en-US/docs/Web/HTTP/Status

// digunakan untuk ketika error, nilai error tidak akan ditampilkan
// ini_set('display_errors', '0');

include './koneksi.php';

$nis = $_REQUEST['nis_siswa'];
$id = $_REQUEST['id'];
$jenis = $_REQUEST['jenis'];
if ($jenis=='tambah') {
  $where = '';
}else{
  $where = "AND id!='$id'";
}

  // proses pengambilan data
  $query = mysqli_query($conn, "SELECT * FROM siswa WHERE nis='$nis' $where");
  $jml_data = mysqli_num_rows($query);

  if ($jml_data >= 1) {
    $set_data = [];
    // perulangan
    while ($hasil_data = mysqli_fetch_assoc($query)) {
      $set_data[] = $hasil_data;
    }

    $hasil = [
      "code" => 200,
      "status" => 'sukses',
      "message" => "data ditemukan",
      "data" => $set_data,
      "request" => null,
      "meta" => null
    ];
  } else {

    $hasil = [
      "code" => 200,
      "status" => 'tidak-ditemukan',
      "message" => "tidak ditemukan",
      "data" => null,
      "request" => null,
      "meta" => null
    ];
  }
header("Content-Type: application/json;charset=utf-8");
http_response_code($hasil['code']);
echo json_encode($hasil);
