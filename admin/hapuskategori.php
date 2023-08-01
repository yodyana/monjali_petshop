<?php
include 'koneksi.php';
$id = $_GET['id'];

$queryKategori = mysqli_query(
    $koneksi,
    "DELETE FROM kategori WHERE kode_kategori = '$id'"
);

echo "<script>alert('Data Terhapus');</script>";
echo "<script>location='kategori.php';</script>";
?>
