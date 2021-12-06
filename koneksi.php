<?php
// set time zone indonesia agar ketika memanggil date() sudah sesuai time di indo
date_default_timezone_set('Asia/Jakarta');

$host = 'localhost';
$username = 'root';
$password = '';
$db = 'db_sekolah_gambar';

// cara 1
$conn = mysqli_connect($host, $username, $password, $db);

// cara 2
// $conn = mysqli_connect('localhost', 'root', '', 'sistemInformasiPerhitunganLaba');

// cek koneksi db
if (!$conn) {
    // jika salah koneksi ke database
    // akan menampilkan code javascript alert()
    echo "<script>
        alert('Database Tidak Terkoneksi');
    </script>";
    exit();
}
?>