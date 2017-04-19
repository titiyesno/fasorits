<div class="pg-opt pin">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Gallery fasor ITS</h2>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Gallery</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="slice bg-3 animate-hover-slide">
    <div class="w-section inverse work work-no-space g3">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="sort-list-btn hidden-xs">
                        <button type="button" class="btn btn-two filter" data-filter="all"><i class="fa fa-th-large"></i> Lihat Semua</button>
                        <?php foreach ($kategori as $data) { ?>
                            <button type="button" class="btn btn-five filter" data-filter="<?php echo $data->idgaleri ?>"><?php echo $data->nama ?></button>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">          
                <div id="ulSorList">
                    <?php foreach ($gambar as $data) { ?>
                        <div class="mix <?php echo $data->idgaleri ?>" data-cat="1">
                            <div class="w-box inverse">
                                <div class="figure">
                                    <img alt="" style="width: 400px; height: 250px;" src="<?php echo base_url(); ?>gui_modul/galeri/<?php echo $data->alamat ?>" class="img-responsive">
                                    <div class="figcaption bg-2"></div>
                                    <div class="figcaption-btn">
                                        <a href="<?php echo base_url(); ?>gui_modul/galeri/<?php echo $data->alamat ?>" class="btn btn-xs btn-one theater"><i class="fa fa-plus-circle"></i> Zoom</a>
                                    </div>
                                    <div class="figcaption-txt">
                                        <p class="title">
                                        </p>
                                        <p class="subtitle">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="gap">

                    </div>
                </div>
            </div>
        </div>    	
    </div>
</section>