<!DOCTYPE html>
<html>
<head>
 <title>Jadwal Perawatan Kucing</title>
</head>
<body>
    <style>
        h1{
            text-align: center;
        @page{
            margin:0;
        }
    </style>
<h1><font size="3" face="Comic Sans">Jadwal Perawatan Kucing</h1>
<center>
 <!-- <table border="1">
  <tr>
   <td>No.</td>
   <td>No Pembayaran</td>
   <td>Pemesan</td>
   <td>No Sertifikat</td>
   <td>Nama Kucing</td>
   <td>Jenis Kucing</td>
   <td>Umur Kucing</td>
   <td>Tanggal</td>
   <td>Waktu</td>
   <td>Total</td>
  </tr>
  <?php
			$nomor = 1;
		?> -->
  <?php
  $koneksi = new mysqli("localhost","root","","monjali");
  session_start();

  $id = $_GET['id'];


  function query($query)
  {
      global $koneksi;
      $result = mysqli_query($koneksi, $query);
      $rows = [];
      while ($row = mysqli_fetch_assoc($result)) {
          $rows[] = $row;
      }
      return $rows;
  }

  $queryTransaksi = query("SELECT * FROM transaksi WHERE kd_transaksi = '$id'")[0];
  $idPelanggan =  $queryTransaksi['id_pelanggan'];
  $idBiodataKucing = $queryTransaksi['id_kucing'];

  $queryBidataKucing = query("SELECT * FROM biodatakucing WHERE id_pelanggan = '$idPelanggan' AND id_kucing = '$idBiodataKucing'")[0];


  // $email = $_POST['email'];
  // $password = md5($_POST['password']);
  
  // $query = mysqli_query($koneksi, "SELECT * FROM transaksi INNER JOIN jenis ON transaksi.kd_transaksi = jenis.id_jenis 
  // INNER JOIN pelanggan ON biodatakucing.id_pelanggan = pelanggan.id_pelanggan");

//   $query = mysqli_query($koneksi, "SELECT * FROM transaksi INNER JOIN biodatakucing ON transaksi.kd_transaksi = biodatakucing.id_kucing ");
  

?>

    <!-- <tr>
        <td><?= $nomor ?></td>
        <td><?= $queryTransaksi['no_pembayaran'] ?></td>
        <td><?= $_SESSION['nama_pelanggan'] ?></td>
        <td><?= $queryBidataKucing['no_sertifikat'] ?></td>
        <td><?= $queryBidataKucing['nama_kucing'] ?></td>
        <td><?= $queryBidataKucing['jenis_kucing'] ?></td>
        <td><?= $queryBidataKucing['umur_kucing'] ?></td>
        <td><?= $queryTransaksi['tanggal'] ?></td>
        <td><?= $queryTransaksi['timeslot'] ?></td>
        <td><?= $queryTransaksi['total'] ?></td>
    </tr>  

 </table>
 <p><font size="3" face="Comic Sans">Silahkan Untuk Menunjukan Bukti Transaksi Ini Sebelum Melakukan Pelayanan
 <br>Terima Kasih Atas Pemesanannya <?php echo $_SESSION['nama_pelanggan']  ?> Di Monjali Petshop <br> Kami Memberikan PELAYANAN TERBAIK, HARGA TERBAIK :) </p>
 <p><font size="2" face="Comic Sans">Untuk Informasi Lainnya Silahkan Menghubungi Admin <br> CP Admin : +6282170507752</p>

 </center> -->
 <center>
 <table border="2" cellpadding="10">
        <tr>
            <td size="90">No Pembayaran</td>
            <td>: <?= $queryTransaksi['no_pembayaran'] ?></td>
        </tr>
        <tr>
            <td>Nama Pelanggan</td>
            <td>: <?= $_SESSION['nama_pelanggan'] ?></td>
        </tr>
        <tr>
            <td>No Sertifikat</td>
            <td>: <?= $queryBidataKucing['no_sertifikat'] ?></td>
        </tr>
        <tr>
            <td>Nama Kucing</td>
            <td>: <?= $queryBidataKucing['nama_kucing'] ?></td>
        </tr>
        <tr>
            <td>Jenis Kucing</td>
            <td>: <?= $queryBidataKucing['jenis_kucing'] ?></td>
        </tr>
        <tr>
            <td>Umur Kucing</td>
            <td>: <?= $queryBidataKucing['umur_kucing'] ?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>: <?= $queryTransaksi['tanggal'] ?></td>
        </tr>
        <tr>
            <td>Waktu</td>
            <td>: <?= $queryTransaksi['timeslot'] ?></td>
        </tr>
        <tr>
            <td>Total</td>
            <td>: Rp.<?= $queryTransaksi['total'] ?></td>
        </tr>
        
        </center>
    </table>
    <p><font size="3" face="Comic Sans">Silahkan Untuk Menunjukan Bukti Transaksi Ini Sebelum Melakukan Pelayanan
 <br>Terima Kasih Atas Pemesanannya <?php echo $_SESSION['nama_pelanggan']  ?> Di Monjali Petshop <br> Kami Memberikan PELAYANAN TERBAIK, HARGA TERBAIK :) </p>
 <p><font size="2" face="Comic Sans">Untuk Informasi Lainnya Silahkan Menghubungi Admin <br> CP Admin : +6282170507752</p>

<script>
    window.print();
</script>
</body>

</html>