<!doctype html>
<html>
    <head>
        <title>Tambah Peserta Pameran</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
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

        <h3 style="margin-top:0px" align="center">Update Data Peserta Pameran</h3>
        <form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <!-- <label for="int">Nama Pameran <?php echo form_error('id_pameran') ?></label> -->
            <input type="hidden" class="form-control" name="id_pameran" id="id_pameran" placeholder="Id Pameran" value="<?php echo $id_pameran; ?>" />
        </div>
        <div class="form-group">
            <!-- <label for="int">Nama Pameran <?php echo form_error('id_pameran') ?></label> -->
            <input type="hidden" class="form-control" name="id_umkm" id="id_umkm" placeholder="Id umkm" value="<?php echo $id_umkm; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Nama Peserta<?php echo form_error('id_umkm') ?></label>
            <input type="text" class="form-control" name="peserta_pameran" id="peserta_pameran" placeholder="Peserta Pameran" value="<?php echo $nama_perusahaan; ?>" disabled/>
        </div>


<!-- <div class="form-group">
            <label for="int">Omset / Tahun<?php echo form_error('omset') ?></label><?php if($asset <= 0){echo '';} ?><span id=omset></span>
            <input type="text" class="form-control" name="omset" id="omset" onkeypress="document.getElementById('omset').innerHTML =formatCurrency(this.value);" placeholder="Omset per Tahun" value="<?php echo $omset; ?>" />
        </div>
 -->

	    <div class="form-group">
            <label for="int">Hasil Penjualan Barang <?php echo form_error('penjualan_barang') ?></label><?php if($penjualan_barang <= 0){echo '';} ?><span id=penjualan_barang></span>
            <input type="text" class="form-control" name="penjualan_barang" id="penjualan_barang" onkeyup="document.getElementById('penjualan_barang').innerHTML =formatCurrency(this.value);" placeholder="Penjualan Barang" value="<?php echo $penjualan_barang; ?>" />
        </div>

	    <div class="form-group">
            <label for="varchar">Terima Order Barang <?php echo form_error('order_barang') ?></label><?php if($order_barang <= 0){echo '';} ?><span id=order_barang></span>
            <input type="text" class="form-control" name="order_barang" id="order_barang" onkeyup="document.getElementById('order_barang').innerHTML =formatCurrency(this.value);" placeholder="Order Barang" value="<?php echo $order_barang; ?>" />
        </div>

	    <input type="hidden" name="id_peserta" value="<?php echo $id_peserta; ?>" />
        <p align="center"> 
	    <button type="submit" class="btn btn-primary btn-flat" >Submit</button> 
	    <?php echo anchor(site_url('c_pameran/read/'.$id_pameran),'Kembali','class="btn btn-warning btn-flat"'); 
        ?>
        </p>
	</form>
    </body>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.priceformat.min.js"></script>
</html>