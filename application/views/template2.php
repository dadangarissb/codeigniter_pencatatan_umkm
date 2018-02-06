        <?php 
        $data_session=$this->session->userdata('email');
        if (empty($data_session)){
        redirect(site_url('C_User'));
        }
        ?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi Pendataan UMKM</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Bootstrap 3.3.6 -->  
  <?php
      echo link_tag('bootstrap/css/bootstrap.min.css');
  ?>

  <!-- Font Awesome -->
  <?php
      echo link_tag('dist/font_awesome/css/font-awesome.min.css');
  ?>
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">-->
  
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  
  <!-- Theme style -->
  <?php
      echo link_tag('dist/css/AdminLTE.min.css');
  ?>
  
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <?php
      echo link_tag('dist/css/skins/skin-blue.min.css');
  ?>
  
  <?php
      echo link_tag('plugins/iCheck/flat/blue.css');
  ?>
  
  <?php
      echo link_tag('dist/css/skins/_all-skins.min.css');
  ?>
  
  <!-- bootstrap wysihtml5 - text editor -->
  <?php
      echo link_tag('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');
  ?>
  	
	<!-- data table -->

  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>

	<link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
	
	<!-- webcam -->
	<script type="text/javascript" src="<?php echo base_url('dist/js/webcam.js') ?>"></script>
	
	<!-- Presensi -->
	<script type="text/javascript" src="<?php echo base_url('dist/js/presensi.js') ?>"></script>
	
	<script src=<?php echo base_url('plugins/jQuery/jquery-2.2.3.min.js'); ?>></script>

</head>

<body>

<body class="hold-transition skin-green layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../../index2.html" class="navbar-brand"></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->

        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <section class="header">
                <?php echo $_header; ?>
        </section>
        <div class="navbar-custom-menu">
          <!--  -->
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
     

      <!-- Main content -->
       <section class="content">

     
                <?php echo $_content; ?>
            
        </section>
      <!-- /.content -->
    </div>




  <!-- Main Footer -->
  <footer class="main-footer">
        <div class="pull-right hidden-xs">
          Halaman ini dimuat dalam {elapsed_time} detik, Penggunaan memory {memory_usage}
        </div>
        <strong>Copyright &copy; 2016 <a href="http://d3ti.mipa.uns.ac.id/" target="_blank">D3 Teknik Informatika UNS</a>.</strong> All rights reserved.
      </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->

<!-- Bootstrap 3.3.6 -->
<script src=<?php echo base_url('bootstrap/js/bootstrap.min.js'); ?>></script>

<!-- AdminLTE App -->
<script src=<?php echo base_url('dist/js/app.min.js'); ?>></script>
<!-- <script src="dist/js/app.min.js"></script>-->

<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>"></script>

<!-- iCheck -->
<script src="<?php echo base_url('plugins/iCheck/icheck.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
   $(document).ready(function () {
        //Datatable
		$("#mytable").dataTable();
		//Event Datatable
		$("#mytable").on( 'draw.dt', function () {
			//Enable iCheck plugin for checkboxes
			//iCheck for checkbox and radio inputs
			$('.mailbox-messages input[type="checkbox"]').iCheck({
			  checkboxClass: 'icheckbox_flat-blue',
			  radioClass: 'iradio_flat-blue'
			});
		});
		
		
		//Enable iCheck plugin for checkboxes
		//iCheck for checkbox and radio inputs
		$('.mailbox-messages input[type="checkbox"]').iCheck({
		  checkboxClass: 'icheckbox_flat-blue',
		  radioClass: 'iradio_flat-blue'
		});
		
		//Enable check and uncheck all functionality
		$(".checkbox-toggle").click(function () {
		  var clicks = $(this).data('clicks');
		  if (clicks) {
			//Uncheck all checkboxes
			$(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
			$(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
		  } else {
			//Check all checkboxes
			$(".mailbox-messages input[type='checkbox']").iCheck("check");
			$(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
		  }
		  $(this).data("clicks", !clicks);
		});
		
		//Add text editor
		$("#compose-textarea").wysihtml5();
		
		//set_url untuk dropdown bulan
		var url="<?php echo site_url('absensi/get_bulan'); ?>";
		set_url_bulan(url);
		
	   });

   
   function formatCurrency(num) {
num = num.toString().replace(/\$|\,/g,'');
if(isNaN(num))
num = "0";
sign = (num == (num = Math.abs(num)));
num = Math.floor(num*100+0.50000000001);
cents = num%100;
num = Math.floor(num/100).toString();
if(cents<10)
cents = "0" + cents;
for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
num = num.substring(0,num.length-(4*i+3))+'.'+
num.substring(num.length-(4*i+3));
return (((sign)?'':'-') + ' Rp ' + num + ',' + cents);
}
</script>
</body>
</html>
