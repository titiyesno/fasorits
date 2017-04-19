<section class="breadcrumb-wrapper direktori">
    <div class="container">
        <h2><?php echo ucwords($yidic[0]->jenis_artikel) ?></h2>

        <ol class="breadcrumb">
            <li><a href="<?php echo site_url() ?>">Home</a></li>
            <li><a href="<?php echo site_url('services/u/') ?>">Product & Service</a></li>
            <li class="active"><?php echo ucwords($yidic[0]->jenis_artikel) ?></li>
        </ol>
    </div>
</section>

<section class="content bg-color-3">
    <div class="container" >    
        <div class="row">
            <div class="col-md-9">
                <?php
                $hasil = str_replace("<img", '<img alt="" style="max-width: 100%;  max-height: 100%;"', str_replace("#CodeLinkUpload", base_url(), $yidic[0]->isi));
                if (isset($hasil))
                    echo $hasil;
                ?>
            </div>
            <div class="col-md-3">
                <?php
                    $hasil = str_replace("<img", '<img alt="" style="max-width: 100%;  max-height: 100%;"', str_replace("#CodeLinkUpload", base_url(), $subnav[0]->isi));
                    if (isset($hasil))
                        echo $hasil;
                    ?>
            </div>
        </div>
    </div>
</section>