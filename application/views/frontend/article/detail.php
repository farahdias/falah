<!-- breadcrumb-area -->
<section class="breadcrumb-area d-flex align-items-center" style="background-image:url(<?= base_url() ?>assets/img/testimonial/test-bg.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="breadcrumb-wrap text-center">
                    <div class="breadcrumb-title mb-30">
                        <h2><?= strtoupper($page['tipe']) ?></h2>                                   
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <a href="<?= site_url('article') ?>">Article</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->
<!-- inner-blog -->
<section class="inner-blog b-details-p pt-120 pb-80">
    <div class="container">
        <div class="row">
            <?php 
            $col = '12';
            if($page_type == 'service'){ $col = '8'; ?>

                <div class="col-lg-4">
                    <div class="sidebar-widget categories">
                        <div class="widget-content">
                            <!-- Services Category -->
                            <ul class="services-categories">
                                <?php foreach ($service as $row){ ?>
                                     <li <?php if($row['content_id'] == $page['content_id']){ echo "class='active'"; } ?>><a href="<?= site_url('service/'.$row['content_id'].'/'.$row['content_slug']) ?>"><?= $row['content_header'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>

            <?php } ?>
            
            <div class="col-lg-<?= $col ?>">
                <div class="blog-details-wrap">
                    <?php if($page_type == 'article'){ ?>
                        <div class="bsingle__post-thumb mb-30">
                            <center>
                                <img style="width: 1000px; height: 600px" src="<?= base_url('assets/images/content/'.$page['featured_img']) ?>" alt="">
                            </center>
                        </div>
                        <div class="meta__info">
                            <ul>
                                <li><a href="#"><i class="far fa-user"></i>by <?= $page['nama'] ?></a></li>
                            </ul>
                        </div>
                    <?php } ?>
				    
                    <div class="details__content pb-50">
                        <h2><?= $page['content_header'] ?></h2>
                        <p>
                            <?= $page['content_value'] ?>
                        </p>
                    </div>

                    <?php if($page_type == 'article'){ ?>

                        <div class="posts_navigation pt-35 pb-35">
                            <div class="row align-items-center">
                                <div class="col-xl-4 col-md-5">
                                    <div class="prev-link">
                                        <span>Prev Post</span>
                                        <?php if($related['prev'] != ''){ ?>
                                            <h4><a href="<?= site_url('article/'.$related['prev']['id'].'/'.$related['prev']['content_slug']) ?>">
                                                <?= $related['prev']['content_header'] ?>
                                            </a></h4>
                                        <?php } ?>
                                        
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-2 text-left text-md-center">
                                    <a href="<?= site_url('article') ?>" class="blog-filter"><img src="<?= base_url() ?>assets/img/icon/c_d01.png" alt=""></a>
                                </div>
                                <div class="col-xl-4 col-md-5">
                                    <div class="next-link text-left text-md-right">
                                        <span>next Post</span>
                                        <?php if($related['next'] != ''){ ?>
                                            <h4><a href="<?= site_url('article/'.$related['next']['id'].'/'.$related['next']['content_slug']) ?>">
                                                <?= $related['next']['content_header'] ?>
                                            </a></h4>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- inner-blog-end -->