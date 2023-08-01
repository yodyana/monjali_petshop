<?php
$koneksi = new mysqli("localhost","root","","monjali");
session_start();

function build_calendar($month, $year)
{
    global $koneksi;

    //Membuat array yang berisi nama semua hari dalam seminggu
    $daysOfWeek = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');

    //Apa hari pertama bulan yang dimaksud?
    $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

    //Berapa hari dalam bulan ini?
    $numberDays = date('t', $firstDayOfMonth);

    //Ambil beberapa informasi tentang hari pertama
    //Bulan yang bersangkutan
    $dateComponents = getdate($firstDayOfMonth);

    //Apa nama bulan yang dimaksud?
    $monthName = $dateComponents['month'];

    //Berapa nilai indeks (0-6) hari pertama
    //Bulan yang bersangkutan
    $dayOfWeek = $dateComponents['wday'];

    $datetoday = date('Y-m-d');
    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar .= "<a class='btn btn-xs btn-primary' href='?month=" . date('m', mktime(0, 0, 0, $month - 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month - 1, 1, $year)) . "'>Previous Month</a> ";
    $calendar .= " <a class='btn btn-xs btn-primary' href='?month=" . date('m') . "&year=" . date('Y') . "'>Current Month</a> ";
    $calendar .= "<a class='btn btn-xs btn-primary' href='?month=" . date('m', mktime(0, 0, 0, $month + 1, 1, $year)) . "&year=" . date('Y', mktime(0, 0, 0, $month + 1, 1, $year)) . "'>Next Month</a></center><br>";
    $calendar .= "<tr>";

    //Membuat headers kalender
    foreach ($daysOfWeek as $day) {
        $calendar .= "<th  class='header'>$day</th>";
    }

    //Buat sisa kalender Mulai penghitung hari, dimulai dari tanggal 1
    $currentDay = 1;
    $calendar .= "</tr><tr>";

    # Variabel $dayOfWeek digunakan untuk pastikan bahwa kalender tampilan terdiri dari tepat 7 kolom
    if ($dayOfWeek > 0) {
        for ($k = 0; $k < $dayOfWeek; $k++) {
            $calendar .= "<td  class='empty'></td>";
        }
    }

    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    while ($currentDay <= $numberDays) {
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        $dayname = strtolower(date('l', strtotime($date)));
        $eventNum = 0;
        $today = $date == date('Y-m-d') ? "today" : "";

        if ($dayname == 'sunday') {
            $calendar .= "<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>Libur</button>";
        } else if ($date < date('Y-m-d')) {
            $calendar .= "<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>N/A</button>";
        } else {
            $totalbookings = checkSlots($koneksi, $date);
            if ($totalbookings == 6) { 
                $calendar .= "<td class='$today'><h4>$currentDay</h4> <a href='#' class='btn btn-danger btn-xs'>Penuh</a>";
            } else {
                $availableslots = 6 - $totalbookings;
                $calendar .= "<td class='$today'><h4>$currentDay</h4> <a href='pesan.php?date=" . $date . "' class='btn btn-success btn-xs'>Pesan</a><small><i>$availableslots sisa slots</i></small>";
            }
        }
        $calendar .= "</td>";
        $currentDay++;
        $dayOfWeek++;
    }
    if ($dayOfWeek != 7) {
        $remainingDays = 7 - $dayOfWeek;
        for ($l = 0; $l < $remainingDays; $l++) {
            $calendar .= "<td class='empty'></td>";
        }
    }
    $calendar .= "</tr>";
    $calendar .= "</table>";
    echo $calendar;
}

function checkSlots($koneksi, $date)
{
    $stmt = $koneksi->prepare("select * from transaksi where tanggal = ?");
    $stmt->bind_param('s', $date);
    $totalbookings = 0;
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $totalbookings++;
            }

            $stmt->close();
        }
    }
    return $totalbookings;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Pesan</title>
    <!-- <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Pesanan</title>
    <link rel="stylesheet" href="np.css" media="screen">
    <link rel="stylesheet" href="vaksin.css" media="screen">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="np.js" defer=""></script>
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i|Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Abhaya+Libre:400,500,600,700,800|Alegreya:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="plugins/cubeportfolio/css/cubeportfolio.min.css">
	<link href="css/nivo-lightbox.css" rel="stylesheet" />
	<link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
	<link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
    <link href="css/owl.theme.css" rel="stylesheet" media="screen" />
	<link href="css/animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">

	<!-- boxed bg -->
	<link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
	<!-- template skin -->
	<link id="t-colors" href="color/default.css" rel="stylesheet">

    <style>
        .fivesolidblue { border: 2px solid rgb(245, 244, 247); }


        @media only screen and (max-width: 760px),
        (min-device-width: 802px) and (max-device-width: 1020px) {

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;

            }

            .empty {
                display: none;
            }

            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
            }

            td {
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            td:nth-of-type(1):before {
                content: "Minggu";
            }

            td:nth-of-type(2):before {
                content: "Senin";
            }

            td:nth-of-type(3):before {
                content: "Selasa";
            }

            td:nth-of-type(4):before {
                content: "Rabu";
            }

            td:nth-of-type(5):before {
                content: "Kamis";
            }

            td:nth-of-type(6):before {
                content: "Jumat";
            }

            td:nth-of-type(7):before {
                content: "Sabtu";
            }
        }

        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            body {
                padding: 0;
                margin: 0;
            }
        }

        @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
            body {
                width: 495px;
            }
        }

        @media (min-width:641px) {
            table {
                table-layout: fixed;
                background: #F5FFFA;
            }

            td {
                width: 33%;
            }
        }

        .row {
            margin-top: 20px;
        }

        .today {
            background: yellow;
        }

        body {
            background-image: url(kucing.jpg);
            background-size: cover
        }

        #test {
            padding: 20px
        }

        h1 {
            text-align: center;
            color: #FFF
        }

        p {
            margin-bottom: 10px;
            color: #FFF
        }
    </style>
