<aside class="left-side sidebar-offcanvas">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/img/avatar5.png') ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Hello, <?php echo $this->session->userdata['logged_in']["nama"] ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="active">
                <a href="<?php echo base_url("index.php/pemesanan/s") ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="active">
                <a href="<?php echo base_url("index.php/pemesanan/s/reservasi") ?>">
                    <i class="fa fa-dashboard"></i> <span>Reservasi Admin</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-info"></i> 
                    <span>Profil fasor</span>
                    <small class="badge pull-right bg-blue">ok</small>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url("index.php/company/s") ?>">
                        <i class=""></i> <span>Profil fasor</span>
                    </a>
                    </li>
                    <li><a href="<?php echo base_url("index.php/company/s/subs/") ?>"><i class="fa fa-angle-double-right"></i>Side Bar</a></li>
                </ul>
            </li>
            <li class="">
                <a href="<?php echo base_url("index.php/company/s/prosedur") ?>">
                    <i class="fa fa-dashboard"></i> <span>Prosedur Pemesanan</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo base_url('index.php/news/s/') ?>">
                    <i class="fa fa-folder"></i> 
                    <small class="badge pull-right bg-blue">ok</small>
                    <span>Berita</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url("index.php/news/s") ?>"><i class="fa fa-angle-double-right"></i> Pencarian Berita</a></li>
                    <li><a href="<?php echo base_url("index.php/news/s/tambah") ?>"><i class="fa fa-angle-double-right"></i> Tambah Berita</a></li>
                </ul>
            </li>
            <li class="">
                <a href="<?php echo base_url("index.php/contact/s") ?>">
                    <i class="fa fa-phone"></i> <span>Contact</span>
                    <small class="badge pull-right bg-blue">ok</small>
                </a>
            </li>
            <li class="">
                <a href="<?php echo base_url("index.php/galeri/s") ?>">
                    <i class="fa fa-picture-o"></i> <span>Galeri</span>
                    <small class="badge pull-right bg-blue">ok</small>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-envelope"></i>  Katalog
                    <small class="badge pull-right bg-blue">ok</small>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>                            

                 <ul class="treeview-menu">
                    <li><a href="<?php echo base_url("index.php/services/s/olahraga") ?>"><i class="fa fa-angle-double-right"></i> Olahraga</a></li>
                    <li><a href="<?php echo base_url("index.php/services/s/lapangan") ?>"><i class="fa fa-angle-double-right"></i> Lapangan</a></li>
                </ul>

            </li>
            <li class="treeview">
                <a href="<?php echo base_url("index.php/kategori/s") ?>">
                    <i class="fa fa-dashboard"></i> <span>Kategori</span>
                    <small class="badge pull-right bg-blue">ok</small>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url("index.php/kategori/s") ?>"><i class="fa fa-angle-double-right"></i> Kategori Berita</a></li>
                    <li><a href="<?php echo base_url("index.php/kategori/s/sewa") ?>"><i class="fa fa-angle-double-right"></i> Kategori Item Sewa</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>