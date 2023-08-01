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
        <a href="masuk.php" tittle="Klik Gambar Untuk Kembali ke Halaman MASUK">
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
	 <!-- rating -->
	 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
	<script src="rating.js"></script>

</head>

<style>
	.fivesolidblue { border: 2px solid rgb(245, 244, 247); }
	.justify { text-align: justify;}
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
				<li class="active"><a href="#home">Home</a></li>
				<li><a href="#pricing">Pelayanan</a></li>
				<li><a href="#facilities">Fasilitas</a></li>
				<li><a href="media/pesanan.php">Pesan</a></li>
				<li><a href="media/final.php">Pesanan</a></li>
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
					<div class="col-lg-6">
						<div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
							<h2 class="h-ultra">Monjali Petshop</h2>
						</div>
						<div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
							<h6 class="h-light">VAKSIN DAN GROOMING</h6>
						</div>
						<div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
							<h7 class="h-light">Jl. Monjali No.46, Gemangan, Sinduadi, Mlati, Kabupaten Sleman<br>Daerah Istimewa Yogyakarta 55284</h7>
						</div><br>
						<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
								<h5 class="h-light">Buka <span class="color">Minggu - Senin Jam 08:30 s/d 22:00 WIB</span></h4>
						</div><br><br><br>
				</div>		
			</div>
		</div>		
    </section>
	
	<!-- /Section: intro -->
	
	<section id="callaction" class="home-section paddingtop-40">	
           <div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="callaction bg-gray">
							<div class="row">
								<div class="col-md-8">
									<div class="wow fadeInUp" data-wow-delay="0.1s">
									<div class="cta-text">
									<h3>Hewan peliharaan Anda layak untuk terlihat & merasakan yang terbaik!</h3>
									</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="wow lightSpeedIn" data-wow-delay="0.1s">
										<div class="cta-btn">
										<!-- <a href="media/pesanan.php" class="btn btn-skin btn-lg">Pesan Sekarang!</a>	 -->
										<a href="media/pesanan.php" class="btn btn-skin btn-lg">Pesan Sekarang!</a>		
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
	</section>
	

	<!-- Section: services 
    <section id="pelayanan" class="home-section nopadding paddingtop-90 ">

		<div class="container" >

        <div class="row fivesolidblue">
			<div class="col-sm-6 col-md-6">
				<center>
					<h2 class="h-light"><font face="Didot">G R O O M I N G</h5></font>
					<h5 class="h-light"><font face="Century Gothic bold"><strong>Syarat Grooming</h5></font></strong>
					<h6 class="h-light"><font face="Century Gothic bold"><i>Minimal usia kucing untuk grooming 2,5 bulan dalam kondisi sehat</i></h5></font>
				</center>
					
				<div class="wow fadeInUp" data-wow-delay="0.2s">
				<img src="img/dummy/grooming.jpeg" class="img-responsive" alt="" />
				</div>
            </div>
			<div class="col-sm-3 col-md-3 ">
				
				<div class="wow fadeInRight" data-wow-delay="0.1s">
                <div class="service-box "><br><br><br><br><br><br><br>
					<div class="service-icon">
						<span class="fa fa-stethoscope fa-3x"></span> 
					</div>
					<div class="service-desc">
						<h5 class="h-light"><font face="Didot">Shampo yang diformulasikan khusus</h5></font>
					</div>
                </div>
				</div>
				
				<div class="wow fadeInRight" data-wow-delay="0.2s">
				<div class="service-box">
					<div class="service-icon">
						<span class="fa fa-wheelchair fa-3x"></span> 
					</div>
					<div class="service-desc">
						<h5 class="h-light"><font face="Didot">Pengeringan</h5></font>
					</div>
                </div>
				</div><br>
				<div class="wow fadeInRight" data-wow-delay="0.3s">
				<div class="service-box">
					<div class="service-icon">
						<span class="fa fa-plus-square fa-3x"></span> 
					</div>
					<div class="service-desc">
						<h5 class="h-light"><font face="Didot">Potong Kuku</h5></font>
					</div>
                </div>
				</div>


            </div>
			<div class="col-sm-3 col-md-3">
				
				<div class="wow fadeInRight" data-wow-delay="0.1s">
                <div class="service-box"><br><br><br><br><br><br><br>
					<div class="service-icon">
						<span class="fa fa-h-square fa-3x"></span> 
					</div>
					<div class="service-desc">
						<h5 class="h-light"><font face="Didot">Pembersihan Telinga</h5></font>
					</div>
                </div>
				</div><br>
				
				<div class="wow fadeInRight" data-wow-delay="0.2s">
				<div class="service-box">
					<div class="service-icon">
						<span class="fa fa-filter fa-3x"></span> 
					</div>
					<div class="service-desc">
						<h5 class="h-light"><font face="Didot">Sisir Bulu</h5></font>
					</div>
                </div>
				</div><br>
				<div class="wow fadeInRight" data-wow-delay="0.3s">
				<div class="service-box">
					<div class="service-icon">
						<span class="fa fa-user-md fa-3x"></span> 
					</div>
					<div class="service-desc">						
						<h5 class="h-light"><font face="Didot">Gunting Rambut</h5></font>

					</div>
                </div>
				</div>

            </div>
			
        </div>		
		</div><br>

		<div class="container" >

			<div class="row fivesolidblue">
				<div class="col-sm-6 col-md-6">
					<center>
						<h2 class="h-light"><font face="Didot">V A K S I N</h5></font>
						<h5 class="h-light"><font face="Century Gothic bold"><strong>Syarat Vaksin</h5></font></strong>
						<h6 class="h-light"><font face="Century Gothic bold"><i>Vaksin pertama diberikan saat usianya menginjak 12–16 minggu. </i></h5></font>
					</center>
						
					<div class="wow fadeInUp" data-wow-delay="0.2s">
					<img src="img/dummy/vaksin.jpg" class="img-responsive" alt="" />
					</div>
				</div>
				<div class="col-sm-3 col-md-3 ">
					
					<div class="wow fadeInRight" data-wow-delay="0.1s">
					<div class="service-box "><br><br><br><br><br><br><br>
						<div class="service-icon">
							<span class="fa fa-stethoscope fa-3x"></span> 
						</div>
						<div class="service-desc">
							<h5 class="h-light"><font face="Didot">Sehat</h5></font>
						</div>
					</div>
					</div>
					
					<div class="wow fadeInRight" data-wow-delay="0.2s">
					<div class="service-box"><br>
						<div class="service-icon">
							<span class="fa fa-wheelchair fa-3x"></span> 
						</div>
						<div class="service-desc">
							<h5 class="h-light"><font face="Didot">Nafsu Makan Baik</h5></font>
						</div>
					</div>
					</div><br>
					<div class="wow fadeInRight" data-wow-delay="0.3s">
					<div class="service-box"><br>
						<div class="service-icon">
							<span class="fa fa-plus-square fa-3x"></span> 
						</div>
						<div class="service-desc">
							<h5 class="h-light"><font face="Didot">Sudah melalui masa adaptasi selama 7 sampai 14 hari</h5></font>
						</div>
					</div>
					</div>
	
	
				</div>
				<div class="col-sm-3 col-md-3">
					
					<div class="wow fadeInRight" data-wow-delay="0.1s">
					<div class="service-box"><br><br><br><br><br><br><br>
						<div class="service-icon">
							<span class="fa fa-h-square fa-3x"></span> 
						</div>
						<div class="service-desc">
							<h5 class="h-light"><font face="Didot">Tidak batuk, pilek, bersin.</h5></font>
						</div>
					</div>
					</div>
					
					<div class="wow fadeInRight" data-wow-delay="0.2s">
					<div class="service-box">
						<div class="service-icon">
							<span class="fa fa-filter fa-3x"></span> 
						</div>
						<div class="service-desc">
							<h5 class="h-light"><font face="Didot">Umur sesuai dengan syarat minimal vaksin </h5></font>
						</div>
					</div>
					</div>
					<div class="wow fadeInRight" data-wow-delay="0.3s">
					<div class="service-box">
						<div class="service-icon">
							<span class="fa fa-user-md fa-3x"></span> 
						</div>
						<div class="service-desc">						
							<h5 class="h-light"><font face="Didot">Tidak muntah, diare.</h5></font>
	
						</div>
					</div>
					</div>
	
				</div>
				
			</div>		
			</div>
	</section>-->

	<!-- Section: pricing -->	
	<section id="pricing" class="home-section bg-gray paddingbot-60">	
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow lightSpeedIn" data-wow-delay="0.1s">
					<div class="section-heading text-center">
					<h2 class="h-bold">Pelayanan</h2>
					<p> --- Cintai Hewan dan Kantongmu Bersama MONJALI PETSHOP ---</p>
					</div>
					</div>
					<div class="divider-short"></div>
				</div>
			</div>
		</div>
           
		   <div class="container">
			
			<div class="row">

				<div class="col-sm-4 pricing-box">
					<div class="wow bounceInUp" data-wow-delay="0.1s">
					<div class="pricing-content general">
						<h2><font size="6" face="Comic Sans">Paket Grooming</h2></font>
						<h3><font size="5" face="Comic Sans">Harga Paket Mulai<span><br>Rp. 35.000/ paket</span></h3></font>
						<ul>
							<center><li><font size="5" face="Comic Sans">Syarat Grooming</i></font><br><font size="3" face="Comic Sans">(Minimal usia kucing untuk grooming 2,5 bulan dalam kondisi sehat)<cente></font></li>
							<li><font size="3">Shampo yang diformulasikan khusus<i class="fa fa-check icon-success"></i><br>
							Pembersihan Telinga<i class="fa fa-check icon-success"></i><br>
							Pengeringan<i class="fa fa-check icon-success"></i><br>
							Sisir Bulu<i class="fa fa-check icon-success"></i><br>
							Gunting Rambut<i class="fa fa-check icon-success"></i><br>
							Potong Kuku<i class="fa fa-check icon-success"></i></li></font>
							<!-- <li><del>Health Screening Report</del> <i class="fa fa-times icon-danger"></i></li> -->
						</ul>

						<div class="price-bottom">
							<a href="media/pesanan.php" class="btn btn-skin btn-lg">Pesan</a>
						</div>
					</div>
					</div>
				</div>

				<div class="col-sm-4 pricing-box">
					<div class="wow bounceInUp" data-wow-delay="0.2s">
					<div class="pricing-content featured">
						<h2><font size="6" face="Comic Sans">INFO PENTING !</h2></font><br>
							<p class="justify"><font size="4" face="Comic Sans" ><strong>Jangan Grooming Kucing Peliharaan Sebelum di Vaksin, Kucing yang telah di vaksin tidak boleh dimandikan selama 1 minggu dan tidak boleh dibawa pergi keperjalanan yang jauh. Kucing juga tidak boleh di-groming (merapihkan bulu pada kucing) selama 2 minggu setelah divaksin, agar kucing tidak stres dan agar kekebalan tubuhnya dapat terbentuk</p></strong></font>
							<!-- <li>Post Examination Review <i class="fa fa-check icon-success"></i></li>
							<li>General Screening – Basic <i class="fa fa-check icon-success"></i></li>
							<li>Body Composition Analysis <i class="fa fa-check icon-success"></i></li>
							<li>GR Assessment & Scoring <i class="fa fa-check icon-success"></i></li> -->
							<ul>
							<center><li ><font size="5" face="Comic Sans">Tips Setelah Vaksinasi</i></font></li>
							<li class="justify">Berikan makanan dan minuman yang cukup<i class="fa fa-check icon-success"></i><br>
							Dikandangkan di dalam rumah <i class="fa fa-check icon-success"></i><br>
							Dianjurkan untuk tidak dimandikan selama 1 minggu <i class="fa fa-check icon-success"></i><br>
							Dianjurkan untuk tidak melakukan perjalanan jauh <i class="fa fa-check icon-success"></i>
							<!-- <li><del>Health Screening Report</del> <i class="fa fa-times icon-danger"></i></li> -->
						</ul>
						<div class="price-bottom">
							<!-- <a href="#" class="btn btn-skin btn-lg">Pesan</a> -->
						</div>
					</div>
					</div>
				</div>

				<div class="col-sm-4 pricing-box">
					<div class="wow bounceInUp" data-wow-delay="0.2s">
					<div class="pricing-content general last">
					<h2><font size="6" face="Comic Sans">Paket Vaksin</h2></font>
						<h3><font size="5" face="Comic Sans">Harga Paket Mulai<span><br>Rp. 20.000/ paket</span></h3></font>
						<ul>
							<center><li><font size="5" face="Comic Sans">Syarat Vaksin</i></font><br><font size="3" face="Comic Sans">(Vaksin pertama diberikan saat usianya menginjak 12–16 minggu)<cente></font></li>
							<li>Sehat<i class="fa fa-check icon-success"></i><br>
							Tidak batuk, pilek, bersin <i class="fa fa-check icon-success"></i><br>
							Nafsu Makan Baik <i class="fa fa-check icon-success"></i><br>
							Umur sesuai syarat minimal vaksin <i class="fa fa-check icon-success"></i><br>
							Sudah melalui masa adaptasi selama 7 sampai 14 hari <i class="fa fa-check icon-success"></i><br>
							Tidak muntah, diare <i class="fa fa-check icon-success"></i></li>
							<!-- <li><del>Health Screening Report</del> <i class="fa fa-times icon-danger"></i></li> -->
						</ul>
						<div class="price-bottom">
							<a href="media/pesanan.php" class="btn btn-skin btn-lg">Pesan</a>
						</div>
					</div>
					</div>
				</div>

			</div>				
				
            </div>
	</section>	 


	<!-- Section works -->
    <section id="facilities" class="home-section paddingbot-60">
		<div class="container marginbot-50">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="section-heading text-center">
					<h2 class="h-bold">Fasilitas</h2>
					<p>Fasilitas Untuk Kenyamanan Hewan Kesayangan Anda</p>
					</div>
					</div>
					<div class="divider-short"></div>
				</div>
			</div>
		</div>

