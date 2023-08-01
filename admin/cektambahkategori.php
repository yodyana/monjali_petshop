<?php
include 'koneksi.php';
if (isset($_POST['submit'])) {
    # code...
    $nama_kategori = $_POST['nama_kategori'];
    $id_user = $_POST['id_user'];

    $ambil = $koneksi->query(
        "SELECT * FROM kategori WHERE nama_kategori = '{$nama_kategori}'"
    );
    $cocok = $ambil->num_rows;
    if ($cocok == 1) {
        # code...
        echo "<script>alert('Input Data Gagal Kategori Sudah Tersedia Silahkan Periksa Kembali !');</script>";
        echo "<script>location='tambahdatakategori.php';</script>";
    } else {
        $koneksi->query(
            "INSERT INTO kategori (nama_kategori ,id_user) VALUES ('{$nama_kategori}','{$id_user}')"
        );

        echo "<script>alert('Input Data Sukses!');</script>";
        echo "<script>location='kategori.php';</script>";
    }
}
?>


