<!DOCTYPE html>
    <html>
    <head>
      <title>Cetak Data UMKM</title>
    </head>

    <section class="content-header">
      <table class="table">
      <tr><td width="150px" style="text-align:center"><img class="img-responsive img-box" src="./dist/img/logo.png" width="100" height="120" alt="User profile picture"> </td><td style="text-align:center" width="540 px"><big>PEMERINTAH KOTA SURAKARTA<br>DINAS KOPERASI DAN USAHA MIKRO KECIL MENENGAH</big><br>Alamat Jl. Yosodipuro No. 162, Surakarta, Telepon: (0271) 714890</td></tr>
      </table>  
      <hr> 

    </section>

        <p align="center" style="font-size:14pt"><b>Data UMKM Kota Surakarta</b></p>
        <p>
        <table class="table table-bordered table-striped" id="mytable" border="1">
            <thead>
                <tr>
                    <th width="40px">No</th>
		    <th>Nama Perusahaan</th>
		    <th>Nama Pimpinan</th>
		    <th width="200px">Alamat</th>
            <th>No. Hp</th>
            <th>Jenis Usaha</th>
		    <th>Spesifikasi Produk</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($c_dataumkm_data as $c_dataumkm)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $c_dataumkm->nama_perusahaan ?></td>
		    <td><?php echo $c_dataumkm->nama_pimpinan ?></td>
		    <td><?php echo $c_dataumkm->alamat ?></td>
            <td><?php echo $c_dataumkm->no_hp ?></td>
            <td><?php echo $c_dataumkm->nama_jenis_usaha ?></td>
		    <td><?php echo $c_dataumkm->spesifikasi_produk ?></td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </body>
</html>