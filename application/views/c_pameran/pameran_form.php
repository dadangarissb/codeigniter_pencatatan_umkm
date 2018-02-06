<!doctype html>
<html>
    <head>
        <title>Tambah Data Pameran</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datepicker/datepicker3.css') ?>"/>
        <style>
        </style>
    </head>
    <body>

    <section class="content">
        <div class="row">
        <div class="col-md-2">
        </div>
          <div class="col-md-8">
            <div class="box box-primary">
               <div class="box-body">
                <div class="form-group">

        <h3 align="center">Form Tambah Data Pameran</h3>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Pameran <?php echo form_error('nama_pameran') ?></label>
            <input type="text" class="form-control" name="nama_pameran" id="nama_pameran" placeholder="Nama Pameran" value="<?php echo $nama_pameran; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat Pameran<?php echo form_error('tempat') ?></label>
            <input type="text" class="form-control" name="tempat" id="tempat" placeholder="Tempat Pameran" value="<?php echo $tempat; ?>" />
        </div>
<!-- 	    <div class="form-group">
            <label for="date">Tanggal Pameran <?php echo form_error('tgl_pameran') ?></label>
            <input type="date" class="form-control" name="tgl_pameran" id="tgl_pameran" placeholder="Tgl Pameran" value="<?php echo $tgl_pameran; ?>" data-date-format="yyyy/mm/dd"/>
        </div> -->

        <div class="form-group">
            <label for="date">Tanggal Pameran <?php echo form_error('tgl_pameran') ?></label>
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control" name="tgl_pameran" id="datepicker" placeholder="Tanggal Pameran" value="<?php echo $tgl_pameran; ?>" data-date-format="yyyy/mm/dd" />
            </div>
        </div>

	   <!--  <div class="form-group">
            <label for="int">Kuota Peserta <?php echo form_error('kuota_peserta') ?></label>
            <input type="text" class="form-control" name="kuota_peserta" id="kuota_peserta" placeholder="Kuota Peserta" value="<?php echo $kuota_peserta; ?>" />
        </div> -->
        <p align="center">
	    <input type="hidden" name="id_pameran" value="<?php echo $id_pameran; ?>" /> 
	    <button type="submit" class="btn btn-primary btn-flat">Submit</button> 
	    <a href="<?php echo site_url('c_pameran') ?>" class="btn btn-warning btn-flat">Cancel</a>
        </p>
	</form>
    </body>

    <script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#mytable").dataTable();
    });
</script>

<script type="text/javascript">
    $('#datepicker').datepicker({
      autoclose: true
    });
</script>

</html>