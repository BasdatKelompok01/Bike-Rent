<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Update Stasiun</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
          <?php if(isset($msg) || validation_errors() !== ''): ?>
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                  <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
              </div>
            <?php endif; ?>
           
            <?php echo form_open(base_url('index.php/stasiun/edit/'.$stasiun['id_stasiun']), 'class="form-horizontal"' )?> 
            <div class="form-group">
                <label for="nama" class="col-sm-3 control-label">Nama</label>

                <div class="col-sm-9">
                <input type="text" name="nama" maxlength=50 value="<?php echo $stasiun['nama'];?>" id="nama" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label for="alamat" class="col-sm-3 control-label">Alamat</label>

                <div class="col-sm-9">
                <input type="text" name="alamat" maxlength=200 value="<?php echo $stasiun['alamat'];?>" id="alamat" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label for="latitude" class="col-sm-3 control-label">Latitude</label>

                <div class="col-sm-9">
                <input type="number" name="latitude" value="<?php echo number_format($stasiun['lat'],0,'','');?>" id="latitude" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label for="longitude" class="col-sm-3 control-label">Longitude</label>

                <div class="col-sm-9">
                <input type="number" name="longitude" value="<?php echo number_format($stasiun['long'],0,'','');?>" id="longitude" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-11 text-center">
                
                <input type="submit" name="submit" value="Update" class="btn btn-primary">
                <a href="<?= base_url('index.php/stasiun'); ?>" class="btn btn-default">Batal</a>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 
<script>
$("#stasiun").addClass('active');
$("#listStasiun").addClass('active');
</script>