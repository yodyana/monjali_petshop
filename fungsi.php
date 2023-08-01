<?php 
include 'koneksi.php';
						if (isset($_POST["insert"])) 
						{
							# code...
							$noSertifikat = $_POST['no_sertifikat'];
                            $namaKucing = $_POST['nama_kucing'];
                            $jenisKucing = $_POST['jenis_kucing'];
							$umurKucing = $_POST['umur_kucing'];
                            $id_pelanggan = $_POST['id_pelanggan'];
 
                            $ambil = $koneksi->query("SELECT * FROM biodatakucing WHERE no_sertifikat = '{$noSertifikat}'");
                            $cocok = $ambil->num_rows;
                            if ($cocok==1) 
                            {
                                # code...
                                echo "<script>alert('Input Data Gagal No Sertifikat Sudah Terdaftar Silahkan Periksa Kembali !');</script>";
                                echo "<script>location='biodatakucing.php';</script>";
                            }
                            else 
                            {
                                $koneksi->query("INSERT INTO biodatakucing (no_sertifikat ,nama_kucing, jenis_kucing, umur_kucing, id_pelanggan) VALUES ('{$noSertifikat}','{$namaKucing}','{$jenisKucing}','{$umurKucing}','{$id_pelanggan}')");

                                echo "<script>alert('Input Data Sukses!');</script>";
                                echo "<script>location='home.php';</script>";
                            }

                        }

?>


