<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Update Acara</h3>
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
           
            <?php echo form_open(base_url('acara/edit/'.$user['id']), 'class="form-horizontal"' )?> 
              
            <div class="form-group">
                <label for="lastname" class="col-sm-3 control-label">Judul</label>

                <div class="col-sm-9">
                  <input type="text" name="judul" id="judul" class="form-control" value="Ulang Tahun ShareBike">   
                </div>
              </div>

              <div class="form-group">
                <label for="lastname" class="col-sm-3 control-label">Deskripsi</label>

                <div class="col-sm-9">
                  <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="Game-game">   
                </div>
              </div>

            <div class="form-group">
                <label for="gratis" class="col-sm-3 control-label">Gratis</label>

                <div class="col-sm-9">
                  <select name="gratis" class="form-control">
                    <option value="">-- Pilih --</option>
                    <option value="1" selected>Ya</option>
                    <option value="0">Tidak</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">Tanggal Mulai</label>

                <div class="col-sm-9">
                  <input type="text" name="tglMulai" id="tglMulai" value="15-04-2019" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
              </div>

              <div class="form-group">
                <label for="lastname" class="col-sm-3 control-label">Tanggal Selesai</label>

                <div class="col-sm-9">
                <input type="text" name="tglSelesai" id="tglSelesai" value="15-04-2019" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                </div>
              </div>

              <div class="form-group">
                <label for="role" class="col-sm-3 control-label">Stasiun</label>

                <div class="col-sm-9">
                  <select name="stasiun" class="form-control">
                    <option value="">--Pilih Stasiun--</option>
                    <option value="1" selected>123123 - Stasiun Basdat Depok 1</option>
                    <option value="0">321321 - Stasiun Basdat Depok 2</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <div class="col-md-11 text-center">
                
                <input type="submit" name="submit" value="Ubah" class="btn btn-primary">
                <a href="<?= base_url('acara'); ?>" class="btn btn-default">Batal</a>
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
$("#acara").addClass('active');
$("#listAcara").addClass('active');
</script>