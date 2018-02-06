<!doctype html>
<html>
    <head>
        <title>Daftar Umkm</title>
    </head>

    <body>
        <section class="content">
            <div class="row">
            <!-- left column -->
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
                            <h3 align="center">Daftar Usaha Mikro Kecil Menengah<br>Kota Surakarta</h3>
                            <br>
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
                             
                    <?php echo anchor(site_url('c_dataumkm/Cetak_List'), 'Cetak Data', 'class="btn btn-danger btn-flat"'); ?>
                
                    <?php echo anchor(site_url('c_dataumkm/create'), 'Tambah Data', 'class="btn btn-success btn-flat "'); ?>
                        
                    </div>
                </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                  <th width="40px" >No</th>
		          <th>Nama Perusahaan</th>
		          <th>Nama Pimpinan</th>
    		      <th width="200px">Alamat</th>
                  <th>Kelurahan</th>
                  <th>Jenis Usaha</th>
    		      <th>Spesifikasi Produk</th>
    		      <th>Action</th>
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
            <td><?php echo $c_dataumkm->nama_jenis_usaha ?></td>
		    <td><?php echo $c_dataumkm->spesifikasi_produk ?></td>
		    <td style="text-align:center" width="200px">
            <div class="btn-group">
			<?php 
			echo anchor(site_url('c_dataumkm/read/'.$c_dataumkm->id_umkm),'Read','class="btn btn-sm btn-info btn-flat"'); 
	
			echo anchor(site_url('c_dataumkm/update/'.$c_dataumkm->id_umkm),'Update','class="btn btn-sm btn-success btn-flat"'); 
		
		/*	echo anchor(site_url('c_dataumkm/delete/'.$c_dataumkm->id_umkm),'Delete','class="btn btn-sm btn-danger btn-flat"  onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); */
			?>
            </div>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

    </body>
</html>