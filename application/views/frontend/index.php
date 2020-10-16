<!-- slider-area -->
            <section id="home" class="slider-area fix p-relative">
               
                <div class="slider-active">
                <?php foreach ($slider as $row){ ?>
                	
                	<div class="single-slider slider-bg d-flex align-items-center" style="background-image:url(<?= base_url('assets/images/content/'.$row['featured_img']) ?>)">
                        <div class="container">
                            <div class="row">	
                                <div class="col-lg-5">
									
								</div>
                                <div class="col-lg-7">
                                    <div class="slider-content s-slider-content text-left">
                                        <h2 data-animation="fadeInUp" data-delay=".4s">
                                        	<?= $row['content_header'] ?>
                                        </h2>
                                        <p data-animation="fadeInUp" data-delay=".6s">
                                        	<?= $row['content_description'] ?>
                                        </p>
                                        <div class="slider-btn mt-55">                                          
                                            <a href="<?= site_url('article/'.$row['content_id'].'/'.$row['content_slug']) ?>" class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s">Read More</a><div class="btn-after" data-animation="fadeInRight" data-delay=".8s"></div>						
                                        </div>
                                    </div>
                                </div>
								
                            </div>
                        </div>
                    </div>

                <?php } ?>
				
                    </div>                    
               
               
            </section>
            <!-- slider-area-end -->

            <!-- services-area -->
            <section id="services" class="services-area services-bg services-two pt-120 pb-90"  style="background-image:url(<?= base_url() ?>assets/img/bg/services_aliment_bg.png); background-size: contain; background-repeat: no-repeat;background-position: center center;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-10 col-lg-10">
                            <div class="section-title text-center pl-40 pr-40 mb-80 wow fadeInDown animated" data-animation="fadeInDown animated" data-delay=".2s">
                                <span><small class="circle-left"><img src="<?= base_url() ?>assets/img/bg/circle_Left.png" alt="img"></small> Servis Kami <small class="circle-right"><img src="<?= base_url() ?>assets/img/bg/circle_right.png" alt="img"></small></span>
                                <h2>Servis yang kami tawarkan.</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    	<?php foreach ($service as $row){ ?>

                    			<div class="col-lg-4 col-md-6">
		                            <div class="s-single-services active wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
		                                <div class="services-icon">
		                                  <img src="<?= base_url('assets/images/content/'.$row['featured_img']) ?>" alt="img" class="d-active-icon">
		                                  <img src="<?= base_url('assets/images/content/'.$row['featured_img']) ?>" alt="img" class="active-icon">
		                                </div>
		                                <div class="second-services-content">
		                                    <h5><a href="<?= site_url('service/'.$row['content_id'].'/'.$row['content_slug']) ?>">
		                                    	<?= $row['content_header'] ?>
		                                    </a></h5>       
		                                    <p>
		                                    	<?= $row['content_description'] ?>
		                                    </p>
		                                </div>
										
		                            </div>
		                        </div>

                    	<?php } ?>
						
                    </div>
                    
                </div>
            </section>
            <!-- services-area-end -->
		
			 
             <!-- project-area-->
            <section id="project" class="project pt-120 fix" style="background-image:url(<?= base_url() ?>assets/img/bg/portfolio_bg.png); background-size: contain;background-repeat: no-repeat;">
              
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-10">
                            <div class="section-title text-left pl-40 pr-40 mb-80">
                                 <span>PORTFOLIO <small class="circle-right"><img src="<?= base_url() ?>assets/img/bg/circle_right.png" alt="img"></small></span>                               
                                <h2>Project yang kami kerjakan</h2>
                            </div>
                        </div>
                         <div class="col-xl-6 col-lg-10">
                            
                        </div>
                    </div>
                    </div>
                <div class="container-fluid">
                    <div class="row portfolio-active">
                    	<?php foreach ($project as $row) { ?>
                    		<div class="col-xl-4">
	                            <div class="single-project mb-30 wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
	                                <div class="project-thumb">                                   
	                                    <img src="<?= base_url('assets/images/content/'.$row['featured_img']) ?>" alt="img" class="img">                                                   
	                                </div>
	                                <div class="project-info">
	                                    <h4><?= $row['content_header'] ?></h4>
	                                      <a href="<?= site_url('article/'.$row['content_id'].'/'.$row['content_slug']) ?>">Lihat Project  <img src="<?= base_url() ?>assets/img/portfolio/right_icon.svg" alt="img">        </a>                          
	                                    
	                                </div>
	                            </div>
	                        </div>
                    	<?php } ?>
                    </div>
                </div>
            </section>
            <!-- project-area-end -->
			
           
			
            <!-- cta-area -->
            <section class="cta-area cta-bg pt-120 pb-120 mt-60">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="section-title cta-title wow fadeInLeft animated" data-animation="fadeInDown animated" data-delay=".2s">
                                <span>Kontak Kami <small class="circle-right"><img src="<?= base_url() ?>assets/img/bg/circle_right.png" alt="img"></small></span>
                                <h2 style="color:#333">Hubungi Kontak Kami</h2>
                                <p style="color:#333">Anda dapat menghubungi kontak kami yang tertera dibawah ini untuk mengetahui info lebih lanjut tentang layanan kami</p>
                                
                                <p style="color:#333">
                                    <b>Email :</b>  bniquarry@berkahnagregindonusa.com <br>
                                    <b>Telp :</b>  +62 812 2123 399 <br>
                                    <b>Alamat :</b>  Jl. Raya Nagreg Kendan, Kec. Nagreg, Bandung, Jawa Barat ( 40397 )
                                </p>
                            </div>
                                             
                        </div>
                    </div>
                </div>
            </section>
            <!-- cta-area-end -->   

			 <!-- brand-area -->
            <div class="brand-area pt-60 pb-60" style="background-color:#fff">
                <div class="container">
                    <div class="row brand-active">
                    	<?php foreach ($client as $row) { ?>
                    		<div class="col-xl-2">
	                            <div class="single-brand">
	                                <img src="<?= base_url() ?>assets/images/content/<?= $row['featured_img'] ?>" alt="img">
	                            </div>
	                        </div>
                    	<?php } ?>
                    </div>
                </div>
            </div>
            <!-- brand-area-end -->