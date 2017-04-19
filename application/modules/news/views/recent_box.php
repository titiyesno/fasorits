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
<div class="col-sm-4">
<section class="panel">
    <header class="panel-heading">
        Berita Terbaru
        <span class="tools pull-right">
            
        </span>
    </header>
    <div class="panel-body">
        <?php if(isset($recent) && count($recent) > 0){
         foreach($recent as $data){?>
        <h5><a href="<?php echo base_url("index.php/news/u/getberita/".$data->idartikel);?>"><?php echo $data->judul;?></a></h5>
        <p>Oleh <?php echo $data->nama;?> pada <?php echo $data->tanggal_buat;?></p>
        <hr/>
         <?php }}
            else {
                echo '<h3><b>Berita Tidak Ditemukan</b></h3>';
                
            }
        ?>  
    </div>
</section>
</div>