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
				<li><a href="home.php">Home</a></li>
				<li><a href="home.php">Pelayanan</a></li>
				<li><a href="home.php">Fasilitas</a></li>
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
   <div class="col-sm-3">
    <center><button type="button" id="rateProduct" class="btn btn-default"><strong><font color="black" face="Helvetica">Beri Penilaian</button></center></font></strong>
   </div>  
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
      <input type="text" class="form-control" id="title" name="title" onkeypress='return harusHuruf(event)' required>
      <script>
				function harusHuruf(evt){
				var charCode = (evt.which) ? evt.which : event.keyCode
				if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
				return false;
				return true;
				}
		  </script>
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