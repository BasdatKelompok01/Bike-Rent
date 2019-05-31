 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Daftar Acara</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <!-- <a href="<?= base_url('acara/add'); ?>" class="btn btn-primary"><span class="fa fa-plus"> Tambah Acara</span></a>
      <br>&nbsp; -->
      <table id="tblAcara" class="table table-bordered table-striped ">
        <thead>
        <tr>
          <th>No</th>
          <th>Judul</th>
          <th>Deskripsi</th>
          <th>Tanggal Mulai</th>
          <th>Tanggal Selesai</th>
          <!-- <th>Stasiun</th> -->
          <th>is Free ?</th>
          <?php if($this->session->userdata('role') == 'Admin') { ?> <th>Aksi</th> <?php } ?>
        </tr>
        </thead>
        <tbody>
        <?php $nomor=1; ?>
        <?php foreach($all_acaras as $row): ?>
          <tr>
            <td><?= $nomor; ?></td>
            <td><?= $row['judul']; ?></td>
            <td><?= $row['deskripsi']; ?></td>
            <td><?= Date('d F Y', strtotime($row['tgl_mulai'])); ?></td>
            <td><?= Date('d F Y', strtotime($row['tgl_akhir'])); ?></td>
            <td>
                <?php 
                    if($row['is_free'] == 't') { 
                      echo 'Ya';
                    } else { 
                        echo 'Tidak';
                    }
                ?>
            </td>
            <?php if($this->session->userdata('role') == 'Admin') { ?> 
                <td align="center">
                  <a href="<?= base_url('index.php/acara/edit/' . $row['id_acara']); ?>" class="btn btn-primary btn-sm">Update</a>
                  <button class="btn btn-danger btn-sm konfirmasiHapus-acara" data-id="<?php echo $row['id_acara']; ?>" data-toggle="modal" data-target="#konfirmasiHapus">Hapus</button>
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
  <?php show_my_confirm('konfirmasiHapus', 'hapus-dataAcara', 'Apakah benar ingin menghapus acara tersebut?', 'Ya'); ?>
</section>  

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#tblAcara").DataTable();
  });
  
  var id_acara;
	$(document).on("click", ".konfirmasiHapus-acara", function() {
		id_acara = $(this).attr("data-id");
	})

	$(document).on("click", ".hapus-dataAcara", function() {
		var id = id_acara;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('index.php/acara/del'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
      window.location.href="<?php echo site_url('acara'); ?>";
		})
	})
</script> 
<script>
$("#acara").addClass('active');
$("#listAcara").addClass('active');
</script>        
