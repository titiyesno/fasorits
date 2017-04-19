<section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> FASOR ITS
                                <small class="pull-right">Tanggal : <?php echo date("d-m-Y");?></small>
                            </h2>
                        </div><!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            Dari
                            <address>
                                <strong>UPT FASOR ITS</strong><br>
                                Graha Sepuluh Nopember ITS<br>
                                Phone: 031 812778<br>
                                Email: humas@fasor.its.ac.id
                            </address>
                        </div><!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong><?php echo $pemesan[0]->nama?></strong><br>
                                <?php echo $pemesan[0]->alamat?><br>
                                Phone: <?php echo $pemesan[0]->telp?><br>
                                Email: <?php echo $pemesan[0]->email?>
                            </address>
                        </div><!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #GRH <?php echo $pemesanan[0]->idpemesanan?></b><br>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- Table row -->


                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-xs-6">

                        </div><!-- /.col -->
                        <div class="col-xs-6">
                            <p class="lead">Amount Due 2/22/2014</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody><tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>50000</td>
                                    </tr>
                                </tbody></table>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
                            <a href="<?php echo base_url()?>/index.php/pemesanan/s/bayar/<?php echo $pemesanan[0]->idpemesanan?>" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Approve</a>  
                        </div>
                    </div>
                </section>
