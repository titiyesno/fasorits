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
<section class="slice bg-3 animate-hover-slide">
        <div class="w-section inverse blog-grid">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="w-box blog-post">
                                    <div class="figure">
                                        <?php
                                        if(isset($yidic[0])){
                                        $hasil = str_replace("<img", '<img alt="" style="max-width: 100%;  max-height: 100%;"', str_replace("#CodeLinkUpload", base_url(), $yidic[0]->isi));
                                        if (isset($hasil))
                                            echo $hasil;
                                            }
                                        else {
                                            echo "Berita tidak ditemukan";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                    <img style="hight:100%" src="<?php echo $data['gambar']?>" alt="" class="img-thumbnail pull-left">
                                                    <p><font style="color: orange"><a href="<?php echo base_url("index.php/news/u/getberita/" . $data["idartikel"]); ?>"><?php echo $data["judul"]; ?></a></font> 
                                                    <br/>Pada <?php echo $data["tanggal_buat"]; ?>
                                                    </p>
                                                    
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