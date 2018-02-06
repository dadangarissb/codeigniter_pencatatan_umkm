<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
    </head>
    <body>

     <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
<div class="form-group">
        <h2 style="margin-top:0px">Detail Pameran</h2>
        <table class="table">
	    <tr><td>Nama Pameran</td><td><?php echo $pameran['nama_pameran']; ?></td></tr>
	    <tr><td>Tempat</td><td><?php echo $pameran['tempat']; ?></td></tr>
	    <tr><td>Tgl Pameran</td><td><?php echo date("d F Y",strtotime($pameran['tgl_pameran'])); ?></td></tr>
	    <!-- <tr><td>Kuota Peserta</td><td><?php echo $pameran['kuota_peserta']; ?></td></tr> -->
	</table>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </section>

 <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
            <div class="form-group">
    <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Data Pendaftar</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('c_pengajuan_pameran/create/'.$pameran['id_pameran']), 'Create', 'class="btn btn-primary btn-flat"'); ?>
            </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
            <th>Nama UMKM</th>
            <th>Tgl Pengajuan</th>
            <th>Status</th>
            <th>Ubah Status</th>
            <th>Action</th>
                </tr>
            </thead>
        <tbody>
            <?php
            $start = 0;
            foreach ($pengajuan_pameran['row2'] as $c_pengajuan_pameran)
            {
                ?>
                <tr>
            <td width="20"><?php echo ++$start ?></td>
            <td width="300"><?php echo $c_pengajuan_pameran->nama_perusahaan ?></td>
            <td width="200"><?php echo date("d F Y",strtotime($c_pengajuan_pameran->tgl_pengajuan)); ?></td>
            <th width="80"><?php echo $c_pengajuan_pameran->status ?></th>
            <th style="text-align:center" width="150px">

            <?php 

            if($c_pengajuan_pameran->status=='Ditolak'){
                echo anchor(base_url('c_pengajuan_pameran/update_action/'.$c_pengajuan_pameran->id_pengajuan),'Terima Pengajuan','class="btn btn-success btn-flat"'); 
            }

            else
            {
                echo anchor(base_url('c_pengajuan_pameran/update_action2/'.$c_pengajuan_pameran->id_pengajuan),'Tolak Pengajuan','class="btn btn-danger btn-flat" disabled'); 
            }

            ?>

            </th>
            <td style="text-align:center" width="300px">
            <div class="btn-group">
            <?php 
            echo anchor(site_url('c_DataUmkm/read/'.$c_pengajuan_pameran->id_umkm),'Lihat Profil UMKM','class="btn btn-info btn-flat"'); 
            echo anchor(site_url('c_pengajuan_pameran/delete/'.$c_pengajuan_pameran->id_pengajuan),'Delete',' class="btn btn-danger btn-flat" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
            ?>
            </div>
            </td>
            </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    </section>

     <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
<div class="form-group">

    <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Data Peserta Pameran</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                   
                </div>
            </div>
            <div class="col-md-4 text-right">
               
            </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
            <th>Nama Umkm</th>
            <th>Nama Pameran</th>
            <th>Penjualan Barang</th>
            <th>Order Barang</th>
            <th>Action</th>
                </tr>
            </thead>
        <tbody>
            <?php
            $start = 0;
            foreach ($peserta_pameran['row3'] as $c_peserta_pameran)
            {
                ?>
                <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $c_peserta_pameran->nama_perusahaan ?></td>
            <td><?php echo $c_peserta_pameran->nama_pameran ?></td>
            <td><?php echo "Rp ".number_format($c_peserta_pameran->penjualan_barang,'0',',','.') ?></td>
            <td><?php echo "Rp ".number_format($c_peserta_pameran->order_barang,'0',',','.') ?></td>
            <td style="text-align:center" width="200px">
            <?php 
            echo anchor(site_url('c_peserta_pameran/update_data/'.$c_peserta_pameran->id_peserta),'Edit','class="btn btn-success btn-flat"'); 
            echo anchor(site_url('c_peserta_pameran/delete/'.$c_peserta_pameran->id_peserta),'Delete','class="btn btn-danger btn-flat" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
            ?>
            </td>
            </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        </div>
        </div>
        </form>
        </div>
        </div>
        </div>
        </section>
               <p align="center"><a href="<?php echo site_url('c_pameran') ?>" class="btn btn-default btn-flat">Kembali</a></p>
</html>