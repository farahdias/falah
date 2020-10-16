<!doctype html>
<html class="no-js" lang="zxx">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Berkah Nagreg Indonusa</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>assets/images/logo.png">
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/animate.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/magnific-popup.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/dripicons.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/slick.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/default.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
        <link rel="stylesheet" href="<?= base_url() ?>assets/css/responsive.css">
        
        <style>
            iframe {
                height : 500px !important;
            }
        </style>
    </head>
    <body>
        <!-- header -->
        <header class="header-area">  
			<div class="header-top second-header d-none d-md-block">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-2 d-none d-lg-block">
                        </div>                       
                        <div class="col-lg-8 col-md-8 d-none  d-md-block">
                            <div class="header-cta">
                                <ul>
                                    <li>
                                        <i class="icon dripicons-phone"></i>
                                        <span>+62 812 2123 399</span>
                                    </li>
                                    <li>
                                        <i class="icon dripicons-mail"></i>
                                        <span>bniquarry@berkahnagregindonusa.com</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                         <div class="col-lg-2 col-md-4 d-none d-md-block">
                             <a href="#" class="top-btn">Senin - Jumat ( 07:00 17:00 )</a>
                             
                              
                        </div>
                    </div>
                </div>
            </div>		
            <div id="header-sticky" class="menu-area">
                <div class="container">
                    <div class="second-menu">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="<?= site_url() ?>"><img src="<?= base_url() ?>assets/images/logo.png" alt="logo" style="width:80px"></a>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9">
                                <div class="responsive"><i class="icon dripicons-align-right"></i></div>
                                <div class="main-menu text-center <text-xl-right></text-xl-right>">
                                    <nav id="mobile-menu">
                                        <ul>
                                            <li><a href="<?= site_url() ?>">Home</a></li>
                                            <li class="has-sub">
                                                <a href="services.html">Services</a>
                                                <ul>	
                                                    <?php foreach ($this->session->userdata('service') as $row) { ?>
                                                        <li><a href="<?= site_url('service/'.$row['content_id'].'/'.$row['content_slug']) ?>"><?= $row['content_header'] ?></a></li>
                                                    <?php } ?>
												</ul>
                                            </li>    
                                            
                                            <li class="has-sub">
                                                <a href="javascript:void(0)">Berita</a>
                                                <ul>	
                                                    <?php foreach ($this->session->userdata('category') as $row) { ?>
                                                        <li><a href="<?= site_url('category/'.$row['id']) ?>"><?= $row['category_name'] ?></a></li>
                                                    <?php } ?>
												</ul>
                                            </li>
                                            <!--<li><a href="<?= site_url('article') ?>">Berita</a></li>-->
                                            <li><a href="<?= site_url('about_us') ?>">Tentang Kami</a></li>
                                            <li><a href="<?= site_url('contact') ?>">Kontak Kami</a></li> 
                                            
                                        </ul>
                                    </nav>
                                </div>
                            </div>    
                             <div class="col-xl-1 col-lg-1 d-none d-lg-block">
                                 <div class="menu-search text-right">
                                    <a href="#"><i class="fas fa-search"></i></a>
                                 </div>
                                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-end -->
        <!-- main-area -->
        <main>
            <?= $contents ?>
        </main>
        <!-- main-area-end -->
        <!-- footer -->
        <footer class="footer-bg footer-p pt-100 pb-80 ">
  
            <div class="footer-top pb-30">
                <div class="container">
                    <div class="row justify-content-between">
                        
                        <div class="col-xl-6 col-lg-6 col-sm-6">
                            <div class="footer-widget mb-30">
                                <div class="f-widget-title">
                                    <h5>Info Kontak</h5>
                                </div>
                                <div class="footer-link">
                                    <div class="f-contact">
                                    <ul>
                                    <li>
                                        <i class="icon dripicons-phone"></i>
                                        <span>+62 812 2123 399</span>
                                    </li>
                                    <li>
                                        <i class="icon dripicons-mail"></i>
                                         <span><a href="#">bniquarry@berkahnagregindonusa.com</a></span>
                                    </li>
                                    <li>
                                      <i class="fal fa-map-marker-alt"></i>
                                         <span>Jl. Raya Nagreg Kendan, Kec. Nagreg, Bandung, Jawa Barat ( 40397 )</span>
                                    </li>
                                </ul>
                                    
                                    </div>
                                   
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-sm-3">
                            <div class="footer-widget mb-30">
                                <div class="f-widget-title">
                                    <h5>Link Perusahaan</h5>
                                </div>
                                <div class="footer-link">
                                    <ul>
                                        <li><a href="#"><i class="fas fa-chevron-right"></i> PT. Sumber Energi Alam Mineral</a></li>
                                        <li><a href="#"><i class="fas fa-chevron-right"></i> PT. Berkah Subang Bersama</a></li>
                                        <li><a href="#"><i class="fas fa-chevron-right"></i> PT. Sumber Energi Alam Lestari</a></li>
                                        <li><a href="#"><i class="fas fa-chevron-right"></i> PT. Berkah Bumi Ciherang</a></li>
                                        <li><a href="#"><i class="fas fa-chevron-right"></i> PT. Noblewealth Resources</a></li>
                                        <li><a href="#"><i class="fas fa-chevron-right"></i> PT. Santika Plastindo Utama</a></li>
                                        <li><a href="#"><i class="fas fa-chevron-right"></i> PT. Berkah Nagreg Indonusa</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>  
                        
                        <div class="col-xl-3 col-lg-3 col-sm-3">
                            <div class="footer-widget mb-30">
                                <div class="f-widget-title">
                                    <h5>Tentang PT. BNI</h5>
                                </div>
                                <div class="footer-link">
                                    <ul>
                                        <li><a href="https://berkahnagregindonusa.com/article/45/struktur-perusahaan"><i class="fas fa-chevron-right"></i> Struktur Organisasi</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> 
                        
                    </div>
                </div>
            </div>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="copyright-text text-center">
                                <p>&copy; 2020 Berkah Nagreg Indonusa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->


		<!-- JS here -->
        <script src="<?= base_url() ?>assets/js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="<?= base_url() ?>assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="<?= base_url() ?>assets/js/popper.min.js"></script>
        <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>assets/js/one-page-nav-min.js"></script>
        <script src="<?= base_url() ?>assets/js/slick.min.js"></script>
        <script src="<?= base_url() ?>assets/js/ajax-form.js"></script>
        <script src="<?= base_url() ?>assets/js/paroller.js"></script>
        <script src="<?= base_url() ?>assets/js/wow.min.js"></script>
        <script src="<?= base_url() ?>assets/js/js_isotope.pkgd.min.js"></script>
        <script src="<?= base_url() ?>assets/js/imagesloaded.min.js"></script>
        <script src="<?= base_url() ?>assets/js/parallax.min.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery.waypoints.min.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery.counterup.min.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery.scrollUp.min.js"></script>
        <script src="<?= base_url() ?>assets/js/parallax-scroll.js"></script>
        <script src="<?= base_url() ?>assets/js/jquery.magnific-popup.min.js"></script>
        <script src="<?= base_url() ?>assets/js/element-in-view.js"></script>
        <script src="<?= base_url() ?>assets/js/main.js"></script>
    </body>

</html>