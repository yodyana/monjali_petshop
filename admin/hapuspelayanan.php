<?php
// $koneksi = new mysqli("localhost","root","","monjali");


// $ambil = $koneksi->query("SELECT * FROM jenis WHERE kd_jenis='$_GET[id]'");
// $pecah = $ambil->fetch_assoc();

// $koneksi->query("DELETE pelanggan, biodatakucing
// FROM pelanggan
// JOIN biodatakucing
// ON pelanggan.id_pelanggan = biodatakucing.id_pelanggan
// AND biodatakucing.id_pelanggan='$_GET[id]'");
// $koneksi->query("DELETE jenis, detail_jenis
// FROM jenis
// JOIN detail_jenis
// ON jenis.kd_jenis = detail_jenis.kd_jenis
// AND detail_jenis.kd_jenis='$_GET[id]'");
include 'koneksi.php';
$id = $_GET['id'];

$queryKategori = mysqli_query(
    $koneksi,
    "DELETE FROM jenis WHERE kd_jenis = '$id'"
);

echo "<script>alert('Data Terhapus');</script>";
echo "<script>location='pelayanan.php';</script>";
?>