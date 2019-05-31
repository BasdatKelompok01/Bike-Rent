 <!-- Datatable style -->
 <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

<section class="content">
  <div class="box">
   <div class="box-header">
     <h3 class="box-title">Daftar Laporan</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body table-responsive">
     <table id="tblLaporan" class="table table-bordered table-striped ">
       <thead>
       <tr>
         <th>No</th>
         <th>ID Laporan</th>
         <th>Tanggal Pinjam</th>
         <th>Anggota</th>
         <th>Denda</th>
         <th>Status</th>
       </tr>
       </thead>
       <tbody>
            <?php $num=1; ?>
            <?php foreach($all_laporan as $row): ?>
              <tr>
                <td><?= $num; ?></td>
                <td><?= $row['id_laporan']; ?></td>
                <td><?= date('d F Y H:i', strtotime($row['datetime_pinjam'])); ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= number_format($row['denda'],0,'',''); ?></td>
                <td><?= $row['status']; ?></td>
              </tr>
              <?php $num++; ?>
            <?php endforeach; ?>
       </tbody>
      
     </table>
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->
</section>  

<!-- DataTables -->
<script src="<?= base_url() ?>public/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
 $(function () {
   $("#tblLaporan").DataTable();
 });
</script> 
<script>
$("#listLaporan").addClass('active');
</script>        
