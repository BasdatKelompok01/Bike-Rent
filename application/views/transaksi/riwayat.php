 <!-- Datatable style -->
 <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

<section class="content">
  <div class="box">
   <div class="box-header">
     <h3 class="box-title">Riwayat Transaksi</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body table-responsive">
     <table id="tblTransaksi" class="table table-bordered table-striped ">
       <thead>
       <tr>
         <th>No</th>
         <th>Tanggal</th>
         <th>Jenis Transaksi</th>
         <th>Nominal</th>
       </tr>
       </thead>
       <tbody>
        <?php $num=1; ?>
          <?php foreach($all_transaksi as $row): ?>
            <tr>
              <td><?= $num; ?></td>
              <td><?= date('d F Y H:i', strtotime($row['date_time'])); ?></td>
              <td><?= $row['jenis']; ?></td>
              <td><?= number_format($row['total'],0,'',''); ?></td>
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
   $("#tblTransaksi").DataTable();
 });
</script> 
<script>
  $("#transaksi").addClass('active');
  $("#riwayatTransaksi").addClass('active');
</script>        
