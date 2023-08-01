<?php
// session_start();
// //Koneksi
$koneksi = new mysqli("localhost","root","","monjali");
session_start();
if(empty($_SESSION['email']) and empty($_SESSION['password'])) {
    echo '
    <center>
        <br><br><br><br><br><br><br><br><br>
        <b> Maaf silahkan Login kembali </b><br>
        <b> Anda telah keluar dari sistem</b>
        <br>
        <a href="../masuk.php" tittle="Klik Gambar Untuk Kembali ke Halaman MASUK">
        <img src="img/photo/logo2.png" height="100" width="120"></img>
        </a>
    </center>';
} else{

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Monjali Petshop</title>
	
    <!-- css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="plugins/cubeportfolio/css/cubeportfolio.min.css">
	<link href="css/nivo-lightbox.css" rel="stylesheet" />
	<link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
	<link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
    <link href="css/owl.theme.css" rel="stylesheet" media="screen" />
	<link href="css/animate.css" rel="stylesheet" />
    <link href="css/style.css?<?php echo 11; ?>" rel="stylesheet">

	<!-- boxed bg -->
	<link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
	<!-- template skin -->
	<link id="t-colors" href="color/default.css" rel="stylesheet">
</head>

<style>
	.fivesolidblue { border: 2px solid rgb(245, 244, 247); }
</style>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
<div id="wrapper">
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container navigation">
		
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="home.php">
                    <img src="img/photo/logo2.png" alt="" width="80" height="50" />
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
			  <ul class="nav navbar-nav">
				<li><a href="../home.php">Home</a></li>
				<li><a href="../home.php">Pelayanan</a></li>
				<li><a href="../home.php">Fasilitas</a></li>
				<li class="active"><a href="final.php">Pesanan</a></li>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Profil <b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="../owner.php">Data Owner</a></li>
					<li><a href="../kucing.php">Data Kucing</a></li>
				  </ul>
				</li>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Akun <b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="../ubah_password.php">Ubah Password</a></li>
					<li><a href="../logout.php" onclick="return confirm('Apakah Anda Yakin Ingin keluar?')">Keluar</a></li>
				  </ul>
				</li>
			  </ul> 
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	

	<!-- Section: home 
    <section id="home" class="home">
		<div class="intro-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<div class="form-wrapper">
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
							<div class="panel panel-skin">
							<div class="panel-heading">
								<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Data Owner </h3></div>
                                    <div class="form-wrapper">
                                        <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
                                            <div class="panel-heading">
                                                <table class="table-form" border="0" width="100%" cellpadding="0" cellspacing="0">
                                                    <?php
                                                        $ambil = $koneksi->query("SELECT * FROM transaksi WHERE id_pelanggan='$_SESSION[id_pelanggan]'");
                                                        // $pecah = $ambil->fetch_assoc();
                                                        while($row = $ambil->fetch_assoc()){
                                                    ?>
                                                    <tr>
                                                        <td width="20%">Nomor Pembayaran</td>
                                                        <td width="1%">:</td>
                                                        <td><?php echo $row["no_pembayaran"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Pemesanan</td>
                                                        <td width="1%">:</td>
                                                        <td><?php echo $row["tanggal"]; ?></td>
                                                    </tr>
                                                    <tr> 
                                                        <td>Waktu</td>
                                                        <td width="1%">:</td>
                                                        <td><?php echo $row["timeslot"]; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Total</td>
                                                        <td width="1%">:</td>
                                                        <td><?php echo $row["total"]; ?></td>
                                                    </tr>
                                                    
                                                </table><br>
                                                <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                                                    <a href="detail.php?id=<?php echo $row['id_pelanggan']; ?>" class="btn btn-skin btn-lg">Detail</a>	
                                                    <a href="home.php" class="btn btn-skin btn-lg">Kembali</a>	
                                                </div>
                                                <?php
                                                    }
                                                ?>
                                        </div>
									</div>
                                </div>
						    </div>
						</div>
					</div>					
				</div>		
			</div>
		</div>		
    </section> -->
	<section id="home" class="home">
		<div class="intro-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-10">
						<div class="form-wrapper">
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
							<div class="panel panel-skin">
							<div class="panel-heading">
								<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span>Keranjang</h3></div>
								<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>No Pembayaran</th>
										<th>Tanggal Pemesanan</th>
										<th>Waktu</th>
										<th>Total</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
								<?php
			$nomor = 1;
		?>
		<?php 
			$ambil = $koneksi->query("SELECT * FROM transaksi WHERE id_pelanggan='$_SESSION[id_pelanggan]' ORDER BY kd_transaksi DESC ");
			
		?>
		<?php
			while ($pecah = $ambil->fetch_assoc()) {
				# code...
		?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['no_pembayaran']; ?></td>
			<td><?php echo $pecah['tanggal']; ?></td>
			<td><?php echo $pecah['timeslot']; ?></td>
			<td>Rp. <?php echo $pecah['total']; ?></td>
			<td>
				<!-- <a href="hapusdata.php?id=<?php echo $pecah['kd_transaksi']; ?>" class="btn-danger btn">Detail</a> -->
				<a href="detail.php?id=<?php echo $pecah['kd_transaksi']; ?>" class="btn btn-danger"><i class="fa fa-print"></i> Cetak</a>
			</td>
		</tr>
		<?php
			$nomor++;
		?>
		<?php
			}
		?>
	</tbody>
</table>
						    </div>
						</div>
					</div>					
				</div>		
			</div>
		</div>		
    </section>

	<footer>
	
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Tentang Kami</h5>
						<p>
							PELAYANAN TERBAIK, HARGA TERBAIK merupakan slogan dari Monjali Petshop yang berlokasi di Jalan Monjali No.46 Gemangan, Sinduadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta ini. Usaha petshop ini di jalankan atas dasar kecintaan owner dengan hewan, sehingga mampu meberikan pelayanan yang terbaik untuk kebutuhan hewan peliharaan anda
						</p>
					</div>
					</div>
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget"></div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Monjali Petshop</h5>
						<p>
							Jl. Monjali No.46, Gemangan, Sinduadi, Mlati, Kabupaten Sleman Daerah Istimewa Yogyakarta 55284
						</p>
						<ul>
							<li>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
								</span> Minggu - Senin, 8.30 sampai 22.00 WIB
							</li>
							<li>
								<span class="fa-stack fa-lg">
									<i class="fa fa-circle fa-stack-2x"></i>
									<i class="fa fa-phone fa-stack-1x fa-inverse"></i>
								</span> +6281325141961
							</li>
						</ul>
					</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-4">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Cabang Monjali Petshop</h5>
						<p>Jl. Palagan Tentara Pelajar No.48, Jongkang, Sariharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581</p>
						<p>Jl. Kaliurang No.KM.10, Gondangan, Sardonoharjo, Kec. Ngaglik, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55581</p>		
					</div>
					</div>
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Ikuti Kami</h5>
						<ul class="company-social">
								<li class="social-facebook"><a href="https://www.facebook.com/pusshouse.pusshouse/"><i class="fa fa-facebook"></i></a></li>
								<li class="social-instagram"><a href="https://www.instagram.com/monjali_petshop_group/"><i class="fa fa-instagram"></i></a></li>
						</ul>
					</div>
					</div>
				</div>
			</div>	
		</div>
		<div class="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-6">
					<div class="wow fadeInLeft" data-wow-delay="0.1s">
					<div class="text-left">
					<p>&copy;Copyright 2021 - Monjali Petshop. All rights reserved.</p>
					</div>
					</div>
				</div>
			</div>	
		</div>
		</div>
	</footer>

</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

	<!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>	 
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/jquery.appear.js"></script>
	<script src="js/stellar.js"></script>
	<script src="plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/nivo-lightbox.min.js"></script>
    <script src="js/custom.js"></script>


</body>
</html>
<?php
}
?>