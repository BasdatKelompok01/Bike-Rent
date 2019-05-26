 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Daftar Stasiun</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <table id="tblStasiun" class="table table-bordered table-striped ">
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
        <?php $nomor=1; ?>
        <?php foreach($all_stasiuns as $row): ?>
          <tr>
            <td><?= $nomor; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['alamat']; ?></td>
            <td><?= $row['lat']; ?></td>
            <td><?= $row['long']; ?></td>
            <?php if($this->session->userdata('role') == 'Admin') { ?> 
                <td align="center">
                  <a href="<?= base_url('index.php/stasiun/edit/' . $row['id_stasiun']); ?>" class="btn btn-primary btn-sm">Update</a>
                  <button class="btn btn-danger btn-sm konfirmasiHapus-stasiun" data-id="<?php echo $row['id_stasiun']; ?>" data-toggle="modal" data-target="#konfirmasiHapus">Hapus</button>
                </td>
            <?php } ?>
          </tr>
          <?php $nomor++; ?>
          <?php endforeach; ?>
       </tbody>
       
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
  <div id="tempat-modal"></div>
  <?php show_my_confirm('konfirmasiHapus', 'hapus-dataStasiun', 'Apakah benar ingin menghapus stasiun tersebut?', 'Ya'); ?>
</section>  

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#tblStasiun").DataTable();
  });

  var id_stasiun;
	$(document).on("click", ".konfirmasiHapus-stasiun", function() {
		id_stasiun = $(this).attr("data-id");
	})

	$(document).on("click", ".hapus-dataStasiun", function() {
		var id = id_stasiun;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('index.php/stasiun/del'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
      window.location.href="<?php echo site_url('stasiun'); ?>";
		})
	})
</script> 
<script>
$("#stasiun").addClass('active');
$("#listStasiun").addClass('active');
</script>        
