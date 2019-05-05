 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Daftar Voucher</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <!-- <a href="<?= base_url('voucher/add'); ?>" class="btn btn-primary"><span class="fa fa-plus"> Tambah Voucher</span></a>
      <br>&nbsp; -->
      <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>No</th>
          <th>ID Voucher</th>
          <th>Nama</th>
          <th>Kategori</th>
          <th>Nilai Poin</th>
          <th>Deskripsi</th>
          <th>Diklaim Oleh</th>
          <?php if($this->session->userdata('role') == 'Admin') { ?> <th>Aksi</th> <?php } ?>
          <?php if($this->session->userdata('role') == 'Anggota') { ?> <th>Aksi</th> <?php } ?>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>1111q</td>
                <td>Voucher Belanja</td>
                <td>Belanja</td>
                <td>300</td>
                <td>Gratis Belanja</td>
                <td>-</td>
                <?php if($this->session->userdata('role') == 'Admin') { ?>
                <td align="center">
                  <a href="<?= base_url('voucher/edit/1'); ?>" class="btn btn-primary btn-sm">Update</a>
                  <button class="btn btn-danger btn-sm konfirmasiHapus-pegawai" data-id="1" data-toggle="modal" data-target="#konfirmasiHapus">Hapus</button>
                </td>
                <?php } ?>
                <?php if($this->session->userdata('role') == 'Anggota') { ?>
                <td align="center">
                  <a href="<?= base_url('voucher/klaim/1'); ?>" class="btn btn-primary btn-sm">Klaim</a>
                </td>
                <?php } ?>
            </tr>
            <tr>
                <td>2</td>
                <td>95675</td>
                <td>Voucher Makan</td>
                <td>Makan</td>
                <td>100</td>
                <td>Makan Gratis</td>
                <td>1w44 - Nunung</td>
                <?php if($this->session->userdata('role') == 'Admin') { ?>
                <td align="center">
                  
                </td>
                <?php } ?>
                <?php if($this->session->userdata('role') == 'Anggota') { ?>
                <td align="center">
                  
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
  <?php show_my_confirm('konfirmasiHapus', 'hapus-dataPegawai', 'Apakah benar ingin menghapus voucher tersebut?', 'Ya'); ?>
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
$("#voucher").addClass('active');
$("#listVoucher").addClass('active');
</script>        
