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
</style>
<div class="pg-opt pin">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Kontak</h2>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Kontak</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-2">&nbsp;</div>
    <div class="col-sm-6">

        <div class="panel-body">
            <h1>
                RSUD Nganjuk akan senantiasa mengutamakan keselamatan dan kesembuhan pasien... 
            </h1>
            <ul>
                <li> Jalan. Dr. Soetomo No. 62 Nganjuk Jawa Timur 64415 Indonesia  </li>
                <li>(0358) 321818, 321209, 321489 </li>
                <li>(0358) 325003</li>
                <li>Jangan ragu hubungi kami</li>
            </ul>
        </div>
    </div>
    <?php $this->load->view('u_recent'); ?>
</div>