    <!DOCTYPE html>
    <html>
    <head>
      <title>Cetak Data UMKM</title>
    <style>
     .page { width: 100%; height: 100%; }

   </style>
    </head>

    <body class="page">
      <table class="table">
      <tr><td width="150px" style="text-align:center"><img class="img-responsive img-box" src="./dist/img/logo.png" width="100" height="120" alt="User profile picture"> </td><td style="text-align:center" width="540 px"><big>PEMERINTAH KOTA SURAKARTA<br>DINAS KOPERASI DAN USAHA MIKRO KECIL MENENGAH</big><br>Alamat Jl. Yosodipuro No. 162, Surakarta, Telepon: (0271) 714890</td></tr>
      </table>  
      <hr> 


      <h2 align="center">
        Profile Lengkap UMKM
      </h2>

      <table class="table">
	    <tr><td width="60px">-</td><td width="200px">Nama Perusahaan</td><td><?php echo " : ".$dataumkm['nama_perusahaan']; ?></td></tr>
	    <tr><td></td><td>Nama Pimpinan</td><td><?php echo " : ".$dataumkm['nama_pimpinan']; ?></td></tr>
	    <!--<tr><td>Foto Pimpinan</td><td><?php echo $dataumkm['foto_pimpinan']; ?></td></tr>-->
	    <tr><td></td><td>No Ktp</td><td><?php echo " : ".$dataumkm['no_ktp']; ?></td></tr>
      <tr><td></td><td>Email</td><td><?php echo " : ".$dataumkm['email']; ?></td></tr>
      <tr><td></td><td>No Hp</td><td><?php echo " : ".$dataumkm['no_hp']; ?></td></tr>
	    <tr><td></td><td>Alamat</td><td><?php echo " : ".$dataumkm['alamat']; ?></td></tr>
      <tr><td></td><td>Kelurahan</td><td><?php echo " : ".$dataumkm['nama_kelurahan']; ?></td></tr>
      <tr><td></td><td>Kecamatan</td><td><?php echo " : ".$dataumkm['nama_kecamatan']; ?></td></tr>
	    <tr><td></td><td>Jenis Usaha</td><td><?php echo " : ".$dataumkm['nama_jenis_usaha']; ?></td></tr>
	    <tr><td></td><td>Spesifikasi Produk</td><td><?php echo " : ".$dataumkm['spesifikasi_produk']; ?></td></tr>
	    <tr><td></td><td>Bahan Baku</td><td><?php echo " : ".$dataumkm['bahan_baku']; ?></td></tr>
	    <tr><td></td><td>Permasalahan</td><td><?php echo " : ".$dataumkm['permasalahan']; ?></td></tr>
      <tr><td></td><td>Nomor SIUP</td><td><?php echo " : ".$dataumkm['no_siup']; ?></td></tr>
      <tr><td></td><td>Nomor NPWP</td><td><?php echo " : ".$dataumkm['no_npwp']; ?></td></tr>
      <tr><td></td><td>Nomor TDP</td><td><?php echo " : ".$dataumkm['no_tdp']; ?></td></tr>
      <tr><td></td><td>Nomor PIRT</td><td><?php echo " : ".$dataumkm['pirt']; ?></td></tr>
      <tr><td></td><td>Nomor Halal</td><td><?php echo " : ".$dataumkm['halal']; ?></td></tr>
      <tr><td></td><td>Nomor HKI</td><td><?php echo " : ".$dataumkm['hki']; ?></td></tr>
      </table>   
      

                  <h3 align="center"> Riwayat Pameran UMKM </h3>
                  <p align="center">

                  <?php if(empty($pengajuan_pameran['row3'])){ ?> <!-- jika data kosong kita tampilkan pesan -->
                   (Belum Pernah Mengajukan Menjadi Peserta Pameran)
                   </p>      
                  <?php }
                  else{
                  ?>
                
                  <table class="table table-bordered table-striped" id="mytable" border="1" align="center">
                    <thead>
                      <tr>
                        <th width="40px">No</th>
                        <th width="120px">Tanggal Pengajuan</th>
                        <th width="190px">Nama Pameran</th>
                        <th width="200px">Tempat</th>
                        <th width="120px">Status</th>
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
                  }?>

        <p><br></p>
		    <h2 align="center"> Data Usaha Tahunan </h2>
        <h2></h2>
	     <table class="table table-bordered table-striped" id="mytable" border="1 px">
          <thead>
            <tr>
              <th width="30px">No</th>
		          <th style="text-align:center" width="40px">Tahun</th>
		          <th width="90px">Kapasitas Produksi</th>
		          <th>Asset</th>
		          <th>Omset</th>
		          <th>Tenaga Wanita</th>
		          <th>Tenaga Laki</th>
		          <th>Pemasaran Dalam Negeri</th>
		          <th>Pemasaran Luar Negeri</th>
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
		          <td style="text-align:center"><?php echo $c_datausaha->tahun ?></td>
		          <td><?php echo $c_datausaha->kapasitas_produk ?></td>
		          <td><?php echo "Rp ".number_format($c_datausaha->asset,'0',',','.') ?></td>
		          <td><?php echo "Rp ".number_format($c_datausaha->omset,'0',',','.') ?></td>
		          <td><?php echo $c_datausaha->tenaga_wanita." Orang" ?></td>
		          <td><?php echo $c_datausaha->tenaga_laki." Orang" ?></td>
		          <td><?php echo $c_datausaha->pemasaran_dalam ?></td>
		          <td><?php echo $c_datausaha->pemasaran_luar ?></td>
	          </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
    </body>
</html>