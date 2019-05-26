<?php 
$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2);  
?>  

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url() ?>public/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          Selamat Datang, <br><br><p><?= ucwords($this->session->userdata('name')); ?></p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>

      <ul class="sidebar-menu">
        <?php if($this->session->userdata('role') == 'Admin') { ?>
          <li id="acara" class="treeview">
            <a href="#">
              <i class="fa fa-calendar"></i>
              <span>Acara</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="addAcara"><a href="<?= base_url('index.php/acara/add'); ?>"><i class="fa fa-plus"></i> Tambah Acara</a></li>
              <li id="listAcara"><a href="<?= base_url('index.php/acara'); ?>"><i class="fa fa-list"></i> Daftar Acara</a></li>
            </ul>
          </li>
          <li id="penugasan" class="treeview">
            <a href="#">
              <i class="fa fa-user-secret"></i>
              <span>Petugas</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="addPenugasan"><a href="<?= base_url('index.php/penugasan/add'); ?>"><i class="fa fa-plus"></i> Tambah Penugasan</a></li>
              <li id="listPenugasan"><a href="<?= base_url('index.php/penugasan'); ?>"><i class="fa fa-list"></i> Daftar Penugasan</a></li>
            </ul>
          </li>
          <li id="stasiun" class="treeview">
            <a href="#">
              <i class="fa fa-building"></i>
              <span>Stasiun</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="addStasiun"><a href="<?= base_url('index.php/stasiun/add'); ?>"><i class="fa fa-plus"></i> Tambah Stasiun</a></li>
              <li id="listStasiun"><a href="<?= base_url('index.php/stasiun'); ?>"><i class="fa fa-list"></i> Daftar Stasiun</a></li>
            </ul>
          </li>
          <li id="sepeda" class="treeview">
            <a href="#">
              <i class="fa fa-bicycle"></i>
              <span>Sepeda</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="addSepeda"><a href="<?= base_url('index.php/sepeda/add'); ?>"><i class="fa fa-plus"></i> Tambah Sepeda</a></li>
              <li id="listSepeda"><a href="<?= base_url('index.php/sepeda'); ?>"><i class="fa fa-list"></i> Daftar Sepeda</a></li>
            </ul>
          </li>
          <li id="voucher" class="treeview">
            <a href="#">
              <i class="fa fa-ticket"></i>
              <span>Voucher</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="addVoucher"><a href="<?= base_url('index.php/voucher/add'); ?>"><i class="fa fa-plus"></i> Tambah Voucher</a></li>
              <li id="listVoucher"><a href="<?= base_url('index.php/voucher'); ?>"><i class="fa fa-list"></i> Daftar Voucher</a></li>
            </ul>
          </li>
          <li id="listPeminjaman">
            <a href="<?= base_url('index.php/peminjaman'); ?>"><i class="fa fa-hand-rock-o"></i> <span>Daftar Peminjaman</span></a>
          </li>
          <li id="listLaporan">
            <a href="<?= base_url('index.php/laporan'); ?>"><i class="fa fa-file"></i> <span>Daftar Laporan</span></a>
          </li>
          <li>
            <a href="<?= base_url('index.php/auth/logout'); ?>"><i class="fa fa-power-off"></i> <span>Logout</span></a>
          </li>
        <?php } ?>

        <?php if($this->session->userdata('role') == 'Anggota') { ?>
          <li id="listStasiun">
            <a href="<?= base_url('index.php/stasiun'); ?>"><i class="fa fa-building"></i> <span>Daftar Stasiun</span></a>
          </li>
          <li id="listSepeda">
            <a href="<?= base_url('index.php/sepeda'); ?>"><i class="fa fa-bicycle"></i> <span>Daftar Sepeda</span></a>
          </li>
          <li id="peminjaman" class="treeview">
            <a href="#">
              <i class="fa fa-hand-rock-o"></i>
              <span>Peminjaman</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="addPeminjaman"><a href="<?= base_url('index.php/peminjaman/add'); ?>"><i class="fa fa-plus"></i> Tambah Peminjaman</a></li>
              <li id="listPeminjaman"><a href="<?= base_url('index.php/peminjaman'); ?>"><i class="fa fa-list"></i> Daftar Peminjaman</a></li>
            </ul>
          </li>
          <li id="transaksi" class="treeview">
            <a href="#">
              <i class="fa fa-money"></i>
              <span>Transaksi</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="topup"><a href="<?= base_url('index.php/topup'); ?>"><i class="fa fa-plus"></i> Top Up ShareBike Pay</a></li>
              <li id="riwayatTransaksi"><a href="<?= base_url('index.php/transaksi'); ?>"><i class="fa fa-list"></i> Riwayat Transaksi</a></li>
            </ul>
          </li>
          <li id="listAcara">
            <a href="<?= base_url('index.php/acara'); ?>"><i class="fa fa-calendar"></i> <span> Daftar Acara</span></a>
          </li>
          <li id="listVoucher">
            <a href="<?= base_url('index.php/voucher'); ?>"><i class="fa fa-ticket"></i> <span> Daftar Voucher</span></a>
          </li>
          <li>
            <a href="<?= base_url('index.php/auth/logout'); ?>"><i class="fa fa-power-off"></i> <span>Logout</span></a>
          </li>
        <?php } ?>
        
        <?php if($this->session->userdata('role') == 'Petugas') { ?>
          <li id="listPenugasan">
            <a href="<?= base_url('index.php/penugasan'); ?>"><i class="fa fa-user-secret"></i> <span>Daftar Penugasan</span></a>
          </li>
          <li id="listStasiun">
            <a href="<?= base_url('index.php/stasiun'); ?>"><i class="fa fa-building"></i> <span>Daftar Stasiun</span></a>
          </li>
          <li id="listSepeda">
            <a href="<?= base_url('index.php/sepeda'); ?>"><i class="fa fa-bicycle"></i> <span>Daftar Sepeda</span></a>
          </li>
          <li id="listAcara">
            <a href="<?= base_url('index.php/acara'); ?>"><i class="fa fa-calendar"></i> <span>Daftar Acara</span></a>
          </li>
          <li id="listLaporan">
            <a href="<?= base_url('index.php/laporan'); ?>"><i class="fa fa-file"></i> <span>Daftar Laporan</span></a>
          </li>
          <li id="listPeminjaman">
            <a href="<?= base_url('index.php/peminjaman'); ?>"><i class="fa fa-hand-rock-o"></i> <span>Daftar Peminjaman</span></a>
          </li>
          <li id="listVoucher">
            <a href="<?= base_url('index.php/voucher'); ?>"><i class="fa fa-ticket"></i> <span>Daftar Voucher</span></a>
          </li>
          <li>
            <a href="<?= base_url('index.php/auth/logout'); ?>"><i class="fa fa-power-off"></i> <span>Logout</span></a>
          </li>
        <?php } ?>

        <!-- <li id="topup">
          <a href="<?= base_url('topup'); ?>"><i class="fa fa-money"></i> <span>Top Up</span></a>
        </li>
        <li id="riwayattransaksi">
          <a href="<?= base_url('transaksi'); ?>"><i class="fa fa-book"></i> <span>Riwayat Transaksi</span></a>
        </li>
        <li id="daftarlaporan">
          <a href="<?= base_url('laporan'); ?>"><i class="fa fa-file"></i> <span>Daftar Laporan</span></a>
        </li>
        <li id="penugasan">
          <a href="<?= base_url('penugasan'); ?>"><i class="fa fa-user-secret"></i> <span>Penugasan</span></a>
        </li>
        <li id="acara">
          <a href="<?= base_url('acara'); ?>"><i class="fa fa-calendar"></i> <span>Acara</span></a>
        </li>
        <li id="stasiun">
          <a href="<?= base_url('stasiun'); ?>"><i class="fa fa-building"></i> <span>Stasiun</span></a>
        </li>
        <li id="sepeda">
          <a href="<?= base_url('sepeda'); ?>"><i class="fa fa-bicycle"></i> <span>Sepeda</span></a>
        </li>
        <li id="voucher">
          <a href="<?= base_url('voucher'); ?>"><i class="fa fa-ticket"></i> <span>Voucher</span></a>
        </li>
        <li id="peminjaman" class="treeview">
          <a href="#">
            <i class="fa fa-hand-rock-o"></i>
            <span>Peminjaman</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="addPeminjaman"><a href="<?= base_url('peminjaman/add'); ?>"><i class="fa fa-plus"></i> Tambah Peminjaman</a></li>
            <li id="listPeminjaman"><a href="<?= base_url('peminjaman'); ?>"><i class="fa fa-list"></i> Daftar Peminjaman</a></li>
          </ul>
        </li> -->
      </ul>


    </section>
    <!-- /.sidebar -->
  </aside>

  
<script>
  $("#<?= $cur_tab; ?>").addClass('active');
</script>
