<div class="pg-opt pin">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Berita</h2>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a class="active" href="#">Berita</a></li>
                </ol>
            </div>

        </div>
    </div>
</div>
<section class="slice bg-3">
        <div class="w-section inverse">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <ul class="list-listings blog-list">
                        <?php foreach ($artikel as $data) { ?>
                            <li class="">
                                <div class="listing-image">
                                     <?php $isi = str_replace("<img", '<img alt="" class="fiximg"', str_replace("#CodeLinkUpload", base_url(), $data->isi)); ?>
                                     <?php
                                        preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $isi, $image);
                                        preg_match_all('/<img[^>]+>/i', $isi, $result);
                                        print_r($result[0][0]);
                                      ?>
                                </div>
                                <div class="listing-body">
                                    <h3><a href="<?php echo base_url("index.php/news/u/getberita/" . $data->idartikel); ?>"><?php echo $data->judul; ?></a></h3>
                                    <span class="list-item-info">
                                    Posted on: <?php echo $data->tanggal_buat; ?>
                                    </span>
                                    <p>
                                    <?php
                                    $isi2 = str_replace($result[0][0], "", $isi);
                                    $string = strip_tags($isi2);

                                    if (strlen($string) > 250) {
                                        $stringCut = substr($string, 0, 250);
                                        $string = substr($stringCut, 0, strrpos($stringCut, ' ')) . '...';
                                    }
                                    echo $string;
                                    ?>
                                    </p>
                                   <p>
                                        <a class="btn btn-xs btn-two pull-right" href="<?php echo site_url('news/u/getberita/' . $data->idartikel) ?>" class="right btn btn-success btn-sm addtocart">Read More</a>
                                    </p>
                                </div>
                            </li>
                            <hr/>
                            <?php }?>
                        </ul>
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                    <div class="col-md-4">
                        <h3 class="section-title">News</h3>
                        <div class="widget">
                            <div class="tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#one" data-toggle="tab"><i class="icon-star"></i> Recent</a></li>        
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="one">
                                        <ul class="popular">
                                            <?php
                                            if (isset($recent) && count($recent) > 0) {
                                                foreach ($recent as $data) {
                                                    ?>
                                                    <li>
                                                    <img src="<?php echo $data['gambar']?>" alt="" class="fiximg pull-left">
                                                    <p><font style="color: #888888"><a href="<?php echo base_url("index.php/news/u/getberita/" . $data["idartikel"]); ?>"><?php echo $data["judul"]; ?></a></font> </p>
                                                    <p>Pada <?php echo $data["tanggal_buat"]; ?></p>
                                                    </li>
                                                    <?php
                                                }
                                            } else {
                                                echo '<h6><b>Berita Tidak Ditemukan</b></h6>';
                                            }
                                            ?>  
                                                
                                            
                                        </ul>
                                    </div>
                                </div>							
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<!-- ==========================
    ESHOP - END 
=========================== 