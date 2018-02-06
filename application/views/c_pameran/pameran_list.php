<!doctype html>
<html>
    <head>
        <title>Data pameran</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
    </head>
    <body>
             <section class="content">
      <div class="row">
        <div class="col-md-12">
                <!-- general form elements -->
                    <div class="box box-success">
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                    <div class="box-body">
                    <div class="form-group">
                    <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-12 text-center">
                            <h3 align="center">Data Pameran Produk<br> Usaha Mikro Kecil Menengah (UMKM)</h3>
                    </div>
                    <div class="col-md-4 text-center">
                    </div>
                    <div class="col-md-4 text-center">
                       <div style="margin-top: 4px"  id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                        </div>
                     </div>
                    <div class="col-md-4 text-center">
                    </div>
                    <div class="col-md-12 text-center">
                    <br>
                             
                    <?php echo anchor(site_url('c_pameran/create'), 'Tambah Data Pameran', 'class="btn btn-success btn-flat"'); ?>
                    </div>
                </div>
        <!-- left column -->
        
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="30px">No</th>
		    <th>Nama Pameran</th>
		    <th>Tempat</th>
		    <th>Tgl Pameran</th>
		    <!-- <th>Kuota Peserta</th> -->
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($c_pameran_data as $c_pameran)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $c_pameran->nama_pameran ?></td>
		    <td><?php echo $c_pameran->tempat ?></td>
		    <td><?php echo date("d F Y",strtotime($c_pameran->tgl_pameran)); ?></td>
		    
		    <td style="text-align:center" width="200px">
            <div class="btn-group">
			<?php 
			echo anchor(site_url('c_pameran/read/'.$c_pameran->id_pameran),'Read','class="btn btn-info btn-flat"'); 
			echo anchor(site_url('c_pameran/update/'.$c_pameran->id_pameran),'Update','class="btn btn-success btn-flat"'); 
			/*echo anchor(site_url('c_pameran/delete/'.$c_pameran->id_pameran),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')" class="btn btn-danger btn-flat" '); */
			?>
            </div>
		    </td>
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