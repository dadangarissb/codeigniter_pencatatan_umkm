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


	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="<?php echo base_url('assets2/css/bootstrap-theme.css') ?>" media="screen" />

	<link rel="stylesheet" href="<?php echo base_url('assets2/css/main.css')?>" />
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<!-- <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" alt="DINKOP SURAKARTA"></a> -->
			</div>
			<div class="navbar-collapse collapse">
<!-- 				<ul class="nav navbar-nav pull-right">
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">About</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">More Pages <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="sidebar-left.html">Left Sidebar</a></li>
							<li><a href="sidebar-right.html">Right Sidebar</a></li>
						</ul>
					</li>
					<li><a href="contact.html">Contact</a></li>
					<li class="active"><a class="btn" href="signin.html">SIGN IN / SIGN UP</a></li>
				</ul> -->
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

<!-- 		<ol class="breadcrumb">
			<li><a href="index.html">Home</a></li>
			<li class="active">User access</li>
		</ol> -->

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<!-- <h1 class="page-title">Sign in</h1> -->
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Login dengan akun anda</h3>
							<p class="text-center text-muted" style="font-size:12pt">Jika anda belum mempunyai akun anda dapat mendaftar<?php echo anchor(site_url('C_User/register'),' Disini '); ?> </p>
							<hr>
							<p align="center">
							<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                     
							
							<form action="<?php echo base_url('C_Login/aksi_login'); ?>" method="post">		
								<div class="top-margin">
									<label>Email <span class="text-danger">* <?php echo form_error('email') ?></span></label>
									<input type="text" name="email" class="form-control">
								</div>
								<div class="top-margin">
									<label>Password <span class="text-danger">* <?php echo form_error('password') ?></span></label>
									<input type="password" name="password" class="form-control">
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-8">
									<?php 
									echo anchor(site_url('index/'),'Cancel','class="btn btn-sm btn-default btn-flat"'); 
			
									?>
									</div>
									<div class="col-lg-4 text-right">
									<input type="submit" value="Login" class="btn btn-success">
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	

	<footer id="footer" class="top-space">

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
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>