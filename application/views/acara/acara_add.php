<!-- daterange picker -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2/select2.min.css">
  
  <section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Form Penambahan Acara</h3>
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
           
            <?php echo form_open(base_url('index.php/acara/add'), 'class="form-horizontal"');  ?> 

            <div class="form-group">
                <label for="judul" class="col-sm-3 control-label">Judul</label>

                <div class="col-sm-9">
                  <input type="text" name="judul" id="judul" maxlength=100 class="form-control">   
                </div>
              </div>

              <div class="form-group">
                <label for="deskripsi" class="col-sm-3 control-label">Deskripsi</label>

                <div class="col-sm-9">
                  <input type="text" name="deskripsi" id="deskripsi" maxlength=200 class="form-control">   
                </div>
              </div>

            <div class="form-group">
                <label for="gratis" class="col-sm-3 control-label">Gratis</label>

                <div class="col-sm-9">
                  <select name="gratis" class="form-control">
                    <option value="">-- Pilih --</option>
                    <option value=1>Ya</option>
                    <option value=0>Tidak</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="tglMulai" class="col-sm-3 control-label">Tanggal Mulai</label>

                <div class="col-sm-9">
                  <input type="text" name="tglMulai" id="tglMulai" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                </div>
              </div>

              <div class="form-group">
                <label for="tglSelesai" class="col-sm-3 control-label">Tanggal Selesai</label>

                <div class="col-sm-9">
                <input type="text" name="tglSelesai" id="tglSelesai" class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
                </div>
              </div>

              <div class="form-group">
                <label for="stasiun[]" class="col-sm-3 control-label">Stasiun</label>

                <div class="col-sm-9">
                  <?= form_multiselect('stasiun[]', $stasiuns, '', 'class="form-control"'); ?>
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-md-11 text-center">
                  <input type="submit" name="submit" value="Submit" class="btn btn-info">
                </div>
              </div>
            <?php echo form_close( ); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 

<!-- Select2 -->
<script src="<?= base_url() ?>public/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url() ?>public/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url() ?>public/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?= base_url() ?>public/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?= base_url() ?>public/plugins/iCheck/icheck.min.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //$('.datetimemask').val(new Date());
  
    $('.datetimemask').inputmask("datetime",{
      mask: "1-2-y h:s", 
      placeholder: "dd-mm-yyyy hh:mm", 
      leapday: "-02-29", 
      separator: "-", 
      alias: "dd-mm-yyyy"
    });
    
    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>

<script>
$("#acara").addClass('active');
$("#addAcara").addClass('active');
</script>    