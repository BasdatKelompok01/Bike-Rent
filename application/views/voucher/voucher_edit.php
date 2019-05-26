<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Update Voucher</h3>
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
           
            <?php echo form_open(base_url('index.php/voucher/edit/'.$voucher['id_voucher']), 'class="form-horizontal"' )?> 

            <div class="form-group">
                <label for="nama" class="col-sm-3 control-label">Nama</label>

                <div class="col-sm-9">
                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $voucher['nama'];?>">
                </div>
              </div>

              <div class="form-group">
                <label for="kategori" class="col-sm-3 control-label">Kategori</label>

                <div class="col-sm-9">
                <input type="text" name="kategori" id="kategori" class="form-control" value="<?php echo $voucher['kategori'];?>">
                </div>
              </div>

              <div class="form-group">
                <label for="poin" class="col-sm-3 control-label">Nilai Poin</label>

                <div class="col-sm-9">
                <input type="number" name="poin" id="poin" class="form-control" value="<?php echo $voucher['nilai_poin'];?>">
                </div>
              </div>

              <div class="form-group">
                <label for="deskripsi" class="col-sm-3 control-label">Deskripsi</label>

                <div class="col-sm-9">
                <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="<?php echo $voucher['deskripsi'];?>">
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-11 text-center">
                
                <input type="submit" name="submit" value="Update" class="btn btn-primary">
                <a href="<?= base_url('index.php/voucher'); ?>" class="btn btn-default">Batal</a>
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
$("#voucher").addClass('active');
$("#listVoucher").addClass('active');
</script>