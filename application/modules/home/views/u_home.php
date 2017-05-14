<!-- ==========================
    JUMBOTRON - END 
=========================== -->
<section id="homepageCarousel" class="carousel carousel-1 slide color-two-l" data-ride="carousel">
    <div class="carousel-inner">

        <div class="item item-dark next left" style="background-image:url(<?php echo base_url()?>gui_modul/sliding/carousel-img-2.png);">
            <div class="container">
                <div class="description fluid-center">
                    <span class="title">Rencanakan Agenda Besar Di Kehidupan Anda</span>
                    <span class="subtitle">Gunakan Layanan yang Bekualitas dari fasor Sepuluh Nopember</span>
                    <span class="features">
                        <i class="fa fa-laptop"></i>
                        <i class="fa fa-html5"></i>
                        <i class="fa fa-twitter"></i>
                    </span>
                </div>
            </div>
        </div> 

        <div class="item item-light active left" style="background-image:url(<?php echo base_url()?>gui_modul/sliding/carousel-img-7.png);">
            <div class="container">
                <div class="description">
                    <span class="title">Pelayanan yang Memuaskan</span>
                    <span class="subtitle">Fasilitas yang terbaik</span>
                    <ul class="list-carousel">
                        <li><i class="fa fa-check-square"></i> Gedung yang Luas</li>
                        <li><i class="fa fa-check-square"></i> Ruang Pendukung yang Sesuai Kebutuhan</li>
                        <li><i class="fa fa-check-square"></i> Sound Sistem yang Stereo</li>
                        <li><i class="fa fa-check-square"></i> AC 10PK</li>
                    </ul>
                </div>
                <div class="object">
                    <iframe src="//player.vimeo.com/video/78468485?title=0&amp;byline=0&amp;portrait=0" height="320"></iframe>
                </div>
            </div>
        </div>       
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#homepageCarousel" data-slide="prev">
        <i class="fa fa-angle-left"></i>
    </a>
    <a class="right carousel-control" href="#homepageCarousel" data-slide="next">
        <i class="fa fa-angle-right"></i>
    </a>     
</section> 
<div class="col-sm-12">
    
</div>
<section class="content bg-color-4 visible-xs-block" id="section-portfolio">
    <div class="container">
        <div class="row widgethome">
            <hr/>
            <div class="col-md-6">
				<h3>
					<strong>Periksa Status Pembayaran  </strong></i>
				</h3>
				<form class="form-inline" method="POST" action="<?php echo base_url()?>index.php/home/u/cek_bayar">
					<input class="form-control" type="text" placeholder="Kode Pembayaran" id="kode_bayar" name="kode_bayar" required/>
					<button id="buttonsubmit" class="btn btn-two btn-lg" style="border-color:white; border-width:2px" type="submit">Cek</button>                        
				</form>
            </div>
            <div class="col-md-3 hidden-sm hidden-xs">
                <!-- SnapWidget -->
                <!-- SnapWidget -->
                <script src="http://snapwidget.com/js/snapwidget.js"></script>
                <iframe src="http://snapwidget.com/in/?u=Z3JhbmRjaXR5c2J5fGlufDEyNXwzfDN8fG5vfDV8ZmFkZUlufG9uU3RhcnR8eWVzfHllcw==&ve=200115" title="Instagram Widget" class="snapwidget-widget" allowTransparency="true" frameborder="0" scrolling="no" style="border:none; overflow:hidden; width:100%;"></iframe>
            </div>
            <div class="col-md-3">
                <a class="twitter-timeline" href="https://twitter.com/ITS_Surabaya" data-widget-id="557345477809565697">Tweets by @ITS_Surabaya</a>
                <script>!function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                        if (!d.getElementById(id)) {
                            js = d.createElement(s);
                            js.id = id;
                            js.src = p + "://platform.twitter.com/widgets.js";
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                    }(document, "script", "twitter-wjs");</script>
            </div>
        </div>
    </div>
</section>