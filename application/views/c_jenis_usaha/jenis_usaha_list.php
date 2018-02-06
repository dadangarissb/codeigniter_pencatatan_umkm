<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
    </head>
    <body>
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="box box-success">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
            <div class="form-group">

        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Jenis Usaha</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('c_jenis_usaha/create'), 'Tambah Jenis Usaha', 'class="btn btn-success"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Nama Jenis Usaha</th>
		    
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($c_jenis_usaha_data as $c_jenis_usaha)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $c_jenis_usaha->nama_jenis_usaha ?></td>
		    
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