<div class="container">
			<div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12" >
					<div class="wow bounceInUp" data-wow-delay="0.2s">
                    <div id="owl-works" class="owl-carousel"> 
                        <div class="item"><a href="img/photo/vaksin1.jpg" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/1@2x.jpg"><img src="img/photo/vaksin1.jpg" class="img-responsive" alt="img"></a></div>
                        <div class="item"><a href="img/photo/vaksin4.jpg" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/2@2x.jpg"><img src="img/photo/vaksin4.jpg" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="img/photo/vaksin2.jpeg" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/3@2x.jpg"><img src="img/photo/vaksin2.jpeg" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="img/photo/groom1.png" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/4@2x.jpg"><img src="img/photo/groom1.png" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="img/photo/groom2.jpg" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/5@2x.jpg"><img src="img/photo/groom2.jpg" class="img-responsive " alt="img"></a></div>
                        <div class="item"><a href="img/photo/groom3.jpg" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/6@2x.jpg"><img src="img/photo/groom3.jpg" class="img-responsive " alt="img"></a></div>
                    </div>
					</div>
                </div>
            </div>
		</div>
	</section>

<!-- Rating -->
<div role="navigation" class="navbar navbar-default navbar-static-top">
	<div class="container"><br>
<div class="wow bounceInUp" data-wow-delay="0.2s">
 		<center><h2><font size="5" face="Times New Roman">Review Pelayanan Monjali Petshop</h2></center></font>
 <?php
 include_once("db_connect.php");
 $ratingDetails = "SELECT ratingNumber FROM item_rating";
 $rateResult = mysqli_query($conn, $ratingDetails) or die("database error:". mysqli_error($conn));
 $ratingNumber = 0;
 $count = 0;
 $fiveStarRating = 0;
 $fourStarRating = 0;
 $threeStarRating = 0;
 $twoStarRating = 0;
 $oneStarRating = 0;
 while($rate = mysqli_fetch_assoc($rateResult)) {
  $ratingNumber+= $rate['ratingNumber'];
  $count += 1;
  if($rate['ratingNumber'] == 5) {
   $fiveStarRating +=1;
  } else if($rate['ratingNumber'] == 4) {
   $fourStarRating +=1;
  } else if($rate['ratingNumber'] == 3) {
   $threeStarRating +=1;
  } else if($rate['ratingNumber'] == 2) {
   $twoStarRating +=1;
  } else if($rate['ratingNumber'] == 1) {
   $oneStarRating +=1;
  }
 }
 $average = 0;
 if($ratingNumber && $count) {
  $average = $ratingNumber/$count;
 } 
 ?>  
 <br>  
 <div id="ratingDetails">   
  <div class="row">   
   <div class="col-sm-3">    
    <center><h4><font size="5" face="Times new roman">Rating dan Penilaian</h4></center>
    <center><h2 class="bold padding-bottom-7"><?php printf('%.1f', $average); ?> <small>/ 5</small></h2></font>
    <?php
    $averageRating = round($average, 0);
    for ($i = 1; $i <= 5; $i++) {
     $ratingClass = "btn-default btn-grey";
     if($i <= $averageRating) {
      $ratingClass = "btn-warning";
     }
    ?>
    <button type="button" class="btn btn-sm <?php echo $ratingClass; ?>" aria-label="Left Align">
      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
    </button> 
    <?php } ?>    
   </div>
   <div class="col-sm-3">
    <?php
    $fiveStarRatingPercent = round(($fiveStarRating/5)*100);
    $fiveStarRatingPercent = !empty($fiveStarRatingPercent)?$fiveStarRatingPercent.'%':'0%'; 
    
    $fourStarRatingPercent = round(($fourStarRating/5)*100);
    $fourStarRatingPercent = !empty($fourStarRatingPercent)?$fourStarRatingPercent.'%':'0%';
    
    $threeStarRatingPercent = round(($threeStarRating/5)*100);
    $threeStarRatingPercent = !empty($threeStarRatingPercent)?$threeStarRatingPercent.'%':'0%';
    
    $twoStarRatingPercent = round(($twoStarRating/5)*100);
    $twoStarRatingPercent = !empty($twoStarRatingPercent)?$twoStarRatingPercent.'%':'0%';
    
    $oneStarRatingPercent = round(($oneStarRating/5)*100);
    $oneStarRatingPercent = !empty($oneStarRatingPercent)?$oneStarRatingPercent.'%':'0%';
    
    ?>
    <div class="pull-left">
     <div class="pull-left" style="width:35px; line-height:1;">
      <div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
     </div>
     <div class="pull-left" style="width:180px;">
      <div class="progress" style="height:9px; margin:8px 0;">
        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fiveStarRatingPercent; ?>">
       <span class="sr-only"><?php echo $fiveStarRatingPercent; ?></span>
        </div>
      </div>
     </div>
     <div class="pull-right" style="margin-left:10px;"><?php echo $fiveStarRating; ?></div>
    </div>
    
    <div class="pull-left">
     <div class="pull-left" style="width:35px; line-height:1;">
      <div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
     </div>
     <div class="pull-left" style="width:180px;">
      <div class="progress" style="height:9px; margin:8px 0;">
        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fourStarRatingPercent; ?>">
       <span class="sr-only"><?php echo $fourStarRatingPercent; ?></span>
        </div>
      </div>
     </div>
     <div class="pull-right" style="margin-left:10px;"><?php echo $fourStarRating; ?></div>
    </div>
    <div class="pull-left">
     <div class="pull-left" style="width:35px; line-height:1;">
      <div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
     </div>
     <div class="pull-left" style="width:180px;">
      <div class="progress" style="height:9px; margin:8px 0;">
        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $threeStarRatingPercent; ?>">
       <span class="sr-only"><?php echo $threeStarRatingPercent; ?></span>
        </div>
      </div>
     </div>
     <div class="pull-right" style="margin-left:10px;"><?php echo $threeStarRating; ?></div>
    </div>
    <div class="pull-left">
     <div class="pull-left" style="width:35px; line-height:1;">
      <div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
     </div>
     <div class="pull-left" style="width:180px;">
      <div class="progress" style="height:9px; margin:8px 0;">
        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $twoStarRatingPercent; ?>">
       <span class="sr-only"><?php echo $twoStarRatingPercent; ?></span>
        </div>
      </div>
     </div>
     <div class="pull-right" style="margin-left:10px;"><?php echo $twoStarRating; ?></div>
    </div>
    <div class="pull-left">
     <div class="pull-left" style="width:35px; line-height:1;">
      <div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
     </div>
     <div class="pull-left" style="width:180px;">
      <div class="progress" style="height:9px; margin:8px 0;">
        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $oneStarRatingPercent; ?>">
       <span class="sr-only"><?php echo $oneStarRatingPercent; ?></span>
        </div>
      </div>
     </div>
     <div class="pull-right" style="margin-left:10px;"><?php echo $oneStarRating; ?></div>
    </div>
   </div>  
   <!-- <div class="col-sm-3">
    <center><button type="button" id="rateProduct" class="btn btn-default"><strong><font color="black" face="Helvetica">Beri Penilaian</button></center></font></strong>
   </div>   -->
  </div>
  <div class="row">
   <div class="col-sm-7">
    <hr/>
    <div class="review-block">  
    <?php
    $ratinguery = "SELECT ratingId, ratingNumber, title, comments, created, modified FROM item_rating ORDER BY ratingId DESC LIMIT 10";
    $ratingResult = mysqli_query($conn, $ratinguery) or die("database error:". mysqli_error($conn));
    while($rating = mysqli_fetch_assoc($ratingResult)){
     $date=date_create($rating['created']);
     $reviewDate = date_format($date,"M d, Y");   
    ?>    
     <div class="row">
      <div class="col-sm-3">
       <!-- <img src="image/profile.png" class="img-rounded"> -->
       <div class="review-block-name">By<a href="#">&nbsp<?php echo $rating['title']; ?></a></div>
       <div class="review-block-date"><?php echo $reviewDate; ?></div>
      </div>
      <div class="col-sm-9">
       <div class="review-block-rate">
        <?php
        for ($i = 1; $i <= 5; $i++) {
         $ratingClass = "btn-default btn-grey";
         if($i <= $rating['ratingNumber']) {
          $ratingClass = "btn-warning";
         }
        ?>
        <button type="button" class="btn btn-xs <?php echo $ratingClass; ?>" aria-label="Left Align">
          <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
        </button>        
        <?php } ?>
       </div>
       <div class="review-block-title"><?php echo $rating['title']; ?></div>
       <div class="review-block-description"><?php echo $rating['comments']; ?></div>
      </div>
     </div>
     <hr/>     
    <?php } ?>
    </div>
   </div>
  </div> 
 </div>
 <div id="ratingSection" style="display:none;">
  <div class="row">
   <div class="col-sm-12">
    <form id="ratingForm" method="POST">     
     <div class="form-group">
	 <input type="text" hidden name="id_pelanggan" value="<?= $_SESSION['id_pelanggan'] ?>">
      <h4><font color="black" face="Times new roman">Beri Penilaian</h4>
      <button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
      </button>
      <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
      </button>
      <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
      </button>
      <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
      </button>
      <button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
      </button>
      <input type="hidden" class="form-control" id="rating" name="rating" value="1">
      <input type="hidden" class="form-control" id="itemId" name="itemId" value="12345678">
     </div>  
     <div class="form-group">
      <label for="usr">Nama*</label>
      <input type="text" class="form-control" id="title" name="title" required>
     </div>
     <div class="form-group">
      <label for="comment">Komentar*</label>
      <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
     </div>
     <div class="form-group">
      <button type="submit" class="btn btn-info" id="saveReview">Save Review</button> <button type="button" class="btn btn-info" id="cancelReview">Batal</button>
     </div>   
    </form>
   </div>
  </div>
 </div>    
 <div style="margin:50px 0px 0px 0px;">
 </div>
</div></font></center>
</div>

	<footer>
	
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4">
					<div class="wow fadeInDown" data-wow-delay="0.1s">
					<div class="widget">
						<h5>Tentang Kami</h5>
						<p class="justify">
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