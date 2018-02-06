<!doctype html>
<html>
    <head>
        <title>Tambah Data UMKM</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>

    <body>
    <section class="content-header">

</section>

      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

<div class="col-md-12">
        <div class="nav-tabs-custom">
          <div class="tab-content" style="background-color:skyblue">
                <!-- <body>
                  <h4 align="center" style="font-size:16pt"><b> <?php echo $button; ?> Data UMKM </b></h4>                
                </body> -->
            </div>
          </div>
      </div>

      <section class="content">
      <p align="center" style="font-size:16pt">
          <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
      </p> 
        <div class="row">
          <div class="col-md-7">
            <div class="box box-primary">
              <form role="form">
               <div class="box-body">
                <div class="form-group">

               

                <br>
                <br>
                  <label for="varchar">Nama Perusahaan <?php echo form_error('nama_perusahaan') ?></label>
                  <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama Perusahaan" value="<?php echo $nama_perusahaan; ?>" />
                </div>
                <div class="form-group">
                  <label for="varchar">Nama Pimpinan <?php echo form_error('nama_pimpinan') ?></label>
                  <input type="text" class="form-control" name="nama_pimpinan" id="nama_pimpinan" placeholder="Nama Pimpinan" value="<?php echo $nama_pimpinan; ?>" />
                </div>
                <div class="form-group">
                <input type="hidden" name="foto_lama" value="<?php echo $foto_pimpinan?>">
                  <label for="varchar">Foto Pimpinan <?php echo form_error('foto_pimpinan') ?></label>
                  <?php
                    if($foto_pimpinan!==''){
                      $masuk= array(
                        'src' =>'./foto_pimpinan/'.$foto_pimpinan ,
                        'alt' => 'foto pimpinan',
                        'class' => 'img-responsive img-thumbnail',
                        'width' => '720px',
                        'rel' => '',
                      );
                      echo img($masuk);
                    }
                    else{
                      echo " ";
                    }
    
                  
                  ?>
                  <input type="file" name="foto_pimpinan" value="<?php echo $foto_pimpinan ?>" >
                </div>
                <div class="form-group">
                  <label for="int">No Ktp <?php echo form_error('no_ktp') ?></label>
                  <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="No Ktp" value="<?php echo $no_ktp; ?>" />
                </div>
                <div class="form-group">
                  <label for="int">Email <?php echo form_error('email') ?></label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="email" value="<?php echo $email; ?>" />
                </div>
                <div class="form-group">
                  <label for="int">No Hp<?php echo form_error('no_hp') ?></label>
                  <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="no hp" value="<?php echo $no_hp; ?>" />
                </div>
                <div class="form-group">
                  <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                  <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
                </div>
                <div class="form-group">
                  <label for="varchar">Kelurahan <?php echo form_error('kelurahan') ?></label>
                  <?php
                  foreach($kelurahan as $row)
                      {
                          $options[$row->id_kelurahan] = $row->nama_kelurahan.' kecamatan '.$row->nama_kecamatan;
                      }
                      
                      echo form_dropdown('id_kelurahan', $options, $id_jenis_usaha, array('class' => 'form-control'));
                      ?>
                </div>

                <div class="form-group">
                  <label for="varchar">Jenis Usaha <?php echo form_error('id_jenis_usaha') ?></label>
                  <?php
                  foreach($jenis as $row)
                      {
                          $options2[$row->id_jenis_usaha] = $row->nama_jenis_usaha;
                      }
                      
                      echo form_dropdown('id_jenis_usaha', $options2, $id_jenis_usaha, array('class' => 'form-control'));
                      ?>
                </div>

                <div class="form-group">
                  <label for="varchar">Spesifikasi Produk <?php echo form_error('spesifikasi_produk') ?></label>
                  <input type="text" class="form-control" name="spesifikasi_produk" id="spesifikasi_produk" placeholder="Spesifikasi Produk" value="<?php echo $spesifikasi_produk; ?>" />
                </div>
                <div class="form-group">
                  <label for="varchar">Bahan Baku <?php echo form_error('bahan_baku') ?></label>
                  <input type="text" class="form-control" name="bahan_baku" id="bahan_baku" placeholder="Bahan Baku" value="<?php echo $bahan_baku; ?>" />
                </div>
                <div class="form-group">
                  <label for="varchar">Permasalahan <?php echo form_error('permasalahan') ?></label>
                  <input type="textarea" class="form-control" name="permasalahan" id="permasalahan" placeholder="Permasalahan" value="<?php echo $permasalahan; ?>" />
                </div>
                <input type="hidden" name="id_umkm" value="<?php echo $id_umkm; ?>" />
              </div>
            </div>
          </div>

          <div class="col-md-5">
            <div class="box box-primary">
              <form role="form">
                <div class="box-body">
                  <div class="form-group">
                    <label for="varchar">No Siup <?php echo form_error('no_siup') ?></label>
                    <input type="text" class="form-control" name="no_siup" id="no_siup" placeholder="No Siup" value="<?php echo $no_siup; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="varchar">No Npwp <?php echo form_error('no_npwp') ?></label>
                    <input type="text" class="form-control" name="no_npwp" id="no_npwp" placeholder="No Npwp" value="<?php echo $no_npwp; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="varchar">No Tdp <?php echo form_error('no_tdp') ?></label>
                    <input type="text" class="form-control" name="no_tdp" id="no_tdp" placeholder="No Tdp" value="<?php echo $no_tdp; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="varchar">Pirt <?php echo form_error('pirt') ?></label>
                    <input type="text" class="form-control" name="pirt" id="pirt" placeholder="Pirt" value="<?php echo $pirt; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="varchar">Halal <?php echo form_error('halal') ?></label>
                    <input type="text" class="form-control" name="halal" id="halal" placeholder="Halal" value="<?php echo $halal; ?>" />
                  </div>
                  <div class="form-group">
                    <label for="varchar">Hki <?php echo form_error('hki') ?></label>
                    <input type="text" class="form-control" name="hki" id="hki" placeholder="Hki" value="<?php echo $hki; ?>" />
                  </div>
              <!-- /.box-body -->
	             </form>
              </body>

      <button type="submit" class="btn btn-primary">Simpan</button> 
      <a href="<?php echo site_url('c_dataumkm') ?>" class="btn btn-default">Cancel</a>


      <script src="<?php echo base_url();?>dist/js/jquery-2.1.1.js"></script>
      <script>

</script>
