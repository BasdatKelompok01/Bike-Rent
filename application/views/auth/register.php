<!DOCTYPE html>
<html lang="en">
    <head>
          <title><?=isset($title)?$title:'Bike Rent Register' ?></title>
          <!-- Tell the browser to be responsive to screen width -->
          <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
          <!-- Bootstrap 3.3.6 -->
          <link rel="stylesheet" href="<?= base_url() ?>public/bootstrap/css/bootstrap.min.css">
          <!-- Theme style -->
          <link rel="stylesheet" href="<?= base_url() ?>public/dist/css/AdminLTE.min.css">
           <!-- Custom CSS -->
          <link rel="stylesheet" href="<?= base_url() ?>public/dist/css/style.css">
           <!-- jQuery 2.2.3 -->
          <script src="<?= base_url() ?>public/plugins/jQuery/jquery-2.2.3.min.js"></script>
          <!-- Tell the browser to be responsive to screen width -->
		  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		  <!-- Bootstrap 3.3.6 -->
		  <link rel="stylesheet" href="<?= base_url() ?>public/ciadminlte/public/bootstrap/css/bootstrap.min.css">
		  <!-- Font Awesome -->
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
		  <!-- Ionicons -->
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
		  <!-- Theme style -->
	      <link rel="stylesheet" href="<?= base_url() ?>public/ciadminlte/public/dist/css/AdminLTE.min.css">
	       <!-- Custom CSS -->
		  <link rel="stylesheet" href="<?= base_url() ?>public/ciadminlte/public/dist/css/style.css">
		  <!-- AdminLTE Skins. Choose a skin from the css/skins. -->
		  <link rel="stylesheet" href="<?= base_url() ?>public/ciadminlte/public/dist/css/skins/skin-blue.min.css">
		  <!-- jQuery 2.2.3 -->
		  <script src="<?= base_url() ?>public/ciadminlte/public/plugins/jQuery/jquery-2.2.3.min.js"></script>
		  <!-- jQuery UI 1.11.4 -->
		  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
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
       
    </head>
<body style="background: #e8e8ea; ">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
            <div class="login-title">
                <img src="<?= base_url() ?>public/dist/img/logo.png" alt="BikeRent" width=300>
                    <!-- <h3><span>BikeRent</span></h3> -->
                </div>
                <br>
                <?php if(isset($msg) || validation_errors() !== ''): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    <?= validation_errors();?>
                    <?= isset($msg)? $msg: ''; ?>
                </div>
                <?php endif; ?>
                <div class="form-box">
                    <div class="caption">
                        <h4>FORM PENDAFTARAN PENGGUNA</h4>
                    </div>
                    <?php echo form_open(base_url('index.php/auth/register'), 'class="login-form" '); ?>                    
                        <div class="input-group">
                            <select name="role" id="role" class="form-control" placeholder="Role">
                                <option value="">-- Pilih Role --</option>
                                <option value="Petugas">Petugas</option>
                                <option value="Anggota">Anggota</option>
                            </select>
                            <input type="number" name="nomorKTP" id="nomorKTP" class="form-control" placeholder="Nomor KTP">
                            <input type="text" name="namaLengkap" id="namaLengkap" class="form-control" placeholder="Nama Lengkap">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            <input type="text" name="tglLahir" id="tglLahir" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="" placeholder="Tanggal Lahir">
                            <input type="number" name="nomorTelepon" id="nomorTelepon" class="form-control" placeholder="Nomor Telepon">
                            <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Alamat"></textarea>&nbsp;
                            <input type="submit" name="submit" id="submit" class="form-control" value="Register">
                        </div>
                    <?php echo form_close(); ?>
                    <br>
                    <div class="form inline">
                    Sudah mempunyai akun ? <a href="<?php echo base_url() ?>index.php/auth/login">LOGIN</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

    <!-- Bootstrap 3.3.6 -->
	<script src="<?= base_url() ?>public/ciadminlte/public/bootstrap/js/bootstrap.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url() ?>public/ciadminlte/public/dist/js/app.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?= base_url() ?>public/ciadminlte/public/dist/js/demo.js"></script>
	<!-- page script -->
	<script type="text/javascript">
	  $(".flash-msg").fadeTo(2000, 500).slideUp(500, function(){
	    $(".flash-msg").slideUp(500);
	});
    </script>
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

    <style type="text/css">
    .login-title{
        padding-top: 10px;
    }
    .login-title span{
        font-size: 30px;
        line-height: 1.9;
        display: block;
        font-weight: 700;
    }
    .form-box{
        position: relative;
        background: #ffffff;
        max-width: 600px;
        width: 100%;
        border-top: 5px solid #33b5e5;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }

    .caption{
        margin-bottom:40px;
    }
    .login-form input[type=text], .login-form input[type=password], .login-form input[type=number], .login-form input[type=email], #role{
        margin-bottom:10px;
    }

    .login-form input {
        outline: none;
        display: block;
        width: 100%;
        border: 1px solid #d9d9d9;
        margin: 0 0 20px;
        padding: 10px 15px;
        box-sizing: border-box;
        border-radius: 0;
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
        min-height: 40px;
        font-wieght: 400;
        -webkit-transition: 0.3s ease;
        transition: 0.3s ease;
    }

    .login-form input[type=submit]{
        cursor: pointer;
        background: #33b5e5;
        width: 100%;
        border: 0;
        padding: 8px 15px;
        color: #ffffff;
        -webkit-transition: 0.3s ease;
        transition: 0.3s ease;
        border-radius: 0;
        -moz-border-radius: 0;
        -webkit-border-radius: 0;
        min-height: 40px;
        
    }
    </style>
</html>