<!doctype html>
<html>
    <head>
        <title>Tambah Jenis Usaha</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>
        <section class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="box box-primary">
               <div class="box-body">
                <div class="form-group">

        <h3 style="margin-top:0px" align="center">Tambah Jenis Usaha</h3>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Jenis Usaha <?php echo form_error('nama_jenis_usaha') ?></label>
            <input type="text" class="form-control" name="nama_jenis_usaha" id="nama_jenis_usaha" placeholder="Nama Jenis Usaha" value="<?php echo $nama_jenis_usaha; ?>" />
        </div>
	    <input type="hidden" name="id_jenis_usaha" value="<?php echo $id_jenis_usaha; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('c_jenis_usaha') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>