<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Sistem Informasi Pendataan UMKM</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">

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
<!-- 				<a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" alt="Progressus HTML5 template"></a> -->
			</div>
			<div class="navbar-collapse collapse">
				<!-- <ul class="nav navbar-nav pull-right">
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
			<li class="active">Registration</li>
		</ol> -->

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<!-- <h1 class="page-title">Registration</h1> -->
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<script>
								function cekPass()
								{
									p1 = document.frm.pass1.value;
									p2 = document.frm.pass2.value;
									if(p1==p2)
									{
										document.frm.submit.disabled=false;
										document.frm.nama_perusahaan.disabled=false;
										document.frm.nama_pimpinan.disabled=false;
										document.frm.no_ktp.disabled=false;
										document.frm.id_kelurahan.disabled=false;
										document.frm.id_jenis_usaha.disabled=false;
									}
									else
									{
										document.frm.submit.disabled=true;
										document.frm.nama_perusahaan.disabled=true;
										document.frm.nama_pimpinan.disabled=true;
										document.frm.no_ktp.disabled=true;
										document.frm.id_kelurahan.disabled=true;
										document.frm.id_jenis_usaha.disabled=true;
									}
								}
							</script>

							<h3 class="thin text-center">Pendaftaran UMKM</h3>
							<!-- <p class="text-center text-muted">Lorem ipsum dolor sit amet, <a href="signin.html">Login</a> adipisicing elit. Quo nulla quibusdam cum doloremque incidunt nemo sunt a tenetur omnis odio. </p> -->
							<hr>
							<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
							<form name="frm" action="<?php echo base_url('C_User/register_action'); ?>" method="post">
								<div class="top-margin">
				                  <label for="varchar">Email * <?php echo form_error('email') ?></label>
				                  <input type="email" class="form-control" name="email" id="email" placeholder="Email" />
				                </div>

								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Buat Password <span class="text-danger">* <?php echo form_error('password') ?></span></label>
										<input type="password" class="form-control" name="pass1" placeholder="Password" onChange="cekPass();">
									</div>
									<div class="col-sm-6">
										<label>Konfirmasi Password <span class="text-danger">*</span></label>
										<input type="password" name="pass2" class="form-control" placeholder="Konfirmasi Password" onChange="cekPass();">
									</div>
								</div>


								<div class="top-margin">
									<label for="varchar">Nama Perusahaan / UMKM * <?php echo form_error('nama_perusahaan') ?> <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?></label>
                  					<input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama Perusahaan" disabled="true" />
                  				</div>

                  				<div class="top-margin">
									<label for="varchar">Nama Pimpinan <?php echo form_error('nama_pimpinan') ?></label>
                  					<input type="text" class="form-control" name="nama_pimpinan" id="nama_pimpinan" placeholder="Nama Pimpinan" disabled="true" />
                  				</div>


                  				<div class="top-margin">
                  					<label for="varchar">No. KTP <?php echo form_error('no_ktp') ?></label>
                  					<input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="No. KTP" disabled="true" />
				                </div>

				                <div class="top-margin">
                  				<label for="varchar">Kelurahan <?php echo form_error('kelurahan') ?></label>
                  				<?php
                  				foreach($kelurahan as $row)
				                      {
				                          $options[$row->id_kelurahan] = $row->nama_kelurahan.' kecamatan '.$row->nama_kecamatan;
				                      }
				                      
				                      echo form_dropdown('id_kelurahan', $options, $row, 'class="form-control" disabled=true ');
				                      ?>
				                </div>

								<div class="top-margin">
                  					<label for="varchar">Jenis Usaha <?php echo form_error('id_jenis_usaha') ?></label>
						                  <?php
						                  foreach($jenis as $row)
						                      {
						                          $options2[$row->id_jenis_usaha] = $row->nama_jenis_usaha;
						                      }
						                      
						                      echo form_dropdown('id_jenis_usaha', $options2, $row, 'class="form-control" disabled="true"');
						                    ?>
				                </div>

								<hr>

								<div class="row">
									<div class="col-lg-8">
									<?php 
									echo anchor(site_url('C_User/'),'Cancel','class="btn btn-action btn-flat"'); 
									?>               
									</div>
									<div class="col-lg-4 text-right">
										<button class="btn btn-success" type="submit" disabled="true" name="submit" value="Submit">Submit</button>
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
	</footer>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url('assets2/js/headroom.min.js') ?>"></script>
	<script src="<?php echo base_url('assets2/js/jQuery.headroom.min.js') ?>"></script>
	<script src="<?php echo base_url('assets2/js/template.js') ?>"></script>
</body>
</html>