<section class="slice bg-3">
        <div class="w-section inverse shop">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="text"> 
                            <?php  $cart_check = $this->cart->contents();
                            
                            // If cart is empty, this will show below message.
                            if(empty($cart_check)) {
                            echo 'To add products to your reservation cart click on "Add to Cart" Button'; 
                            }  ?> 
                        </div>
                        <?php  ($cart = $this->cart->contents()) ?>
                        <table class="table table-cart table-responsive">
                            <tbody>
                            <?php
                  if ($cart = $this->cart->contents()): ?>
                                <tr>
                                    <th></th>fasor
                                    <th>Nama Komponen</th>
                                    <th>Harga</th>
                                    <th>Kuantiti</th>
                                    <th>Total</th>
                                    <th>Delete</th>
                                </tr>
                            
                                <?php
                     // Create form and send all values in "shopping/update_cart" function.
                    
                    $grand_total = 0;
                    $i = 1;

                    foreach ($cart as $item):
                        //   echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        //  Will produce the following output.
                        // <input type="hidden" name="cart[1][id]" value="1" />
                        echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                        echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                        echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                        echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                        echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $item['name']; ?></td>
                            <td>Rp <?php echo number_format($item['price'], 2); ?></td>
                            <td><?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?></td>
                        <?php $grand_total = $grand_total + $item['subtotal']; ?>
                            <td>Rp <?php echo number_format($item['subtotal'], 2) ?></td>
                            <td>
                            <a href="<?php anchor('pemesanan/u/remove/' . $item['rowid'])?>" class="btn btn-two">Delete</a>
                            </td>
                     <?php endforeach; ?>
                                </tr>
                                
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                       
                    </div>
                    <div class="col-md-8">
                        <a href="/graha/index.php/pemesanan/u/" class="btn btn-two pull-right">Next Step</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>fasor