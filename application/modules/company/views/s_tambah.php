<script type="text/javascript" src="<?php echo base_url(); ?>gui_modul/ckeditor/ckeditor.js"></script>
<!-- Primary box -->
<section class="content-header">
    <h1>
        Company
        <small>Add Company</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url("index.php/home/u") ?>"><i class="fa fa-dashboard"></i> Company</a></li>
        <li class="active">add company</li>
    </ol>
</section>
<div class="content">
    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">company Article</h3>
            
        </div>
        <div class="box-body">
            <?php echo form_open_multipart('company/' . $this->session->userdata['logged_in']['privilege'] . '/simpantambah'); ?>
            <div class="form-group">
                <label>Judul Berita</label>
                <input class="form-control" type="text" name="judul" required/>
            </div>
            <div class="form-group">
                <label>Jenis Berita</label>
                <select name="jenis" class="form-control m-bot15">
                    <?php
                    foreach ($jenis as $data) {
                        echo "<option value='" . $data->idjenis_artikel . "'>" . $data->nama . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea name="isi" id="content" class="form-control"><?php echo $content_html; ?></textarea>
                <?php echo display_ckeditor($ckeditor); ?>
            </div>
            <div class="form-group">
                <input type="submit" name="Buat Artikel" class="btn btn-default"/>
            </div>
            <?php echo form_close() ?>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>