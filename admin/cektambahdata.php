<?php 
include 'koneksi.php';
						if (isset($_POST["submit"])) 
						{
							# code...
                            $kategori = $_POST['kategori'];
							$nama = $_POST['nama'];
                            $harga = $_POST['harga'];
                            $keterangan = $_POST['keterangan'];
                            $id_user = $_POST['id_user'];
 
                            $ambil = $koneksi->query("SELECT * FROM jenis WHERE nama = '{$nama}'");
                            $cocok = $ambil->num_rows;
                            if ($cocok==1) 
                            {
                                # code...
                                echo "<script>alert('Input Data Gagal Jenis Pelayanan Sudah Tersedia Silahkan Periksa Kembali !');</script>";
                                echo "<script>location='tambahdata.php';</script>";
                            }
                            else 
                            {
                                $koneksi->query("INSERT INTO jenis (nama ,harga, keterangan, kode_kategori, id_user) VALUES ('{$nama}','{$harga}','{$keterangan}','{$kategori}','{$id_user}')");

                                echo "<script>alert('Input Data Sukses!');</script>";
                                echo "<script>location='pelayanan.php';</script>";
                            }

                        }

?>


