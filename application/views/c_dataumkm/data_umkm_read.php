<section class="content-header">

</section>

    <div class="col-md-12">
        <div class="nav-tabs-custom">
          <div class="tab-content">
                <body>
                  <h4 align="center"> Profil Lengkap <br>Usaha Mikro Kecil Menengah (UMKM) </h4>                
                </body>
            </div>
          </div>
      </div>

  <!-- Main content -->
<section class="content" style="font-size:11pt">
  <div class="row">
    <div class="col-md-3">
      <!-- Profile Image -->
      <div class="box box-success">
        <div class="box-body box-profile">
          <?php
                    if($dataumkm['foto_pimpinan']!==''){
                      $masuk= array(
                        'src' =>'./foto_pimpinan/'.$dataumkm['foto_pimpinan'] ,
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
          <h5 class="profile-username text-center"><?php echo $dataumkm['nama_pimpinan']; ?></h5>
          <p class="text-center">Pimpinan Peursahaan</p>
        </div>
      </div>

      <div class="box box-success">
        <div class="box-header with-border" align="center">
          <div class="btn-group-vertical">
            <?php
		        echo anchor(site_url('Upload/show/'.$dataumkm['id_umkm']),' Gambar Produk','class="btn btn-primary btn-flat"'); 
			       ?>
          </div>
          
          <div class="box-header with-border" align="center">
            <?php
            echo anchor(site_url('C_DataUmkm/Cetak/'.$dataumkm['id_umkm']),' Cetak Data','class="btn btn-danger btn-flat" '); 
             ?>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-9">
      <div class="box box-success">
                  <table class="table" border="0">
              	    <tr><td width="50"></td><td width="250">Nama Perusahaan</td><td><?php echo ": ".$dataumkm['nama_perusahaan']; ?></td>
              	    <tr><td><td>Nama Pimpinan</td><td><?php echo ": ".$dataumkm['nama_pimpinan']; ?></td></tr>
              	    <tr><td></td><td>No Ktp</td><td><?php echo ": ".$dataumkm['no_ktp']; ?></td></tr>
                    <tr><td></td><td>Email</td><td><?php echo ": ".$dataumkm['email']; ?></td></tr>
                    <tr><td></td><td>No Hp</td><td><?php echo ": ".$dataumkm['no_hp']; ?></td></tr>
              	    <tr><td></td><td>Alamat</td><td><?php echo ": ".$dataumkm['alamat']; ?></td></tr>
                    <tr><td></td><td>Kelurahan</td><td><?php echo ": ".$dataumkm['nama_kelurahan']; ?></td></tr>
                    <tr><td></td><td>Kecamatan</td><td><?php echo ": ".$dataumkm['nama_kecamatan']; ?></td></tr>
              	    <tr><td></td><td>Jenis Usaha</td><td><?php echo ": ".$dataumkm['nama_jenis_usaha']; ?></td></tr>
              	    <tr><td></td><td>Spesifikasi Produk</td><td><?php echo ": ".$dataumkm['spesifikasi_produk']; ?></td></tr>
              	    <tr><td></td><td>Bahan Baku</td><td><?php echo ": ".$dataumkm['bahan_baku']; ?></td></tr>
              	    <tr><td></td><td>Permasalahan</td><td><?php echo ": ".$dataumkm['permasalahan']; ?></td></tr>

              	    <tr><td></td><td>Nomor SIUP</td><td><?php echo ": ".$dataumkm['no_siup']; ?></td></tr>
              	    <tr><td></td><td>Nomor NPWP</td><td><?php echo ": ".$dataumkm['no_npwp']; ?></td></tr>
              	    <tr><td></td><td>Nomor TDP</td><td><?php echo ": ".$dataumkm['no_tdp']; ?></td></tr>
              	    <tr><td></td><td>Nomor PIRT</td><td><?php echo ": ".$dataumkm['pirt']; ?></td></tr>
              	    <tr><td></td><td>Nomor Halal</td><td><?php echo ": ".$dataumkm['halal']; ?></td></tr>
              	    <tr><td></td><td>Nomor HKI</td><td><?php echo ": ".$dataumkm['hki']; ?></td></tr>
              	  </table>   
      </div>
    </div>

    <div class="col-md-12">
      <div class="box box-success">
        <div class="nav-tabs-custom">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
                <body>
                  <h3 align="center"> Riwayat Pameran UMKM </h3>
                  <p align="center">

                  <?php if(empty($pengajuan_pameran['row3'])){ ?> <!-- jika data kosong kita tampilkan pesan -->
                   (Belum Pernah Mengajukan Menjadi Peserta Pameran)
                   </p>      
                  <?php }
                  else{
                  ?>
                
                  <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                      <tr>
                        <th width="40px">No</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Nama Pameran</th>
                        <th>Tempat</th>
                        <th>Status</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                      $start = 0;
                      foreach ($pengajuan_pameran['row3'] as $row)
                      {
                      ?>
                      <tr>
                        <td><?php echo ++$start ?></td>
                        <td><?php echo $row->tgl_pameran ?></td>
                        <td><?php echo $row->nama_pameran ?></td>
                        <td><?php echo $row->tempat ?></td>
                        <td><?php echo $row->status ?></td>
                      </tr>
                      <?php
                      }
                      ?>
                   </tbody>
                  </table>
                      <?php
  }
  ?>
                </body>
              </div>
            </div>
          </div>
        </div>
      </div>

        
    <div class="col-md-12">
			<div class="box box-success">
        <div class="nav-tabs-custom">
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
            		<body>
		              <h3 align="center"> Data Usaha Tahunan </h3>
                  <div class="col-md-12" align="center">
                                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                  <p>
                  </p>
                  <p>
                  </p>
                  </div>

		              <p align="center">
		              <?php
		              echo anchor(site_url('c_datausaha/create/'.$dataumkm['id_umkm']),'Tambah Data Tahunan','class="btn btn-success btn-flat"'); 
			             ?>
			            </p>
                
                	<table class="table table-bordered table-striped" id="mytable">
                    <thead>
                      <tr>
                        <th width="40px">No</th>
		                    <th>Tahun</th>
		                    <th>Kapasitas Produk</th>
		                    <th>Asset</th>
		                    <th>Omset</th>
		                    <th>Tenaga Wanita</th>
		                    <th>Tenaga Laki-Laki</th>
		                    <th>Pemasaran Dalam Negeri</th>
		                    <th>Pemasaran Luar Negeri</th>
		                    <th>Action</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php
                      $start = 0;
                      foreach ($datausaha['row2'] as $c_datausaha)
                      {
                      ?>
                      <tr>
		                    <td><?php echo ++$start ?></td>
		                    <td><?php echo $c_datausaha->tahun ?></td>
                		    <td><?php echo $c_datausaha->kapasitas_produk ?></td>
                		    <td width="130px"><?php echo "Rp ".number_format($c_datausaha->asset,'0',',','.') ?></td>
                		    <td width="130px"><?php echo "Rp ".number_format($c_datausaha->omset,'0',',','.') ?></td>
                		    <td width="70px"><?php echo $c_datausaha->tenaga_wanita ?> Orang</td>
                		    <td width="70px"><?php echo $c_datausaha->tenaga_laki ?> Orang</td>
                		    <td><?php echo $c_datausaha->pemasaran_dalam ?></td>
                		    <td><?php echo $c_datausaha->pemasaran_luar ?></td>
                		    <td style="text-align:center" width="170px">
                        <div class="btn-group">
    			                <?php 
                    			echo anchor(site_url('C_DataUsaha/update_data_usaha/'.$c_datausaha->id_data_usaha),'Edit','class="btn btn-info btn-flat"'); 
              
                    			echo anchor(site_url('C_DataUsaha/delete_data_usaha/'.$c_datausaha->id_data_usaha),'Delete','class="btn btn-danger btn-flat " onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                    			?>
		                    </td>
                        </div>
	                    </tr>
                      <?php
                      }
                      ?>
                   </tbody>
                  </table>
                </body>
              </div>
            </div>
          </div>
        </div>
      </div>
    	
      <p align="center"><input type="button" class="btn btn-warning btn-flat" value="Kembali" onclick="history.back(-1)" /></p>