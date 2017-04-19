
<script src="<?php echo base_url(); ?>assets/web_statis/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/web_statis/ckeditor/adapters/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/global/js/jquery.js"></script>
<div id="container">
    <center><h3 class="oxigenfontblue">Ubah Berita</h3></center>
    <hr>
    <?php 
    echo form_open_multipart('berita/admin/simpanperubahan');?>
        <div class="row">
            <div class="large-3 columns">
                <label for="judul" class="oxigenfont right inline" style="color: black">
                    Judul Berita
                </label>
            </div>
            <div class="large-7 columns">
                <textarea required name="judul" value="" style="width: fit-content" ><?php echo $hasil[0]->JUDUL ?></textarea>
            </div>
            <div class="large-2 columns">
            </div>
        </div>
    <div class="row">
            <div class="large-3 columns">
                <label for="judul" class="oxigenfont right inline" style="color: black">
                    Alamat Virtual Tour
                </label>
            </div>
            <div class="large-7 columns">
                <input type="text" required name="vr" value="<?php echo $hasil[0]->vr ?>" style="width: fit-content" />
            </div>
            <div class="large-2 columns">
            </div>
        </div>
        <div class="row">
            <div class="large-3 columns">
                <label for="isi" class="oxigenfont right inline" style="color: black">
                    Isi Berita
                </label>
            </div>
            
            <div class="large-7 columns">
                <textarea name="content"><?php echo $hasil[0]->TEXT_BERITA ?></textarea>
                <script>
                    CKEDITOR.replace( 'editor1' );
                </script>
            </div>
            <div class="large-2 columns">
            </div>
        </div>
        <div class="row" style="margin-top: 15px">
            <div class="large-3 columns">
                <label for="jenis" class="oxigenfont right inline" style="color: black">
                    Jenis Berita
                </label>
            </div>
            <div class="large-7 columns">
                <input type="text" value="<?php echo $hasil[0]->JENIS_BERITA ?>" placeholder="Jenis Berita" id="jenis" name="jenis" required/>
            </div>
            <div class="large-2 columns">
            </div>
        </div>
        <div class="row">
            <div class="large-3 columns">
                <label for="gambar" class="oxigenfont right inline" style="color: black">
                    Gambar
                </label>
            </div>
            <div class="large-7 columns"></label>
                <img style="padding-bottom: 10px;"src="<?php mem("assets/berita/gambar/".$gambar[0]->ALAMAT_GAMBAR) ?>">
            </div>
            <div class="large-2 columns">
            </div>
        </div>
        <div class="row">
            <div class="large-3 columns">
                <label for="gambar" class="oxigenfont right inline" style="color: black">
                    File
                </label>
            </div>
            <div class="large-7 columns"></label>
                <?php if(!empty($file)) { ?>
                    <?php foreach($file as $t) {?>
                        <div class="row">
                            <div class="large-12 columns">
                                <a href="<?php echo mem("assets/berita/file_berita/".$t->nama_file)?>"><?php echo $t->nama_file?></a>
                            </div>
                        </div>
                    <?php }?>
                <?php } else { ?>
                    <label for="ket" class="oxigenfont left inline" style="color: black">
                    Tidak Ada File Untuk Berita Ini
                    </label>
                <?php } ?>
            </div>
            <div class="large-2 columns">
            </div>
        </div>
        <div class="row">
            <div class="large-3 columns">
                <label for="tes" class="oxigenfont right inline" style="color: black">
                    Tambahkan File
                </label>
            </div>
            <div class="large-7 columns">
                <input type="file" value="Tambah File" name="userfile" size="10" /><br>
                <small>Ukuran File < 2Mb, Jenis: pdf </small><br>
                <?php echo $error['error']; ?>
            </div>
            <div class="large-2 columns">
            </div>
        </div>
        <div class="row">
            <div class="large-6 columns">
                <input type="hidden" name="idberita" id="idberita" value="<?php echo $hasil[0]->ID_BERITA ?>" />
                <center><input class="center button" type="submit" value="Simpan" style="border: 0px; margin-top: 30px"></center>
            </div>
            <div class="large-6 columns">
                <center><a class="button oxigenfont" style="border: 0px; margin-top: 30px; background-color: #e9635b" href="<?php echo base_url(); ?>index.php/berita/admin/hapus/<?php echo $hasil[0]->ID_BERITA ?>">Hapus</a></center>
            </div>
            
            
        </div>
    </form>
        
</div>