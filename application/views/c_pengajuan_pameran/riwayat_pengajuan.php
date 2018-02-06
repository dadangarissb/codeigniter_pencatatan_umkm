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
<h3 align="center">Riwayat Pengajuan Pameran Produk UMKM</h3>
<br>
<table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="40px">No</th>
            <th>Nama Perusahaan</th>
            <th>Nama Pameran</th>
            <th>Tanggal Pengajuan</th>
            <th>Status Pengajuan</th>
            <th width="150px">Action</th>
                </tr>
            </thead>
        <tbody>
            <?php
            $start = 0;
            foreach ($riwayat_pengajuan as $row)
            {
                ?>
                <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $row->nama_perusahaan ?></td>
            <td><?php echo $row->nama_pameran ?></td>
            <td><?php echo $row->tgl_pengajuan ?></td>
            <td><?php echo $row->status ?></td>
            <td><?php echo anchor(site_url('c_dataumkm/read/'.$row->id_umkm),'Lihat Profil UMKM','class="btn btn-info btn-flat"');
            ?>
            </td>
            </tr>
                <?php
            }
            ?>
            </tbody>
        </table>