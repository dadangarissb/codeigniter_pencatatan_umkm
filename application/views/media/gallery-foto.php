<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>UPTD SARPRAS SOLO</title>
	
	<!-- core CSS -->
    <link href="<?php echo base_url() ?>Theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>Theme/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>Theme/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>Theme/css/animate.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>Theme/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>Theme/css/responsive.css" rel="stylesheet">
	
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo base_url() ?>Theme/images/surakarta1.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url() ?>Theme/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url() ?>Theme/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url() ?>Theme/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>Theme/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>

    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p><i class="fa fa-phone-square"></i>  +62271-7892430</p></div>
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                            <!--<div class="search">
                                <form role="form">
                                    <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                    <i class="fa fa-search"></i>
                                </form>
                           </div>-->
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><img src="<?php echo base_url() ?>Theme/images/logo-top2.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url('index.php/dasbor/index') ?>">HOME</a></li>
                        <li><a href="<?php echo base_url('index.php/dasbor/about') ?>">PROFIL</a></li>
                        <!--<li><a href="services.html">Services</a></li> -->
                        <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">MEDIA <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="active"><a href="<?php echo base_url('index.php/dasbor/media_foto') ?>">Gallery Foto</a></li>
                            </ul>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">UNIT <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('index.php/jadwal/stadion_manahan/index.html?q=1') ?>">Stadion Manahan</a></li>
                                <li><a href="<?php echo base_url('index.php/jadwal/stadion_sriwedari/index.html?q=2') ?>">Stadion R. Maladi</a></li>
                                <li><a href="<?php echo base_url('index.php/jadwal/gor_manahan/index.html?q=3') ?>">Gor Manahan</a></li>
                                <li><a href="<?php echo base_url('index.php/jadwal/gelanggang_pemuda/index.html?q=4') ?>">Gelanggang Pemuda Bung Karno</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url('index.php/artikel') ?>">BERITA</a></li> 
                        <li><a href="<?php echo base_url('index.php/dasbor/contact') ?>">KONTAK</a></li>                              
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
	</header><!--/header-->

    <section id="portfolio">
        <div class="container">
            <div class="center">
               <h2>FOTO-FOTO KEGIATAN </h2>
               <p class="lead">Berikut berbagai kegiatan yang dilakukan di 4 Unit :</p>
            </div>
        

            <ul class="portfolio-filter text-center">
                <li><a class="btn btn-default active" href="#" data-filter="*">All Unit</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".manahan">Stadion Manahan Solo</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".sriwedari">Stadion R.Maladi</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".gor">GOR Manahan</a></li>
				<li><a class="btn btn-default" href="#" data-filter=".gelanggang">Gelanggang Pemuda Bung Karno</a></li>
            </ul><!--/#portfolio-filter-->

            <div class="row">
                <div class="portfolio-items">
			
				<?php foreach($query as $rowdata){ ?>
				<?php switch($rowdata->unit) {
					case "1" :?>
                    <div class="portfolio-item manahan col-xs-12 col-sm-4 col-md-3">
						<?php //if($rowdata->unit=='2'){?>
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="<?php echo base_url() ?>uploads/<?php echo $rowdata->nm_gbr?>" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Kegiatan</a></h3>
                                    <p><?php echo $rowdata->ket_gbr?></p>
                                    <a class="preview" href="<?php echo base_url() ?>uploads/<?php echo $rowdata->nm_gbr?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                                </div> 
                            </div>
                        </div>
                    </div><!--/.portfolio-item-->
				<?php break;
					case "2":?>
                    <div class="portfolio-item sriwedari col-xs-12 col-sm-4 col-md-3">
                        <?php //}elseif($rowdata->unit=='1'){?>
						<div class="recent-work-wrap">
                            <img class="img-responsive" src="<?php echo base_url() ?>uploads/<?php echo $rowdata->nm_gbr?>" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Kegiatan</a></h3>
                                    <p><?php echo $rowdata->ket_gbr?></p>
                                    <a class="preview" href="<?php echo base_url() ?>uploads/<?php echo $rowdata->nm_gbr?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->
				<?php break;
					case "3":?>
                    <div class="portfolio-item gor col-xs-12 col-sm-4 col-md-3">
                        <?php //}elseif($rowdata->unit=='1'){?>
						<div class="recent-work-wrap">
                            <img class="img-responsive" src="<?php echo base_url() ?>uploads/<?php echo $rowdata->nm_gbr?>" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Kegiatan</a></h3>
                                    <p><?php echo $rowdata->ket_gbr?></p>
                                    <a class="preview" href="<?php echo base_url() ?>uploads/<?php echo $rowdata->nm_gbr?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                                </div> 
                            </div>
                        </div>        
                    </div><!--/.portfolio-item-->
				<?php break;
					default:?>
                    <div class="portfolio-item gelanggang col-xs-12 col-sm-4 col-md-3">
                        <?php //}elseif($rowdata->unit=='1'){?>
						<div class="recent-work-wrap">
                            <img class="img-responsive" src="<?php echo base_url() ?>uploads/<?php echo $rowdata->nm_gbr?>" alt="">
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a href="#">Kegiatan</a></h3>
                                    <p><?php echo $rowdata->ket_gbr?></p>
                                    <a class="preview" href="<?php echo base_url() ?>uploads/<?php echo $rowdata->nm_gbr?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                                </div> 
                            </div>
                        </div>           
                    </div><!--/.portfolio-item-->
				<?php }}?>
                </div>
            </div>
        </div>
    </section><!--/#portfolio-item-->
	
    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2016 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">UPTD PRASARANA OLAHRAGA KOTA SURAKARTA</a>.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="<?php echo base_url('index.php/dasbor') ?>">Home</a></li>
                        <li><a href="<?php echo base_url('index.php/dasbor/about') ?>">Profil</a</li>
                        <li class="active"><a href="<?php echo base_url('index.php/dasbor/kotasolo') ?>">Legal</a></li>
                        <li><a href="<?php echo base_url('index.php/dasbor/contact') ?>">Kontak</a</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->
    

    <script src="<?php echo base_url() ?>Theme/js/jquery.js"></script>
    <script type="text/javascript">
        $('.carousel').carousel()
    </script>
    <script src="<?php echo base_url() ?>Theme/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>Theme/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url() ?>Theme/js/jquery.isotope.min.js"></script>
    <script src="<?php echo base_url() ?>Theme/js/main.js"></script>
    <script src="<?php echo base_url() ?>Theme/js/wow.min.js"></script>
</body>
</html>