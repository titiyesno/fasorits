<style>
    .parent {
        width: 100%; /* I took the width from your post and placed it in css */
        height: 100%;
    }

    /* This will style any <img> element in .parent div */
    .parent img {
        height: 100%;
        width: 100%;
    }
    table {
        width:100%;
border-spacing: 10px;
    border-collapse: separate;

    }
    td {
        width:30%;
    }
</style>
<div class="pg-opt pin">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Artikel</h2>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Artikel</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="col-sm-12">

        <div class="col-sm-9">

            <div class="panel-body">
                <?php
                if (isset($berita) && count($berita) > 0) {
                    if ($berita[0]["jenis_artikel_idjenis_artikel"] != 12) {
                        ?>
                        <h5><b><font style="color: orange"><?php echo $berita[0]["menu"]; ?> /  <?php echo $berita[0]["jenis_artikel"]; ?></font> - </b></h5>
                        <h3><b><?php echo $berita[0]['judul']; ?></b></h3>
                        <h5>Oleh <?php echo $berita[0]["nama"]; ?> pada <?php echo $berita[0]["tanggal_buat"]; ?></h5>
                        <?php if ($berita[0]["vr"] != NULL) { ?>
                        <iframe src="<?php echo  base_url("static/vr") ."/".$berita[0]["vr"]; ?>" style="width: 100%; height: 500px" frameborder="0" bgcolor="#ffffff" target="" allowfullscreen ></iframe>
                            <?php } ?>
                        <div class="parent" style="word-wrap : break-word;">
                        <?php echo $berita[0]['isi']; ?>
                        </div>
                        <?php
                    } else {
                        if(isset($artikel)){
                        ?>
                        <ul class="list-listings">
                            <?php foreach ($artikel as $data){?>
                            <li class="featured">
                                <div class="listing-header bg-2">
                                    Berita Kesehatan
                                </div>
                                <div class="listing-image">
                                    <img src="<?php echo $data["gambar"] ?>" class="img-responsive" alt="">
                                </div>
                                <div class="listing-body">
                                    <h3><a href="#"><?php echo $data["judul"]; ?></a></h3>
                                    <h4>pada <?php echo $data['tanggal_buat']; ?></h4>
                                    <p>
                                        <?php echo $data['isi']; ?>
                                    </p>
                                </div>
                                <div class="listing-actions">
                                    <span class="star-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-empty"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span>
                                    <a href="<?php echo base_url('index.php/berita/umum/getberita/'.$data['idartikel'])?>" class="btn btn-two">Read more</a>
                                </div>
                            </li>
                            <?php }
                        }
                            else {
                            ?>
                             <h5><b><font style="color: orange"><?php echo $berita[0]->menu; ?> /  <?php echo $berita[0]->jenis_artikel; ?></font> - </b></h5>
                        <h3><b><?php echo $berita[0]->judul; ?></b></h3>
                        <h5>Oleh <?php echo $berita[0]->nama; ?> pada <?php echo $berita[0]->tanggal_buat; ?></h5>
                        <?php if ($berita[0]->vr != NULL) { ?>
                            <iframe src="<?php echo $berita[0]->vr; ?>" style="width: 100%; height: 500px" frameborder="0" bgcolor="#ffffff" target="" allowfullscreen ></iframe>
                            <?php } ?>
                        <div class="parent" style="word-wrap : break-word;">
                        <?php echo $berita[0]->isi; ?>
                        </div>
                        <?php }?>
                        </ul>
                        <?php
                    }
                } else {
                    echo '<h3><b>Berita Tidak Ditemukan</b></h3>';
                }
                ?>  
            </div>
        </div>
        <?php $this->load->view('u_recent'); ?>
    </div>
</div>