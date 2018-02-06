<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Sistem Informasi Pendataan UMKM</title>

	<link rel="shortcut icon" href="assets2/images/gt_favicon.png">
	
	<!-- <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700"> -->
	<link rel="stylesheet" href="<?php echo base_url('assets2/css/bootstrap.min.css') ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('assets2/css/font-awesome.min.css') ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('assets2/datatables/dataTables.bootstrap.css') ?>"/>


	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="<?php echo base_url('assets2/css/bootstrap-theme.css') ?>" media="screen" />

	<link rel="stylesheet" href="<?php echo base_url('assets2/css/main.css')?>" />

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets2/js/html5shiv.js"></script>
	<script src="assets2/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				
			</div>
			<div class="navbar-collapse collapse">
				<!-- <ul class="nav navbar-nav pull-right">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="about.html">About</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">More Pages <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="sidebar-left.html">Left Sidebar</a></li>
							<li class="active"><a href="sidebar-right.html">Right Sidebar</a></li>
						</ul>
					</li>
					<li><a href="contact.html">Contact</a></li>
					<li><a class="btn" href="signin.html">SIGN IN / SIGN UP</a></li>
				</ul> -->
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">SELAMAT DATANG</h1>
				<p style="font-size:16pt">Sistem Informasi Pendataan UMKM Surakarta <br>
				<a href="http://infokumkm.surakarta.go.id/home.php" target="_blank">Dinas Koperasi & UMKM Surakarta</a>
				<br>
				<br>
				<div class="btn-group"> 
				<?php 

				echo anchor(site_url('C_Login/login/'),'LOGIN / DAFTAR','class="btn btn-sm btn-success btn-flat" style="font-size:16pt"'); 

				echo anchor(site_url('C_User/panduan_pendaftaran/'),'PANDUAN MENDAFTAR','class="btn btn-sm btn-action btn-flat" style="font-size:16pt"'); 
			
				?>
				</div>
				
			</div>
		</div>
	</header>
	<!-- /Header -->

	<!-- Intro -->
	<div class="container">
		<br> <br>
		<h3 class="thin" align="center">DAFTAR USAHA MIKRO KECIL MENENGAH (UMKM)</h3>
		<h4 class="text-muted" align="center">
			Dinas Koperasi & Usaha Mikro Kecil Menengah (UMKM) <br>Surakarta
		</h4>
		<br>
			<table class="table table-bordered table-striped" id="mytable">
            <thead style="background-color:#90EE90">
                <tr>
                  <th width="40px" >No</th>
		          <th>Nama Perusahaan</th>
		          <th>Nama Pimpinan</th>
    		      <th width="200px">Alamat</th>
                  <th>Kelurahan</th>
                  <th>Kecamatan</th>
                  <th>Jenis Usaha</th>
    		      <th>Spesifikasi Produk</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($c_dataumkm_data as $c_dataumkm)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $c_dataumkm->nama_perusahaan ?></td>
		    <td><?php echo $c_dataumkm->nama_pimpinan ?></td>
		    <td><?php echo $c_dataumkm->alamat ?></td>
            <td><?php echo $c_dataumkm->nama_kelurahan ?></td>
            <td><?php echo $c_dataumkm->nama_kecamatan ?></td>
            <td><?php echo $c_dataumkm->nama_jenis_usaha ?></td>
		    <td><?php echo $c_dataumkm->spesifikasi_produk ?></td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
	</div>



		<div class="footer2">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<div class="widget-body">
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2014, D3 Teknik Informatika UNS. Designed by <a href="http://gettemplate.com/" rel="designer">gettemplate</a> 
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets2/js/headroom.min.js"></script>
	<script src="assets2/js/jQuery.headroom.min.js"></script>
	<script src="assets2/js/template.js"></script>

	<script src="<?php echo base_url('assets2/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets2/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets2/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
    </script>
</body>
</html>