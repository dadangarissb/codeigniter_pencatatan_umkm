<!DOCTYPE html>
<html lang="en">
<section class="content-header">

</section>
      <!-- Main component for a primary marketing message or call to action -->

  <div class="panel-heading"><h3 align="center">Form Upload Image</h3></div>
  <div class="panel-body">
  <?=$this->session->flashdata('pesan')?>
     <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
       <table class="table table-striped">
         <tr>
          <td style="width:15%;">File Foto</td>
            <td>
            <div class="col-sm-6">
                <input type="file" name="filefoto">
                <input type="hidden" name="id_umkm" value="<?php echo $id_umkm; ?>" required/> 
            </div>
            </td>
         </tr>
          <tr>
          <tr>
         </tr>
         <tr>
          <td colspan="2">
            <input type="submit" class="btn btn-primary btn-flat" value="Simpan">
            <?php
            echo anchor(site_url('C_User/Show/'.$id_umkm),'Cancel','class="btn btn-warning btn-flat"'); 
            ?>
          </td>
         </tr>
       </table>
     </form>
    </div>
    </div>
  <section id="bottom">
        
  </section><!--/#bottom-->


    </body>
</html>