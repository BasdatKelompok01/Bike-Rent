 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Daftar Stasiun</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <!-- <a href="<?= base_url('stasiun/add'); ?>" class="btn btn-primary"><span class="fa fa-plus"> Tambah Stasiun</span></a>
      <br>&nbsp; -->
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>No</th>
          <th>Nama Stasiun</th>
          <th>Alamat</th>
          <th>Latitude</th>
          <th>Longtitude</th>
          <?php if($this->session->userdata('role') == 'Admin') { ?> <th>Aksi</th> <?php } ?>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Stasiun Basdat Depok 1</td>
                <td>Beji, Kukusan Depok</td>
                <td>110100101</td>
                <td>-12312310</td>
                <?php if($this->session->userdata('role') == 'Admin') { ?> 
                <td align="center">
                  <a href="<?= base_url('stasiun/edit/1'); ?>" class="btn btn-primary btn-sm">Update</a>
                  <button class="btn btn-danger btn-sm konfirmasiHapus-pegawai" data-id="1" data-toggle="modal" data-target="#konfirmasiHapus">Hapus</button>
                </td>
                <?php } ?>
            </tr>
       </tbody>
       
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
  <div id="tempat-modal"></div>
  <?php show_my_confirm('konfirmasiHapus', 'hapus-dataPegawai', 'Apakah benar ingin menghapus stasiun tersebut?', 'Ya'); ?>
</section>  

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
  });
  var id_pegawai;
	$(document).on("click", ".konfirmasiHapus-pegawai", function() {
		id_pegawai = $(this).attr("data-id");
	})

	$(document).on("click", ".hapus-dataPegawai", function() {
		var id = id_pegawai;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pegawai/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPegawai();
			$('.msg').html(data);
			effect_msg();
		})
	})
</script> 
<script>
$("#stasiun").addClass('active');
$("#listStasiun").addClass('active');
</script>        
