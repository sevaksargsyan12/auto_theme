<?php
get_header();
$post_id = get_the_ID();
$header_image = get_field('header_image', $post_id);
$current_language = pll_current_language();

?>
<!--<div class="banner">-->
<!--    <img src="--><?php //_e($header_image);?><!--" alt="Banner" class="banner-image">-->
<!--</div>-->
<main class="hgq-post-car">
    <header class="responsive-header" style="background-image: url(<?php _e($header_image) ?>)">
        <div class="header-overlay position-absolute top-0 start-0 w-100 h-100">
            <h1 class="title-new-h9">HONGQI <?php the_title(); ?></h1>
        </div>
    </header>
    <div class="fh-config">
        <div class="panoramic-box">
            <div class="panoramic-left">
                <h1 class="title-new-h9 panoramic-left-bg"><?php the_title(); ?></h1>
                <!--            <img src="https://www.hongqi-auto.com/images/cartype/h9-new/h9_bg.png" alt="" class="panoramic-left-bg">-->
            </div>
            <div class="panoramic-center">
                <div class="h9-720">
                    <div class="h9-720-img">
                        <div>
                            <img src="https://www.hongqi-auto.com/images//cartype//h9-new/zhaun_1.png" alt=""
                                 class="zhuan-img">
                        </div>
                        <!-- <img src="https://www.hongqi-auto.com/images/cartype/h9-new/720.png" alt="" class="img-720"> -->
                        <div class="text-720">720 <span class="yuandian"> </span></div>
                    </div>
                    <?php
                    $click_to_enter = 'Click to enter';
                    if ($current_language === 'hy') {
                        $click_to_enter = 'Մուտք գործել';
                    }
                    $click_to_enter_url = get_field('enter_room_url', $post_id);
                    $consult_button = get_field('consult_button', $post_id);
                    ?>
                    <a target="_blank" href="<?php _e($click_to_enter_url);?>" class="h9-720-btn txt-uppercase">
                        <?php echo $click_to_enter ?>
                    </a>

                </div>
                <?php $index = 0;
                $color_settings = get_field('car_color_settings', $post_id); ?>
                <?php foreach ($color_settings as $color_setting): ?>
                    <img src="<?php _e($color_setting['color_car_image']); ?>"
                         class="<?php _e($index === 0 ? 'active ' : '') ?> color-car-image car-<?php _e($index); ?>"
                         alt="">
                    <?php $index++;endforeach; ?>
            </div>
            <div class="panoramic-right">
                <?php $index = 0;
                foreach ($color_settings as $color_setting): ?>
                    <div class="item-h9 <?php _e($index === 0 ? 'active-color' : '') ?> color-box color-icon-<?php _e($index) ?>"
                         data-index="<?php _e($index) ?>">
                        <div class="h9-color">
                            <img src="<?php _e($color_setting['color_icon']); ?>" alt="">
                        </div>
                        <div class="h9-title"><?php _e($color_setting['color_name']); ?></div>
                    </div>
                    <?php $index++; endforeach; ?>
            </div>

        </div>

    </div>
    <div class="carmodel_top">
        <div class="new-h9-param-title">
            <div class="pc-carmodel-btn txt-uppercase" onclick="anchorPoint('#consult')"><?php _e($consult_button);?></div>
            <img src="https://www.hongqi-auto.com/images/cartype/h9-new/h9-zhongxian.png" alt=""
                 class="new-h9-param-xian-1">
            <?php $characteristics = get_field('characteristics', $post_id);
            $features = $characteristics['feature'];
            //            var_dump($features);
            ?>
            <div class="new-h9-param-carname txt-uppercase"><?php _e($characteristics['main_feature']) ?></div>
            <img src="https://www.hongqi-auto.com/images/cartype/h9-new/h9-zhongxian.png" alt=""
                 class="new-h9-param-xian-2">
        </div>
        <div class="param-detail new-h9-param act">
            <div class="characteristics-content d-flex flex-wrap">
                <div class="row col-12">
                    <!--				--><?php //for ($i = 0; $i < 6; $i++) : ?>
                    <?php if (isset($features) && count($features)): ?>
                        <?php foreach ($features as $feature) : ?>
                            <div class="col-12 col-sm-6 col-md-4 mb-4">
                                <div class="char-block">
                                    <div class="char-title top"><?php _e($feature['name']); ?></div>
                                    <div class="char-description"><?php _e($feature['value']); ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php $pdf_specifications_url = get_field('pdf_specifications_url', $post_id); ?>
    <?php if ($pdf_specifications_url): ?>
        <div class="brake-system" id="car-params">
            <div>
                <span class="txt-uppercase">specifications</span>
                <i class="icon-up" style="transform: rotate(0deg);"></i>
            </div>
        </div>
        <section class="pdf-embed-wrapper m-auto" style="display: none;">
            <div class="pdf-block">
                <iframe src="<?php _e($pdf_specifications_url); ?>#toolbar=0"
                        width="100%" height="600px"
                ></iframe>
            </div>
        </section>
    <?php endif; ?>
    <?php $main_video_url = get_field('main_video_url', $post_id); ?>
    <?php $video = get_field('video', $post_id);
    $video_url = $video['video_url'];
    $video_content = "";
    $video_content = $video['video_content'];
    $video_overlay_color = $video['video_overlay_color'];
    ?>
    <?php if ($video_url): ?>
        <div class="video-container">
            <video autoplay muted loop playsinline>
                <source src="<?php _e($video_url) ?>" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="overlay" style="background-color: <?php _e($video_overlay_color) ?>"></div>
            <div class="content">
                <?php _e($video_content) ?>
                <!--        <h1>Welcome to Hongqi</h1>-->
                <!--        <p>Luxury and performance redefined</p>-->
            </div>
        </div>
    <?php endif; ?>
    <section class="car-model-content hgq-post-car-container">
        <?php the_content();?>
    </section>
    <div class="type-title" id="map1">
        <h2 class="text-h2-title txt-uppercase" id="consult"><?php _e($consult_button); ?></h2>
    </div>
    <section id="commen_test_drive" class="hgq-post-car-container ">
        <div class="contact-test-drive">
            <?php
            $contact_form_shortcode = '[contact-form-7 id="cda2931" title="Test Drive Sidebar"]';
            if ($current_language === 'hy') {
                $contact_form_shortcode = '[contact-form-7 id="aca6c2b" title="Test Drive Sidebar Հայերեն"]';
            }
            _e(do_shortcode($contact_form_shortcode));
            ?>
        </div>
        <div id="map">
            <iframe width="100%" height="450"
                    src="https://www.openstreetmap.org/export/embed.html?bbox=44.455%2C40.205%2C44.472%2C40.215&amp;layer=mapnik&amp;marker=40.20959354283777%2C44.46400344371796"
                    style="border: 1px solid #888787"></iframe>
            <br/><small><a
                        href="https://www.openstreetmap.org/?mlat=40.209594&amp;mlon=44.464003#map=18/40.209594/44.464003">Посмотреть
                    более крупную карту</a></small>
            <!--        --><?php //_e(do_shortcode('[google_map_easy id="1"]'));?>
        </div>
    </section>
    <!--<div class="container single-car-post">-->
    <!--	--><?php //if (have_posts()) : while (have_posts()) : the_post(); ?>
    <!--        <div class="car-model-single">-->
    <!--            <h1>--><?php //the_title(); ?><!--</h1>-->
    <!--			--><?php //if (has_post_thumbnail()) : ?>
    <!--                <div class="car-model-thumbnail">-->
    <!--					--><?php //the_post_thumbnail('large'); ?>
    <!--                </div>-->
    <!--			--><?php //endif; ?>
    <!--            <div class="car-model-content">-->
    <!--				--><?php //the_content(); ?>
    <!--            </div>-->
    <!--        </div>-->
    <!--	--><?php //endwhile; endif; ?>
    <!--</div>-->
</main>
<?php get_footer(); ?>
