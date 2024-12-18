<?php
/* Template Name: Development */
get_header();
$page_id = get_the_ID();
$current_language = pll_current_language();
$section_1 = get_field('section_1',$page_id);
$section_2 = get_field('section_2',$page_id);
$banner = get_field('banner',$page_id);
$title = $section_1['title'];
$image1 = $section_1['image'];
$title2 = $section_2['title'];
$image2 = $section_2['image'];
$description2 = $section_2['description'];
$production = get_field('production',$page_id);
$p_title = $production['title'];
$p_video = $production['video_url'];
$p_video_img = $production['video_image'];
$p_description = $production['description'];
$p_image = $production['image'];

$hongqi_brand = 'Brand';
if ($current_language === 'hy') {
    $hongqi_brand = 'Բրենդ';
}
?>
<main class="hgq-page page-development page-brand sub-page">
    <header>
        <img  src="<?php _e($banner) ?>" alt="page development hongqi armenia"/>
    </header>
    <section class="development">
        <h1 class="development_title">
            <?php _e($title); ?>
        </h1>
        <div class="section_1">
            <img class="desktop"  src="<?php _e($image1) ?>" alt="page development hongqi armenia"/>
            <img class="mobile d-none"  src="https://www.hongqi-auto.com/images/deveimgs/wap_9.png" alt="page development hongqi armenia"/>
        </div>
    </section>
    <section class="layout">
        <h1 class="development_title">
            <?php _e($title2); ?>
        </h1>
        <div class="section_1">
            <div class="desc">
                <?php _e($description2);?>
            </div>
            <img  src="<?php _e($image2) ?>" alt="page development hongqi armenia"/>
        </div>
    </section>
    <section class="production">
        <h1 class="development_title">
            <?php _e($p_title); ?>
        </h1>
        <div class="section_production">
            <div class="video-block">
                <div class="video_wrapper">
                    <img src="<?php _e($p_video_img); ?>" alt="">
                    <div class="video_btn">
                        <a href="javascript:;">
                            <img src="https://www.hongqi-auto.com/images/deveimgs/video_btn_03.png" alt="">
                        </a>
                    </div>
                    <video  controls="controls" muted="" autoplay="" class="video_con d-none" width="500">
                        <source src="<?php _e($p_video); ?>" type="video/ogg">
                    </video>
                </div>
                <div class="text-block">
                    <p>
                        <?php _e($p_description);?>
                    </p>
                </div>
            </div>
            <div class="banner_production">
                <img  src="<?php _e($p_image) ?>" alt="page development hongqi armenia"/>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();?>
