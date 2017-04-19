<script type="text/javascript" src="<?php echo base_url(); ?>gui_modul/ckeditor/ckeditor.js"></script>
<!-- Primary box -->
<section class="content-header">
    <h1>
        Edit Item
        <small>edit Item</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url("index.php/home/u") ?>"><i class="fa fa-dashboard"></i> Items</a></li>
        <li class="active">edit item</li>
    </ol>
</section>
<div class="content">
    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">Edit Item</h3>
            
        </div>
        <div class="box-body">
            <?php echo form_open_multipart('services/' . $this->session->userdata['logged_in']['privilege'] . '/simpanedit'); ?>
            <div class="form-group">
                <label>Nama Item</label>
                <input class="form-control" type="text" id="nama" name="nama" value="<?php echo $item[0]->nama?>" required/>
            </div>
            <div class="form-group">
                <label>Kategori Item</label>
                <select name="kategori_idkategori" class="form-control m-bot15">
                    <?php
                    
                    foreach ($jenis as $data) {
                        
                        if($data->idkategori==$item[0]->kategori_idkategori)
                            echo "<option ENABLE value='" . $data->idkategori . "'>" . $data->nama . "</option>";
                        else echo "<option value='" . $data->idkategori . "'>" . $data->nama . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Harga Sewa</label>
                <div class="col-sm-6"><input placeholder="Harga Item dalam Rupiah (Rp)" class="form-control" type="text" name="harga" value="<?php echo $item[0]->harga?>" required/></div>
                <div class="col-sm-6"><input placeholder="Satuan Item (contoh: Buah, Porsi)" class="form-control" type="text" name="satuan" value="<?php echo $item[0]->satuan?>" required/></div>
            </div>
            <div class="form-group">
                <label>Deskripsi Singkat</label>
                <textarea name="deskripsi" id="" class="form-control"><?php echo $item[0]->deskripsi?></textarea>
            </div>
            <div class="form-group">
                <label>Deskripsi Penuh</label>
                <textarea name="keterangan" id="content" class="form-control"><?php echo $item[0]->keterangan; ?></textarea>
                <?php echo display_ckeditor($ckeditor); ?>
            </div>
            <div class="form-group">
                <input type="hidden" name="iditem_sewa" value="<?php echo $iditem_sewa;?>" class="btn btn-default"/>
                <input type="submit" name="Buat Artikel" class="btn btn-default"/>
            </div>
            <?php echo form_close() ?>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>