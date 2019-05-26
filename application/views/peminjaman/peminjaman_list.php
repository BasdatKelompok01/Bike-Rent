 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Daftar Peminjaman</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
    <table id="tblPeminjaman" class="table table-bordered table-striped ">
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
            <?php $num=1; ?>
                <?php foreach($all_peminjamans as $row): ?>
                  <tr>
                    <td><?= $num; ?></td>
                    <td><?= $row['no_kartu_anggota']; ?></td>
                    <td><?= $row['nomor'] . ' - ' . $row['merk']; ?></td>
                    <td><?= $row['id_stasiun'] . ' - ' . $row['nama']; ?></td>
                    <td><?= date('d F Y H:i', strtotime($row['datetime_pinjam'])); ?></td>
                    <td><?= ($row['datetime_kembali'] == null ? '-' : date('d F Y H:i', strtotime($row['datetime_kembali']))); ?></td>
                    <td><?= ($row['biaya'] == null ? '-' : $row['biaya']); ?></td>
                    <td><?= ($row['denda'] == null ? '-' : $row['denda']); ?></td>
                    <?php if($this->session->userdata('role') == 'Anggota') { ?> 
                        <td align="center">
                          <?php if ($row['datetime_kembali'] == null) { ?>
                          <a href="<?= base_url('index.php/peminjaman/kembalikan/' . $row['no_kartu_anggota'] . '/' . $row['datetime_pinjam'] . '/' . $row['nomor'] . '/' . $row['id_stasiun']); ?>" class="btn btn-primary btn-sm">Kembalikan</a>
                          <?php } ?>
                        </td>
                    <?php } ?>
                  </tr>
                  <?php $num++; ?>
              <?php endforeach; ?>
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
    $("#tblPeminjaman").DataTable();
  });
  var id_pegawai;
	$(document).on("click", ".konfirmasiHapus-pegawai", function() {
		id_pegawai = $(this).attr("data-id");
	})

	$(document).on("click", ".hapus-dataPegawai", function() {
		var id = id_pegawai;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('index.php/Pegawai/delete'); ?>",
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
