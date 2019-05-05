 <!-- Datatable style -->
 <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

<section class="content">
  <div class="box">
   <div class="box-header">
     <h3 class="box-title">Riwayat Transaksi</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body table-responsive">
     <table id="example1" class="table table-bordered table-striped ">
       <thead>
       <tr>
         <th>No</th>
         <th>Tanggal</th>
         <th>Jenis Transaksi</th>
         <th>Nominal</th>
       </tr>
       </thead>
       <tbody>
            <tr>
                <td>1</td>
                <td>15 April 2019</td>
                <td>Topup</td>
                <td>20000</td>
            </tr>
            <tr>
                <td>2</td>
                <td>15 April 2019</td>
                <td>Peminjaman</td>
                <td>-10000</td>
            </tr>
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
   $("#example1").DataTable();
 });
</script> 
<script>
  $("#transaksi").addClass('active');
  $("#riwayatTransaksi").addClass('active');
</script>        
