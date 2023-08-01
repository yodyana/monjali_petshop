<?php
$koneksi = new mysqli("localhost","root","","monjali");


$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE pelanggan, biodatakucing
FROM pelanggan
JOIN biodatakucing
ON pelanggan.id_pelanggan = biodatakucing.id_pelanggan
AND biodatakucing.id_pelanggan='$_GET[id]'");

echo "<script>alert('Data Pelanggan Terhapus');</script>";
echo "<script>location='pelanggan.php';</script>";
?>
