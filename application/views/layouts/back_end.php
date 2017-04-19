<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php if (isset($template['title'])) echo $template['title']; ?></title>
        <?php if (isset($template['partials']['jsorcss'])) echo $template['partials']['jsorcss']; ?>
        <?php $this->load->view('hf/include/head'); ?>
    </head>
    <body class="skin-blue">
        <header class="header">
            <a href="<?php echo base_url("index.php/pemesanan/admin")?>" class="logo">
                Admin fasor ITS
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $this->session->userdata['logged_in']["nama"]?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo base_url('assets/img/avatar5.png') ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $this->session->userdata['logged_in']["nama"]?> - <?php echo $this->session->userdata['logged_in']["privilege"]?>
                                    </p>
                                </li>
                               
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo base_url('index.php/user/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">

            <?php if (isset($template['partials']['menu'])) echo $template['partials']['menu']; ?>
            <?php if (isset($template['partials']['header'])) echo $template['partials']['header']; ?>
            <aside class="right-side">
                <?php echo $template['body']; ?> 
            </aside>
        </div>
        <?php $this->load->view('hf/include/footer') ?>
    </body>
</html>