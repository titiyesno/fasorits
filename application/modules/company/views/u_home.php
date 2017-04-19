<div class="pg-opt pin">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Profil fasor</h2>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a class="active" href="#">Profil fasor</a></li>
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
                                    $hasil = str_replace("<img", '<img alt="" style="max-width: 100%;  max-height: 100%;"', str_replace("#CodeLinkUpload", base_url(), $yidic[0]->isi));
                                    if (isset($hasil))
                                        echo $hasil;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <h3 class="section-title">Partner</h3>
                    <div class="widget">
                        <?php
                        if (count($subnav)>=1) {
                            $hasil = str_replace("<img", '<img alt="" style="max-width: 100%;  max-height: 100%;"', str_replace("#CodeLinkUpload", base_url(), $subnav[0]->isi));
                            if (isset($hasil))
                                echo $hasil;
                        }
                        ?>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>