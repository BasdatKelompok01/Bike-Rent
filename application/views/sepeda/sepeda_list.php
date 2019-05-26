 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Daftar sepeda</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <!-- <a href="<?= base_url('index.php/sepeda/add'); ?>" class="btn btn-primary"><span class="fa fa-plus"> Tambah Sepeda</span></a>
      <br>&nbsp; -->
      <table id="tblSepeda" class="table table-bordered table-striped ">
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
            <?php $num=1; ?>
            <?php foreach($all_sepedas as $row): ?>
              <tr>
                <td><?= $num; ?></td>
                <td><?= $row['nomor']; ?></td>
                <td><?= $row['merk']; ?></td>
                <td><?= $row['jenis']; ?></td>
                <td><?= $row['stasiun']; ?></td>
                <td>
                <?php 
                    if($row['status'] == 't') { 
                      echo 'Tersedia';
                    } else { 
                        echo 'Tidak Tersedia';
                    }
                ?>
            </td>
                <td><?= $row['penyumbang']; ?></td>
                <?php if($this->session->userdata('role') == 'Admin') { ?> 
                    <td align="center">
                      <a href="<?= base_url('index.php/sepeda/edit/' . $row['nomor']); ?>" class="btn btn-primary btn-sm">Update</a>
                      <button class="btn btn-danger btn-sm konfirmasiHapus-sepeda" data-id="<?php echo $row['nomor']; ?>" data-toggle="modal" data-target="#konfirmasiHapus">Hapus</button>
                    </td>
                <?php } ?>
                <?php if($this->session->userdata('role') == 'Anggota') { ?> 
                    <td align="center">
                      <?php if ($row['status'] == 't') { ?>
                      <a href="<?= base_url('index.php/sepeda/pinjam/' . $row['nomor']); ?>" class="btn btn-primary btn-sm">Pinjam</a>
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
  <?php show_my_confirm('konfirmasiHapus', 'hapus-dataSepeda', 'Apakah benar ingin menghapus sepeda tersebut?', 'Ya'); ?>
</section>  

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#tblSepeda").DataTable();
  });
  var nomor;
	$(document).on("click", ".konfirmasiHapus-sepeda", function() {
		nomor = $(this).attr("data-id");
	})

	$(document).on("click", ".hapus-dataSepeda", function() {
		var id = nomor;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('index.php/sepeda/del'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
      window.location.href="<?php echo site_url('sepeda'); ?>";
		})
	})
</script> 
<script>
$("#sepeda").addClass('active');
$("#listSepeda").addClass('active');
</script>        
