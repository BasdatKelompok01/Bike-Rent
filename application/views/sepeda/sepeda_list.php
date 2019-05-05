 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Daftar sepeda</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <!-- <a href="<?= base_url('sepeda/add'); ?>" class="btn btn-primary"><span class="fa fa-plus"> Tambah Sepeda</span></a>
      <br>&nbsp; -->
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>No</th>
          <th>Nomor</th>
          <th>Merk</th>
          <th>Jenis</th>
          <th>Stasiun</th>
          <th>Status</th>
          <th>Penyumbang</th>
          <?php if($this->session->userdata('role') == 'Admin') { ?> <th>Aksi</th> <?php } ?>
          <?php if($this->session->userdata('role') == 'Anggota') { ?> <th>Aksi</th> <?php } ?>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>13u78q</td>
                <td>BMX</td>
                <td>Dewasa</td>
                <td>123123 - Stasiun Basdat Depok 1</td>
                <td>Tersedia</td>
                <td>-</td>
                <?php if($this->session->userdata('role') == 'Admin') { ?>
                <td align="center">
                  <a href="<?= base_url('sepeda/edit/1'); ?>" class="btn btn-primary btn-sm">Update</a>
                  <button class="btn btn-danger btn-sm konfirmasiHapus-pegawai" data-id="1" data-toggle="modal" data-target="#konfirmasiHapus">Hapus</button>
                </td>
                <?php } ?>
                <?php if($this->session->userdata('role') == 'Anggota') { ?>
                <td align="center">
                  <a href="<?= base_url('sepeda/pinjam/1'); ?>" class="btn btn-primary btn-sm">Pinjam</a>
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
  <?php show_my_confirm('konfirmasiHapus', 'hapus-dataPegawai', 'Apakah benar ingin menghapus sepeda tersebut?', 'Ya'); ?>
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
$("#sepeda").addClass('active');
$("#listSepeda").addClass('active');
</script>        
