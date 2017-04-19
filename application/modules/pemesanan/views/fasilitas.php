 <script type="text/javascript">
            // To conform clear all data in cart.
            function clear_cart() {
                var result = confirm('Are you sure want to clear all bookings?');

                if (result) {
                    window.location = "<?php echo base_url(); ?>index.php/shopping/remove/all";
                } else {
                    return false; // cancel button
                }
            }
</script>
<div class="pg-opt pin">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Komponen Pemesanan</h2>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Pemesanan</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

  <?php $this->load->view('cart.php')?>

<section class="slice bg-3">
        <div class="w-section inverse shop">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="widget">
                            <h3 class="section-title">Kategori</h3>
                            <ul class="categories">
                            <?php foreach ($kategori as $key => $value) {
                                echo '<li><a href="'.base_url().'index.php/pemesanan/u/kategori/'.$value->idkategori.'">'.$value->nama.'<i></i></a></li>';
                            }?>

                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                        <?php foreach ($item as $key => $value) {
                        ?>
                            <div class="col-md-4">
                                <div id="product_div" class="w-box product">
                                    <div class="figure">
                                         <?php $isi = str_replace("<img", '<img alt="" class="fiximg" width="220px"' , str_replace("#CodeLinkUpload", base_url(), $value->keterangan)); ?>
                                     <?php
                                        preg_match('/<img.+src=[\'"](?P<src>.+)[\'"].*>/i', $isi, $image);
                                        preg_match_all('/<img[^>]+>/i', $isi, $result);
                                        print_r($result[0][0]);
                                      ?>
                                    </div>
                                    <h2><a href=""><?php echo $value->nama?></a></h2>
                                    <p>
                                    <?php echo $value->deskripsi?>
                                    </p>
                                    <div class="w-footer">
                                        <span class="price pull-left"><?php echo $value->harga?></span>
                                        <?php
                                        echo form_open('pemesanan/u/add');
                                        echo form_hidden('id', $value->iditem_sewa);
                                        echo form_hidden('name', $value->nama);
                                        echo form_hidden('price', $value->harga); 
                                        ?>
                                        <div id='add_button'>
                                            <?php
                                            $btn = array(
                                                'class' => 'btn btn-xs btn-two pull-right',
                                                'value' => 'Add to Cart',
                                                'name' => 'action'
                                            );
                                            
                                            // Submit Button.
                                            echo form_submit($btn);
                                            echo form_close();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }?>
                fasor   
                        </div>
                      
                        
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section>