<!doctype html>
<html>
    <head>
        <title>Daftar Kelurahan</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
    </head>
    <body>
             <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-1">
        </div>
        <div class="col-md-10">
          <!-- general form elements -->
          <div class="box box-success">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
            <div class="form-group">

        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Data Kelurahan</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('c_pameran/create'), 'Tambah Kelurahan', 'class="btn btn-success"'); ?>
        </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nama Kelurahan</th>
		    <th>Nama Kecamatan</th>
		<!--     <th>Action</th> -->
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($c_kelurahan_data as $c_kelurahan)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $c_kelurahan->nama_kelurahan ?></td>
		    <td><?php echo $c_kelurahan->nama_kecamatan ?></td>

	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
    </body>
</html>