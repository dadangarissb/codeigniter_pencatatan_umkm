<!DOCTYPE html>
<html lang="en">
<head>
    
</head><!--/head-->

<body class="homepage">

      <!-- Main component for a primary marketing message or call to action -->
<div >
    <div class="col-md-12">
      <div class="box box-success">
        <div class="nav-tabs-custom">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
                <body>
                  <h3 align="center"> Foto Produk </h3>
                   <?php if(empty($query)){ ?> <!-- jika data kosong kita tampilkan pesan -->
                      <p align="center"> Anda Belum Menambahkan Foto Produk </p>
                  <?php }
                  ?>
                  <p align="center">
                  <?php
                  echo anchor (site_url('C_User/add/'.$row['id_umkm']),'Tambah Foto','class="btn btn-success btn-flat"');

                  echo anchor (site_url('C_User/read_user/'.$row['id_umkm']),'Kembali','class="btn btn-warning btn-flat"');
                  
                  ?>
                </body>
              </div>
            </div>
          </div>
        </div>
      </div>

    </p>
    <br>
    <br>




  <table class="table table-bordered table-striped" >
    <?php if(empty($query)){ ?> <!-- jika data kosong kita tampilkan pesan -->
        <p align="center"> Anda Belum Menambahkan Foto Produk </p>
    <?php }

    else{
    foreach($query as $rowdata){ ?> <!-- menampilkan data dari query dengan looping -->

      <div class="col-sm-6 col-xs-6">
      
        <div class="panel panel-default">
          <div class="panel-thumbnail"><a href="#" title="Renovations"><img src="../../uploads/<?php echo $rowdata->nama_foto ?>" class="img-responsive"></a></div>
          <div class="panel-body">
            <p><?php  echo anchor(site_url('C_User/delete/'.$rowdata->id_foto),'Hapus Gambar','class="btn btn-danger btn-flat"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
        ?></p>
            <p></p>

          </div>
        </div><!--/panel-->
      </div><!--/col-->
    <?php }}?>
  </table>

</div>
</div>
<section id="bottom">
        
</section><!--/#bottom-->

        
    </body>
</html>