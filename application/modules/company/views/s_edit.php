<script type="text/javascript" src="<?php echo base_url(); ?>gui_modul/ckeditor/ckeditor.js"></script>
<!-- Primary box -->
<section class="content-header">
    <h1>
        News Room
        <small>News Edit</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url("index.php/home/u") ?>"><i class="fa fa-dashboard"></i> news room</a></li>
        <li class="active">edit news</li>
    </ol>
</section>
<div class="content">
    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">Berita dan Artikel</h3>
            
        </div>
        <div class="box-body">
            <?php echo form_open_multipart('company/' . $this->session->userdata['logged_in']['privilege'] . '/simpanedit'); ?>
        <div class="form-group">
            <label>Judul Berita</label>
            <input class="form-control" type="text" name="judul" required value="<?php echo $berita[0]->judul;?>"/>
        </div>
        <div class="form-group">
            <label>Jenis Berita</label>
            <select name="jenis" class="form-control m-bot15">
                <?php
                foreach ($jenis as $data) {
                    if($data->idjenis_artikel==$berita[0]->jenis_artikel_idjenis_artikel)
                        echo "<option SELECTED value='" . $data->idjenis_artikel . "'>" . $data->nama . "</option>";
                    else echo "<option value='" . $data->idjenis_artikel . "'>" . $data->nama . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" id="content" class="form-control"><?php echo $berita[0]->isi; ?></textarea>
            <?php echo display_ckeditor($ckeditor); ?>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-default" value="Simpan"/>
            <input type="hidden" value="<?php echo $berita[0]->idartikel;?>" name="idartikel"/>
        </div>

        <?php echo form_close() ?>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>