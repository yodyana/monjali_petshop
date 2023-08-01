<?php
$koneksi = new mysqli("localhost","root","","monjali");


$ambil = $koneksi->query("SELECT * FROM biodatakucing WHERE id_kucing='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM biodatakucing WHERE id_kucing = '$_GET[id]'");

echo "<script>alert('Data Kucing Terhapus');</script>";
echo "<script>location='kucing.php';</script>";
?>