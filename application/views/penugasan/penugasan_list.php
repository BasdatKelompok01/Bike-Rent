 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Daftar Penugasan</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <!-- <a href="<?= base_url('index.php/penugasan/add'); ?>" class="btn btn-primary"><span class="fa fa-plus"> Tambah Penugasan</span></a>
      <br>&nbsp; -->
      <table id="tblPenugasan" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>No</th>
          <th>Petugas</th>
          <th>Waktu Mulai</th>
          <th>Waktu Selesai</th>
          <th>Stasiun</th>
          <?php if($this->session->userdata('role') == 'Admin') { ?> <th>Aksi</th> <?php } ?>
        </tr>
        </thead>
        <tbody>
              <?php $num=1; ?>
              <?php foreach($all_penugasan as $row): ?>
                <tr>
                  <td><?= $num; ?></td>
                  <td><?= $row['ktp'] . ' - ' . $row['namapetugas']; ?></td>
                  <td><?= date('d F Y H:i', strtotime($row['start_datetime'])); ?></td>
                  <td><?= date('d F Y H:i', strtotime($row['end_datetime'])); ?></td>
                  <td><?= $row['id_stasiun'] . ' - ' . $row['namastasiun']; ?></td>
                  <?php if($this->session->userdata('role') == 'Admin') { ?> 
                      <td align="center">
                        <a href="<?= base_url('index.php/penugasan/edit/' . $row['ktp'] . '/' . $row['start_datetime'] . '/' . $row['id_stasiun']); ?>" class="btn btn-primary btn-sm">Update</a>
                        <button class="btn btn-danger btn-sm konfirmasiHapus-penugasan" data-id="<?php echo $row['ktp'] . '#' . $row['start_datetime'] . '#' . $row['id_stasiun']; ?>" data-toggle="modal" data-target="#konfirmasiHapus">Hapus</button>
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
  <?php show_my_confirm('konfirmasiHapus', 'hapus-dataPenugasan', 'Apakah benar ingin menghapus penugasan tersebut?', 'Ya'); ?>
</section>  

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#tblPenugasan").DataTable();
  });
  var idx;
	$(document).on("click", ".konfirmasiHapus-penugasan", function() {
		idx = $(this).attr("data-id");
	})

	$(document).on("click", ".hapus-dataPenugasan", function() {
		var id = idx;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('index.php/penugasan/del'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
      window.location.href="<?php echo site_url('penugasan'); ?>";
		})
	})
</script> 
<script>
$("#penugasan").addClass('active');
$("#listPenugasan").addClass('active');
</script>        
