 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Daftar Peminjaman</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
    <table id="example1" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>No</th>
          <th>Nomor Kartu Anggota</th>
          <th>Sepeda</th>
          <th>Stasiun</th>
          <th>Waktu Pinjam</th>
          <th>Waktu Kembali</th>
          <th>Biaya</th>
          <th>Denda</th>
          <?php if($this->session->userdata('role') == 'Anggota') { ?> <th>Aksi</th> <?php } ?>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>13u78q</td>
                <td>11244 - BMX</td>
                <td>123123 - Stasiun Basdat Depok 1</td>
                <td>15 April 2019</td>
                <td>15 April 2019</td>
                <td>-</td>
                <td>-</td>
                <?php if($this->session->userdata('role') == 'Anggota') { ?>
                <td align="center">
                  <a href="<?= base_url('peminjaman/kembalikan/1'); ?>" class="btn btn-primary btn-sm">Kembalikan</a>
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
  <?php show_my_confirm('konfirmasiHapus', 'hapus-dataPegawai', 'Hapus Data Ini?', 'Ya'); ?>
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
$("#peminjaman").addClass('active');
$("#listPeminjaman").addClass('active');
</script>        
