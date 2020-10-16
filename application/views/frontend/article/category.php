<!-- breadcrumb-area -->
            <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(<?= base_url() ?>assets/img/testimonial/test-bg.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                            <div class="breadcrumb-wrap text-center">
                                <div class="breadcrumb-title mb-30">
                                    <h2><?= $header ?></h2>                                   
                                </div>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Category</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- breadcrumb-area-end -->
            <!-- inner-blog -->
            <section class="inner-blog pt-120 pb-120">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <?php foreach ($blog as $row) { ?>
                                <div class="bsingle__post mb-50">
                                    <div class="bsingle__post-thumb">
                                        <img src="<?= base_url('assets/images/content/'.$row['featured_img']) ?>" alt="">
                                    </div>
                                    <div class="bsingle__content">
                                        <div class="meta-info">
                                            <ul>
                                                <li><a href="#"><i class="far fa-calendar"></i> <?= date('d-m-Y H:i', strtotime($row['post_time'])) ?></a></li>
                                                <li><a href="#"><i class="far fa-user"></i>by <?= $row['nama'] ?></a></li>
                                            </ul>
                                        </div>
                                        <h2><a href="blog-details.html"><?= $row['content_header'] ?></a></h2>
                                        <p><?= $row['content_description'] ?></p>
                                            <div class="slider-btn">                                          
                                                <a href="<?= site_url('article/'.$row['content_id'].'/'.$row['content_slug']) ?>" class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s">Read More</a>                  <div class="btn-after" data-animation="fadeInRight" data-delay=".8s"></div>                     
                                            </div> 
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <div class="col-lg-4">
                            <aside>
                                <div class="widget mb-40">
                                    <div class="widget-title text-center">
                                        <h4>Categories</h4>
                                    </div>
                                    <ul class="cat__list">
                                        <?php foreach ($all_category as $row){ ?>
                                            <li><a href="<?= site_url('category/'.$row['category_id']) ?>"><?= $row['category_name'] ?> <span>(<?= $row['num_content'] ?>)</span></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>                              
                            </aside>
                        </div>
                    </div>
                </div>
            </section>