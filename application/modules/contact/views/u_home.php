<section class="slice no-padding">
    <div id="mapCanvas" class="map-canvas no-margin"></div>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
    <script type="text/javascript">
        function initialize() {
            var myLatlng = new google.maps.LatLng(-7.277934, 112.791055);
            var mapOptions = {
                zoom: 16,
                scrollwheel: false,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(document.getElementById('mapCanvas'), mapOptions);

            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                animation: google.maps.Animation.DROP,
                title: 'Hello World!'
            });

            var contentString = '<div class="info-window-content"><h2>fasor Sepuluh Nopember</h2>' +
                    '<h3>Persewaan Gedung</h3>' +
                    '<p>Untuk Informasi Lebih Lanjut Silahkan Menghubungi Kontak Dibawah</p></div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            google.maps.event.addListener(marker, 'click', function () {
                infowindow.open(map, marker);
            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
</section>
<section class="slice bg-3">
    <div class="w-section inverse">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="section-title">Contact us</h3>
                    <p>
                        Hungi kami untuk melayani kebutuhan Anda
                    </p>

                    <form class="form-light mt-20" role="form" method="post" action="<?php echo base_url('index.php/contact/u/submit') ?>">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="name">Your name:<span>*</span></label>
                                <input type="text" class="form-control " placeholder="Your name:" id="name" name="nama" required>
                            </div>                               
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="email2">Your email:<span>*</span></label>
                                <input type="email" class="form-control " placeholder="Your email:" name="email" id="email2" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="message">Your message:<span>*</span></label>
                                <textarea class="form-control" placeholder="Your message:" id="message" name="pesan" required></textarea>
                                <button type="submit" id="send" class="btn btn-primary btn-sm"><i class="fa fa-check"></i>Submit</button>
                                <span class="form-info"><span class="required">*</span> These fields are required</span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="section-title">Contact Person</h3>
                            <div class="contact-info">
                                <h5>Alamat</h5>
                                <p>fasor Sepuluh Nopember ITS</p>

                                <h5>Email</h5>
                                <p>humas@fasor.its.ac.id</p>

                                <h5>Telepon</h5>
                                <p>031 812778</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3 class="section-title">Jam Kerja</h3>
                            <div class="contact-info">
                                <h5>Senin - Jumat</h5>
                                <p>08:00 - 16:00</p>

                                <h5>Sabtu dan Minggu</h5>
                                <p>Tutup</p>

                                <h5>Hari Libur</h5>
                                <p>Tutup</p>
                            </div>
                        </div>
                    </div>
                    <h3 class="section-title">Stay connected</h3>
                    <p>
                        Terhubunglah dengan kami di Sosial Media
                    </p>
                    <div class="social-media">
                        <a href="#"><i class="fa fa-facebook facebook"></i></a>
                        <a href="#"><i class="fa fa-google-plus google"></i></a>
                        <a href="#"><i class="fa fa-twitter twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>