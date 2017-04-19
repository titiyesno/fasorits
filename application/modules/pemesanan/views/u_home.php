<link href="<?php echo base_url() ?>/gui_modul/datepicker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">

<section class="slice bg-3">
    <div class="w-section inverse">
        <div class="container">
            <div class="row">
            
                <div class="col-md-6">
                    <h2><?php echo $olahraga[0]->olahraga;?></h2>
                    <h3 class="section-title">Jadwal <?php echo $olahraga[0]->lapangan;?></h3>
                    <p>
                        Hubungi kami untuk melayani kebutuhan Anda
                    </p>
                    <iframe style="height: 550px" src="<?php echo site_url() ?>/pemesanan/t"></iframe>
                </div>
                <div class='col-sm-6'>
                    <h3 class="section-title">Your Identity</h3>
                    <p>
                        Isilah Data Berikut Ini
                    </p>
                    <div class="form-group">
                        <div class="container">
                        <div class="row">
                            <div class='col-sm-6'>
                                <?php $this->load->view('uc_pemesanan');?>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>