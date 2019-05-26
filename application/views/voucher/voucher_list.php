 <!-- Datatable style -->
<link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

 <section class="content">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Daftar Voucher</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <!-- <a href="<?= base_url('index.php/voucher/add'); ?>" class="btn btn-primary"><span class="fa fa-plus"> Tambah Voucher</span></a>
      <br>&nbsp; -->
      <table id="tblVoucher" class="table table-bordered table-striped ">
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
        <?php $num=1; ?>
            <?php foreach($all_vouchers as $row): ?>
              <tr>
                <td><?= $num; ?></td>
                <td><?= $row['id_voucher']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['kategori']; ?></td>
                <td><?= $row['nilai_poin']; ?></td>
                <td><?= $row['deskripsi']; ?></td>
                <td><?= ($row['diklaim'] == null) ? '-' : $row['diklaim']; ?></td>
                <?php if($this->session->userdata('role') == 'Admin') { ?> 
                    <td align="center">
                      <?php if($row['diklaim'] == null) { ?> 
                        <a href="<?= base_url('index.php/voucher/edit/' . $row['id_voucher']); ?>" class="btn btn-primary btn-sm">Update</a>
                        <button class="btn btn-danger btn-sm konfirmasiHapus-voucher" data-id="<?php echo $row['id_voucher']; ?>" data-toggle="modal" data-target="#konfirmasiHapus">Hapus</button>
                      <?php } ?>
                    </td>
                <?php } ?>
                <?php if($this->session->userdata('role') == 'Anggota') { ?> 
                    <td align="center">
                      <?php if($row['diklaim'] == null) { ?> 
                        <a href="<?= base_url('index.php/voucher/klaim/' . $row['id_voucher']); ?>" class="btn btn-primary btn-sm">Klaim</a>
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
  <?php show_my_confirm('konfirmasiHapus', 'hapus-dataVoucher', 'Apakah benar ingin menghapus voucher tersebut?', 'Ya'); ?>
</section>  

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#tblVoucher").DataTable();
  });
  var id_voucher;
	$(document).on("click", ".konfirmasiHapus-voucher", function() {
		id_voucher = $(this).attr("data-id");
	})

	$(document).on("click", ".hapus-dataVoucher", function() {
		var id = id_voucher;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('index.php/voucher/del'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
      window.location.href="<?php echo site_url('voucher'); ?>";
		})
	})
</script> 
<script>
$("#voucher").addClass('active');
$("#listVoucher").addClass('active');
</script>        
