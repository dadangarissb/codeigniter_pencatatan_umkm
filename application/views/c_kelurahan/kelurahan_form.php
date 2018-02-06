<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <h2 style="margin-top:0px">Kelurahan <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Kelurahan <?php echo form_error('nama_kelurahan') ?></label>
            <input type="text" class="form-control" name="nama_kelurahan" id="nama_kelurahan" placeholder="Nama Kelurahan" value="<?php echo $nama_kelurahan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Kecamatan <?php echo form_error('nama_kecamatan') ?></label>
            <input type="text" class="form-control" name="nama_kecamatan" id="nama_kecamatan" placeholder="Nama Kecamatan" value="<?php echo $nama_kecamatan; ?>" />
        </div>
	    <input type="hidden" name="id_kelurahan" value="<?php echo $id_kelurahan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('c_kelurahan') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>