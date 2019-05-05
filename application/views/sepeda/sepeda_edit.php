<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Update Sepeda</h3>
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
           
            <?php echo form_open(base_url('penugasan/edit/'.$user['id']), 'class="form-horizontal"' )?> 
            <div class="form-group">
                <label for="merk" class="col-sm-3 control-label">Merk</label>

                <div class="col-sm-9">
                <input type="text" name="merk" value="BMX" id="merk" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label for="jenis" class="col-sm-3 control-label">Jenis</label>

                <div class="col-sm-9">
                <input type="text" name="jenis" value="Dewasa" id="jenis" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label for="status" class="col-sm-3 control-label">Status</label>

                <div class="col-sm-9">
                  <select name="status" class="form-control">
                    <option value="">-- Pilih --</option>
                    <option value="1" selected>Tersedia</option>
                    <option value="0">Tidak Tersedia</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="stasiun" class="col-sm-3 control-label">Stasiun</label>

                <div class="col-sm-9">
                  <select name="stasiun" class="form-control">
                    <option value="">-- Pilih Stasiun --</option>
                    <option value="1" selected>123123 - Stasiun Basdat Depok 1</option>
                    <option value="0">321321 - Stasiun Basdat Depok 2</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="penyumbang" class="col-sm-3 control-label">Penyumbang</label>

                <div class="col-sm-9">
                  <select name="penyumbang" class="form-control">
                    <option value="">-- Pilih Penyumbang --</option>
                    <option value="1" selected>111111 - Toni</option>
                    <option value="0">222222 - Sucipto</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-11 text-center">
                
                <input type="submit" name="submit" value="Ubah" class="btn btn-primary">
                <a href="<?= base_url('sepeda'); ?>" class="btn btn-default">Batal</a>
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
$("#sepeda").addClass('active');
$("#listSepeda").addClass('active');
</script>