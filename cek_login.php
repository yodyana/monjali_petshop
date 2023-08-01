<?php
include "koneksi.php";
session_start();

$email = $_POST['email'];
$password = md5($_POST['password']);

$query = mysqli_query($koneksi, "select * from pelanggan where email='$email' and password='$password'");

$r = mysqli_fetch_array($query); //pecah data nama user saja

$cek = mysqli_num_rows($query);
 
if($cek > 0) {
    $_SESSION['nama_pelanggan'] = $r['nama_pelanggan'];
    $_SESSION['password'] = $r['password'];
    $_SESSION['id_pelanggan'] = $r['id_pelanggan'];
    $_SESSION['no_hp'] = $r['no_hp'];
    $_SESSION['email'] = $r['email'];
    // header("location:home.php");
    echo "<script>alert('Berhasil Masuk Silahkan Lengkapi Data Kucing Anda!'); window.location='biodatakucing.php'</script>";
} else {
    // header("location:masuk.php"); //gagal login
    echo "<script>alert('Gagal Masuk Silahkan Periksa Email Dan Password!'); window.location='masuk.php'</script>";
}
?>