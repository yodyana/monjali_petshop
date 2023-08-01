<?php
$koneksi = new mysqli("localhost","root","","monjali");
session_start();

$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ubah Data Pelanggan</title>
	
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
                <a class="navbar-brand" href="index.php">
                    <img src="img/photo/logo2.png" alt="" width="80" height="50" />
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="home.php">Home</a></li>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Profil <b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="owner.php">Data Owner</a></li>
					<li><a href="kucing.php">Data Kucing</a></li>
				  </ul>
				</li>
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Akun <b class="caret"></b></a>
				  <ul class="dropdown-menu">
					<li><a href="ubah_password.php">Ubah Password</a></li>
					<li><a href="logout.php" onclick="return confirm('Apakah Anda Yakin Ingin keluar?')">Keluar</a></li>
				  </ul>
				</li>
			  </ul> 
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
	

	<!-- Section: home -->
    <section id="home" class="home">
		<div class="intro-content">
			<div class="container">
				<div class="row">
					<div class="col-lg-5">
						<div class="form-wrapper">
						<div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
							<div class="panel panel-skin">
							<div class="panel-heading">
									<h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Ubah Data Owner </h3>
									</div>
									<div class="panel-body">
									<form name="ubahdatapelanggan" id="ubahdata" method="POST" role="form" class="lead">
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-12">
												<div class="form-group">
													<label>Nama Owner</label>
													<input type="text" name="nama_pelanggan" class="form-control input-md" value="<?php echo $pecah['nama_pelanggan']; ?>" onkeypress='return harusHuruf(event)'>
												<script>
														function harusHuruf(evt){
														var charCode = (evt.which) ? evt.which : event.keyCode
														if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
														return false;
														return true;
														}
												</script>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6 col-sm-6 col-md-12">
												<div class="form-group">
													<label>Email</label>
		                                            <input type="text" class="form-control" name="email" value="<?php echo $pecah['email']; ?>">
                                                </div>
											</div>
										</div>
                                        <div class="row">
											<div class="col-xs-6 col-sm-6 col-md-12">
												<div class="form-group">
													<label>Alamat</label>
                                                    <input type="text" class="form-control" name="alamat" value="<?php echo $pecah['alamat']; ?>">
                                                </div>
											</div>
										</div>
                                        <div class="row">
											<div class="col-xs-6 col-sm-6 col-md-12">
												<div class="form-group">
													<label>No Handphone</label>
                                                    <input type="text" class="form-control" name="no_hp" value="<?php echo $pecah['no_hp']; ?>" onkeypress="return hanyaAngka(event)">
													<script>
																function hanyaAngka(evt) {
																var charCode = (evt.which) ? evt.which : event.keyCode
																if (charCode > 31 && (charCode < 48 || charCode > 57))
														
																	return false;
																return true;
																}
													</script>
												</div>
											</div>
										</div>
										<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-skin btn-block btn-lg">
									</form>
                                    <?php
                                        if (isset($_POST['submit'])) 
                                        { 
                                            $koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama_pelanggan]',email='$_POST[email]',alamat='$_POST[alamat]',no_hp='$_POST[no_hp]' WHERE id_pelanggan='$_GET[id]'");

                                            echo "<script>alert('Data pelanggan telah diubah');</script>";
                                            echo "<script>location='owner.php';</script>";
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
    </section>
	
	<!-- /Section: intro -->

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
