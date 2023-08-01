<?php
require_once "koneksi.php";
$firstDate = $_POST['tanggalawal'];
$lastDate = $_POST['tanggalakhir'];
$queryTransaksiByDate = query("SELECT * FROM transaksi WHERE (tanggal BETWEEN '$firstDate' AND '$lastDate')");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pemesanan Layanan</title>
    <link href="../assets/bootstrap41/css/bootstrap.min.css" rel="stylesheet">
</head>

<body onload="window.print()">


    <div class="kontain">

        <div class="isi" style="position:relative;">
            <!-- <img src="../../assets/img/logo-ngawi.png" alt="" style="float:left;height:115px;position:absolute;left:-40px;"> -->
            <p style="text-align:center"><span style="font-family:Times New Roman,Times,serif">
                    <font size="8">Monjali Petshop</font>
                </span></p>
            <p style="text-align:center"><span style="font-size:15px">Jl. Monjali No.46, Gemangan, Sinduadi, Mlati, Kabupaten Sleman
Daerah Istimewa Yogyakarta 55284</span></p>
        </div>
    </div>

    <hr style="border:1.5px solid black;">



    <div class="container">
        <center><h4 class="text-center mt-5" style="text-decoration:underline;">LAPORAN PEMESANAN LAYANAN</h4></center>
        <?php if (isset($_GET['tglawal']) && isset($_GET['tglakhir'])) { ?>
            <h6 class="text-center"><?= explode(' ', $_GET['tglawal'])[0] . " / " . explode(' ', $_GET['tglakhir'])[0] ?></h6>
        <?php } ?>
        <hr>
        <table class="table table-bordered" border='1'>
            <thead>
                <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Kd Transaksi</th>
                    <th style="text-align: center;">No Pembayaran</th>
                    <th style="text-align: center;">Tanggal</th>
                    <th style="text-align: center;">Waktu</th>
                    <th style="text-align: center;">User</th>
                    <th style="text-align: center;">Total</th>
                    <th style="text-align: center;">Status</th>
                    <!-- <th style="text-align: center;">Aksi</th> -->
                </tr>
            </thead>
            <tbody>
            <?php $number = 1; foreach ($queryTransaksiByDate as $row ):?>
              <tr>
                    <td> <?= $number ?></td>
                    <td> <?= $row['kd_transaksi'] ?></td>
                    <td> <?= $row['no_pembayaran'] ?></td>
                    <td> <?= $row['tanggal'] ?></td>
                    <td> <?= $row['timeslot'] ?></td>
                    <?php $idPelanggan =  $row['id_pelanggan']; $queryuser = query("SELECT * FROM pelanggan WHERE id_pelanggan = '$idPelanggan'")[0];  ?>
                    <td> <?= $queryuser['nama_pelanggan'] ?></td>
                    <td>Rp. <?= number_format($row['total'],2 ,'.',',') ?></td>
                    <td> <?= $row['status'] ?></td>


              </tr>
            <?php $number++; endforeach;?>
            </tbody>

        </table>

    </div>
</body>

</html>