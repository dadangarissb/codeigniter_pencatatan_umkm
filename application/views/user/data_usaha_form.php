<!doctype html>
<html>
    <head>
        <title>Tambah Data Usaha</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>

    <body>
    <section class="content-header">

</section>
    <section class="content">

      <div class="row">
        <div class="col-md-2">
        </div> 
        <div class="col-md-8">
         <p align="center" style="font-size:12pt">
                      <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
         </p> 

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

        <h3 style="margin-top:0px" align="center">Form Data Usaha</h3>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <input type="hidden" class="form-control" name="id_umkm" id="id_umkm" placeholder="Id Umkm" value="<?php echo $id_umkm; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kapasitas Produk / Tahun <?php echo form_error('kapasitas_produk') ?></label>
            <input type="text" class="form-control" name="kapasitas_produk" id="kapasitas_produk" placeholder="Kapasitas Produk" value="<?php echo $kapasitas_produk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Asset  <?php echo form_error('asset') ?></label><?php if($asset <= 0){echo '';} ?><span id=asset></span>
            <input type="int" class="form-control" name="asset" id="asset" onkeyup="document.getElementById('asset').innerHTML = formatCurrency(this.value);" placeholder="Asset" value="<?php echo $asset; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Omset / Tahun<?php echo form_error('omset') ?></label><?php if($asset <= 0){echo '';} ?><span id=omset></span>
            <input type="text" class="form-control" name="omset" id="omset" onkeyup="document.getElementById('omset').innerHTML =formatCurrency(this.value);" placeholder="Omset per Tahun" value="<?php echo $omset; ?>" />
        </div>


	    <div class="form-group" >
            <label for="int">Jumlah Tenaga Wanita <?php echo form_error('tenaga_wanita') ?></label>
            <input type="text" class="form-control" name="tenaga_wanita" id="tenaga_wanita" placeholder="Jumlah Tenaga Kerja Wanita" value="<?php echo $tenaga_wanita; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jumlah Tenaga Laki - Laki<?php echo form_error('tenaga_laki') ?></label>
            <input type="text" class="form-control" name="tenaga_laki" id="tenaga_laki" placeholder="Jumlah Tenaga Kerja Laki-Laki" value="<?php echo $tenaga_laki; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lokasi Pemasaran Dalam Negeri <?php echo form_error('pemasaran_dalam') ?></label>
            <input type="text" class="form-control" name="pemasaran_dalam" id="pemasaran_dalam" placeholder="Lokasi Pemasaran Dalam Negeri" value="<?php echo $pemasaran_dalam; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Lokasi Pemasaran Luar Negeri<?php echo form_error('pemasaran_luar') ?></label>
            <input type="text" class="form-control" name="pemasaran_luar" id="pemasaran_luar" placeholder="Lokasi Pemasaran Luar Negeri" value="<?php echo $pemasaran_luar; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tahun <?php echo form_error('tahun') ?></label>
            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" readonly/>
        </div>
        <p align="center">
	    <input type="hidden" name="id_data_usaha" value="<?php echo $id_data_usaha; ?>" /> 
	    <button type="submit" class="btn btn-primary btn-flat">Submit</button> 
        <?php
         echo anchor(base_url('C_User/read_user/'.$id_umkm),'Cancel','class="btn btn-warning btn-flat"'); 
         ?>
        </p>
	</form>
    </body>

     <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.priceformat.min.js"></script>
</html>
