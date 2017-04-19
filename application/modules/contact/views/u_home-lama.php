<section class="breadcrumb-wrapper direktori">
        <div class="container">
                <h2>Contact Us</h2>
            
            <ol class="breadcrumb">
                <li><a href="">Home</a></li>
                <li class="active">Contact</li>
            </ol>
        </div>
    </section>
<section id="google-map">
    	<div id="map-canvas"></div>
        <div class="container">
            <div class="map-overlay-wrapper">
                <div class="map-overlay">
                    <div class="pull-left"><i class="fa fa-map-marker"></i></div>
                    <div class="pull-left">
                    	<h3>Jakarta Office</h3>
                        <ul class="list-unstyled">
                            <li>Jl. Lenteng Agung Raya 11A</li>
                            <li>Jagakarsa, Jakarta Sealatan </li>
                            <li>(021) 788 85716</li>
                        </ul>
                    </div>
                </div>
                <div class="map-overlay">
                    <div class="pull-left"><i class="fa fa-map-marker"></i></div>
                    <div class="pull-left">
                    	<h3>Surabaya Office</h3>
                        <ul class="list-unstyled">
                            <li>Jl. Raya Dharma Husada 181</li>
                            <li>  Surabaya 60286 </li>
                            <li>(031) 592 9500   </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="content" id="contact">
    	<div class="container">
            <div class="row">
            	<div class="col-sm-6">
                	<h2>Leave a message</h2>
                        <form method="post" action="<?php echo base_url('index.php/contact/u/submit')?>">
                        <fieldset>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="name">Your name:<span>*</span></label>
                                    <input type="text" class="form-control " placeholder="Your name:" id="name" name="nama" required>
                                </div>                               
                            </div>
                            
                            <div class="row">
                            	<div class="form-group col-sm-12">
                                    <label for="email2">Your email:<span>*</span></label>
                                    <input type="email" class="form-control " placeholder="Your email:" name="email" id="email2" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="message">Your message:<span>*</span></label>
                                    <textarea class="form-control" placeholder="Your message:" id="message" name="pesan" required></textarea>
                                    <button type="submit" id="send" class="btn btn-primary btn-sm"><i class="fa fa-check"></i>Submit</button>
                                    <span class="form-info"><span class="required">*</span> These fields are required</span>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-sm-6">
                	<h2>Contact</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec lorem quis est ultrices volutpat.</p>
                    <div class="panel-group" id="accordion">
                            
                        <div class="panel panel-primary">
                            <div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><i class="fa fa-globe"></i>Contact Informations</a></h4></div>
                            <div id="collapse1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                	<ul class="list-unstyled contact-address">
                                        <li><a>promosi.coffeetoffee@gmail.com</a></li>
                                        <li>facebook.com/Coffee-Toffee Indonesia</li>
                                        <li>twitter.com/CoffeeToffeeIDN</li>
                                        
                                        <li>coffeetoffee.co.id</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel panel-primary">
                            <div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse2"><i class="fa fa-heart"></i>Social Pages</a></h4></div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                	<ul class="brands brands-md brands-inline brands-transition brands-circle main">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                    
                </div>
            </div>            
        </div>
    </section>  
    