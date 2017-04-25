<div class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav class="top-header-menu">
                    <ul class="menu">
                        <!--<li><a href="<?php echo base_url('index.php/user/login') ?>">Login</a></li>-->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php
$sql = "select * from olahraga";
$result = $this->db->query($sql)->result();
$sql = "select * from lapangan";
$lapangan = $this->db->query($sql)->result();
?>
<header>    
    <div id="navOne" class="navbar navbar-wp" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle navbar-toggle-aside-menu">
                    <i class="fa fa-outdent icon-custom"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url("home/u") ?>" title="Boomerang | One template. Infinite solutions">
                    <img src="<?php echo base_url('content/img') ?>/its.png" > FASOR Sepuluh Nopember
                </a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="">                 

                        <a href="<?php echo site_url("home/u") ?>"  data-hover="dropdown" data-close-others="true">Home</a>

                    </li>
                    <li class="dropdown">

                        <a href="" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" >Reservasi</a>
                        <ul class="dropdown-menu">
                            <?php foreach ($result as $value) {
                                ?>
                                <li class="dropdown-submenu"><a tabindex="-1" href=""><?php echo $value->nama ?></a>
                                    <ul class="dropdown-menu">
                                        <?php foreach($lapangan as $lap){
                                            if($lap->olahraga==$value->id){
                                            ?>
                                        <li><a tabindex="-1" href="<?php echo site_url("pemesanan/u/index/$lap->id") ?>"><?php echo $lap->nama ?></a></li>
                                            <?php }}?>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>    
                    </li>
                    <li class="">
                        <a href="<?php echo site_url("news/u") ?>" data-close-others="true">Berita</a>
                    </li>
                    <li class="">
                        <a href="<?php echo site_url("galeri/u") ?>" data-close-others="true">Galeri</a>
                    </li>
                    <li class="">
                        <a href="<?php echo site_url("company/u/") ?>" data-close-others="true">Profil Fasor</a>
                    </li>
                    <li class="">
                        <a href="<?php echo site_url("company/u/prosedur") ?>">Prosedur</a>
                    </li>
                    <li class="">
                        <a href="<?php echo site_url("contact/u") ?>" class=""  data-close-others="true">Contact</a>
                    </li>
                </ul>

            </div><!--/.nav-collapse -->
        </div>
    </div>
</header>