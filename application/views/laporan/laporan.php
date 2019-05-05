 <!-- Datatable style -->
 <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables/dataTables.bootstrap.css">  

<section class="content">
  <div class="box">
   <div class="box-header">
     <h3 class="box-title">Daftar Laporan</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body table-responsive">
     <table id="example1" class="table table-bordered table-striped ">
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
            <tr>
                <td>1</td>
                <td>112</td>
                <td>15 April 2019</td>
                <td>1111111 - Nunung</td>
                <td>30000</td>
                <td>Sudah Selesai</td>
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
$("#listLaporan").addClass('active');
</script>        
