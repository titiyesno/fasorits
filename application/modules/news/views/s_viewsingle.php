<script type="text/javascript" src="<?php echo base_url(); ?>gui_modul/ckeditor/ckeditor.js"></script>
<!-- Primary box -->
<section class="content-header">
    <h1>
        News Room
        <small>News Edit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url("index.php/home/u") ?>"><i class="fa fa-dashboard"></i> news room</a></li>
        <li class="active">edit news</li>
    </ol>
</section>
<div class="content">
    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">Berita dan Artikel</h3>

        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-8">
                    <?php if (isset($berita) && count($berita) > 0) { ?>
                        <h3><b><?php echo $berita[0]->judul; ?></b></h3>
                        <h5>Oleh <?php echo $berita[0]->nama; ?> pada <?php echo $berita[0]->tanggal_buat; ?></h5>
                        <div class="parent" style="word-wrap : break-word; overflow:hidden; ">
                            <?php echo str_replace("#CodeLinkUpload", base_url(), $berita[0]->isi); ?>
                        </div>
                        <!--                    <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-<?php
                        if ($berita[0]->status == 0)
                            echo "danger";
                        else
                            echo "success";
                        ?> dropdown-toggle btn-xs" type="button">
                        <?php
                        if ($berita[0]->status == 0)
                            echo "Draft";
                        else
                            echo "Published";
                        ?> <span class="caret"></span></button>
                                                <ul role="menu" class="dropdown-menu">
                        <?php if ($berita[0]->status == 0) { ?>
                                                                        <li><a href="<?php echo base_url("index.php/berita/super/publish/" . $berita[0]->idartikel . '/1'); ?>">Publish</a></li>
                                        
                                        
                        <?php } else {
                            ?>
                                                                        <li><a href="<?php echo base_url("index.php/berita/super/publish/" . $berita[0]->idartikel . '/0'); ?>">Draft</a></li>
                        <?php } ?>
                                                </ul>
                                            </div>-->
                        <?php
                    } else {
                        echo '<h3><b>Berita Tidak Ditemukan</b></h3>';
                    }
                    ?> 
                </div>
                <div class="col-sm-4">
                    <?php if (isset($recent) && count($recent) > 0) {
                        foreach ($recent as $data) {
                            ?>
                            <h5><a href="<?php echo base_url("index.php/news/s/getberita/" . $data->idartikel); ?>"><?php echo $data->judul; ?></a></h5>
                            <p>Oleh <?php echo $data->nama; ?> pada <?php echo $data->tanggal_buat; ?></p>
                            <hr/>
                        <?php
                        }
                    } else {
                        echo '<h3><b>Berita Tidak Ditemukan</b></h3>';
                    }
                    ?>  
                </div>
            </div>
        </div>
    </div>
</div>