</head>

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
				<li class="active"><a href="media/pesanan.php">Pesan</a></li>
				<li><a href="final.php">Pesanan</a></li>
				<li><a href="../home.php">Fasilitas</a></li>
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
    <!-- <header class="u-clearfix u-header u-sticky u-white u-header header" id="sec-81fb">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1 ">
        <nav class="u-align-center u-dropdown-icon u-menu u-menu-dropdown u-offcanvas u-menu-1 navbar navbar-expand">
          <div class="u-custom-menu u-nav-container">
            <ul class="u-custom-font u-font-lato u-nav u-spacing-0 u-unstyled u-nav-1 navbar-nav mr-auto">
              <li class="u-nav-item"><a class="u-button-style nav-link u-nav-link u-text-custom-color-2 u-text-hover-custom-color-3" href="Beranda.php" style="padding: 12px 20px;">Beranda</a></li>
              <li class="u-nav-item dropdown">
                <a class="u-button-style u-nav-link u-text-active-custom-color-3 u-text-custom-color-2 u-text-hover-custom-color-3" role="button" data-toggle="dropdown" aria-haspopup="true"  style="padding: 12px 20px;">Pelayanan</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item u-button-style u-nav-link u-text-active-custom-color-3 u-text-active-custom-color-3 u-text-custom-color-2 u-text-hover-custom-color-3" style="padding: 12px 20px;" href="vaksin.php">Vaksin</a>
                  <a class="dropdown-item u-text-active-custom-color-3 u-text-custom-color-2 u-text-hover-custom-color-3" style="padding: 12px 20px;" href="grooming.php">Grooming</a>
                  <a class="dropdown-item u-text-active-custom-color-3 u-text-custom-color-2 u-text-hover-custom-color-3" style="padding: 12px 20px;" href="hotel.php">Hotel</a>
                </div>
              </li>
              <li class="u-nav-item active"><a class="u-button-style nav-link u-nav-link u-text-active-custom-color-3 u-text-custom-color-2 u-text-hover-custom-color-3" href="pesanan.php" style="padding: 12px 20px;">Pesanan</a></li>
              <li class="u-nav-item active"><a class="u-button-style nav-link u-nav-link u-text-active-custom-color-3 u-text-custom-color-2 u-text-hover-custom-color-3" href="tentang.php" style="padding: 12px 20px;">Tentang</a></li>
              <li class="u-nav-item active"><a class="u-button-style nav-link u-nav-link u-text-active-custom-color-3 u-text-custom-color-2 u-text-hover-custom-color-3" href="kontak.php" style="padding: 12px 20px;">Kontak</a></li>
              <li class="u-nav-item dropdown">
                <a class="u-button-style u-nav-link u-text-active-custom-color-3 u-text-custom-color-2 u-text-hover-custom-color-3" role="button" data-toggle="dropdown" aria-haspopup="true"  style="padding: 12px 20px;">Akun</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item u-text-active-custom-color-3 u-text-custom-color-2 u-text-hover-custom-color-3" style="padding: 12px 20px;" href="password.php">Ubah Password</a>
                  <a class="dropdown-item u-text-active-custom-color-3 u-text-custom-color-2 u-text-hover-custom-color-3" style="padding: 12px 20px;" href="logout.php" onclick="return confirm('Apakah Anda Yakin Ingin keluar?')">Logout</a>
                </div>
              </li>
              </div>
              </nav>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div> -->
    </header><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $dateComponents = getdate();
                if (isset($_GET['month']) && isset($_GET['year'])) {
                    $month = $_GET['month'];
                    $year = $_GET['year'];
                } else {
                    $month = $dateComponents['mon'];
                    $year = $dateComponents['year'];
                }
                echo build_calendar($month, $year);
                ?>
            </div>
        </div>
    </div>
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
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script> -->

</html>