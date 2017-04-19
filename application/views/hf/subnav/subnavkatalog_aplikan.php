<script type="text/javascript" src="<?php echo base_url(); ?>/static/js/jquery-1.10.2.min.js"></script>
<script>
    function assignIDgaleri()
    {
        var datanya = {};
        datanya.d = {};
        datanya.d.idgedung = document.getElementById("idgedung").value;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>/index.php/kamar/aplikan/getgedung_byid",
            data: datanya,
            success: function(data){
                document['formkataloggedung'].action = '<?php echo base_url(); ?>/index.php/kamar/aplikan/kataloggedung/'+data.datagedung[0]['ID_GALERI'];
            }
        });
    }
    
    function assignIDjeniskamar()
    {
        var datanya = {};
        datanya.d = {};
        datanya.d.idjeniskamar = document.getElementById("idjeniskamar").value;
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>/index.php/kamar/aplikan/getjeniskamar_byid",
            data: datanya,
            success: function(data){
                document['formkatalogjeniskamar'].action = '<?php echo base_url(); ?>/index.php/kamar/aplikan/katalogjeniskamar/'+data.datajeniskamar[0]['id_galeri'];
            }
        });
    }
</script>
<div class="section-container accordion" data-section="accordion" style="margin-top: 50px;">
    <section >
        <p class="title" data-reveal-id="GedungModal" data-section-title><a href="#">Gedung</a></p>
    </section>
    <section >
        <p class="title" data-reveal-id="JenisKamarModal" data-section-title><a href="#">Kamar</a></p>
    </section>
    <section >
        <p class="title" data-section-title><a href="<?php echo base_url() ?>index.php/kuisioner/aplikan">Isi Kuisioner</a></p>
    </section>
    <section >
        <p class="title" data-section-title><a href="<?php echo base_url();?>index.php/navigasi/aplikan">Peta</a></p>
    </section>
</div>
<div id="GedungModal" class="reveal-modal  small">  
    <center><h3 class="oxigenfontblue">Pilih Katalog Gedung</h3></center>
  <hr>
  <form action="<?php echo base_url()?>index.php/kamar/aplikan/kataloggedung/1" name="formkataloggedung" method="POST" class="custom" >
  <div class="row">
        <div class="large-3 columns">
            <label for="gedung" class="oxigenfont right inline" style="color: black">
                Pilih Gedung
            </label>
            <input type="hidden" id="idgaleri" name="idgaleri" />
        </div>
        <div class="large-9 columns ">
            <select onchange="assignIDgaleri()"  type="text" name="idgedung" id="idgedung" >
                <?php foreach ($data_gedung as $r) { ?>
                    <option value="<?php echo $r->ID_GEDUNG;?>" ><?php echo $r->NAMA_GEDUNG; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
  <div class="row">
      <center><input class="center button" hre type="submit" value="Lihat Katalog" style="border: 0px; margin-top: 30px"></center>
  </div>
  </form>
  <a class="close-reveal-modal">×</a>
</div>

<div id="JenisKamarModal" class="reveal-modal  small">  
    <center><h3 class="oxigenfontblue">Pilih Katalog Jenis Kamar</h3></center>
  <hr>
  <form action="<?php echo base_url()?>index.php/kamar/aplikan/katalogjeniskamar/1" name="formkatalogjeniskamar" method="POST" class="custom" >
  <div class="row">
        <div class="large-3 columns">
            <label for="gedung" class="oxigenfont right inline" style="color: black">
                Pilih Jenis Kamar
            </label>
            <input type="hidden" id="idgaleri_jk" name="idgaleri_jk" />
        </div>
        <div class="large-9 columns ">
            <select onchange="assignIDjeniskamar()"  type="text" name="idjeniskamar" id="idjeniskamar" >
                <?php foreach ($list_jeniskamar as $r) { ?>
                    <option value="<?php echo $r->id_jenis_kamar;?>" ><?php echo $r->nama_jenis_kamar; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
  <div class="row">
      <center><input class="center button" hre type="submit" value="Lihat Katalog" style="border: 0px; margin-top: 30px"></center>
  </div>
  </form>
  <a class="close-reveal-modal">×</a>
</div>

<div id="exampleModal2" class="reveal-modal  small">  
  <h2>Yoi Broh.</h2> 
  <a class="close-reveal-modal">×</a>  
</div>
