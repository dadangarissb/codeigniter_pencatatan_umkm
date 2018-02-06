<!doctype html>
<html>
    <head>
        <title>Tambah Pengajuan Pameran</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
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

        <h3 style="margin-top:0px" align="center">Pengajuan Pameran</h3>
        <form action="<?php echo $action; ?>" method="post">
        
        <div class="form-group">
            <label for="int">Nama UMKM <?php echo form_error('nama_perusahaan') ?></label>
            <?php
            foreach($pengaju as $row)
                {
                    $options2[$row->id_umkm] = $row->nama_perusahaan;
                }
        
                echo form_dropdown('id_umkm', $options2, $id_umkm,array('class' => 'form-control'));
        ?>
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Pengajuan <?php echo form_error('tgl_pengajuan') ?></label>
            <input type="date" class="form-control" name="tgl_pengajuan" id="tgl_pengajuan" placeholder="Tanggal Pengajuan" value="<?php echo $tgl_pengajuan; ?>" />
        </div>
	    <div class="form-group">
            <!-- <label for="int">Id Pameran <?php echo form_error('id_pameran') ?></label> -->
            <input type="hidden" class="form-control" name="id_pameran" id="id_pameran" placeholder="Id Pameran" value="<?php echo $id_pameran; ?>" />
        </div>
       
	    <input type="hidden" name="id_pengajuan" value="<?php echo $id_pengajuan; ?>" /> 
        <p align="center">
	    <button type="submit" class="btn btn-primary btn-flat">Submit</button>
        <?php echo anchor(site_url('c_pameran/read/'.$id_pameran),'Kembali','class="btn btn-warning btn-flat"'); 
        ?>
        </p>
	</form>
    </body>
</html>