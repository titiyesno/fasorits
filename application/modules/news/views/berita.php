
<h3 class="section-title">Berita </h3>
<div class="row">
    <?php foreach ($artikel as $data) { ?>
        <div class="col-md-4">
            <div class="w-box">
                <div class="figure">
                    <img height="150px" width="100%" alt="" src="<?php echo $data["gambar"] ?>" class="img-responsive">
                    <div class="figcaption bg-2"></div>
                    <div class="figcaption-btn">
                        <a href="<?php echo $data["gambar"] ?>" class="btn btn-xs btn-one theater"><i class="fa fa-plus-circle"></i> Zoom</a>
                        <a href="#" class="btn btn-xs btn-one"><i class="fa fa-link"></i> View</a>
                    </div>
                </div>
                <h2><?php echo $data["judul"] ?></h2>
                <p>
                    <?php
                    $string = strip_tags($data['isi']);

                    if (strlen($string) > 100) {
                        $stringCut = substr($string, 0, 100);
                        $string = substr($stringCut, 0, strrpos($stringCut, ' ')) . '...';
                    }
                    echo $string;
                    ?>
                </p>
                <div class="w-footer">
                    <span class="pull-left"><small>Posted on: <?php echo $data["tanggal_buat"] ?></small></span><br/>
                    <span><a href="<?php echo base_url('index.php/berita/umum/getberita/' . $data['idartikel']) ?>" class="btn btn-xs btn-two pull-right">Read more</a></span>
                    <span class="clearfix"></span>
                </div>
            </div>
        </div>
    <?php } ?>


</div>