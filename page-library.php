<?php
/* Template Name: Library */
get_header();
$images = get_field('images', 'option');
$videos = get_field('videos', 'option');
$datas = get_field('data', 'option');
$current_language = pll_current_language();

$pictures_title = 'hongqi pictures';
$videos_title = 'hongqi videos';
$data_title = 'hongqi data';
// Check the active language
if ($current_language === 'hy') {
    $pictures_title = 'hongqi նկարներ';
    $videos_title = 'hongqi տեսանյութեր';
    $data_title = 'hongqi տվյալները';
}
?>
<style>
    .grid-item {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        min-height: 150px; /* Adjust the height here */
        transition: transform 0.3s ease;
    }
    .grid-item:hover {
        transform: scale(1.05);
    }

    .hgq-container {
        max-width: 2560px;
        width: 92%;
        margin: 0 auto;
    }
</style>
<div class="page-library hq-page">
        <div class="hgq-container my-5">
            <?php

            ?>
            <h2 class="column-name title d-opacity d-ani delay100 d-up txt-uppercase"><?php _e($pictures_title); ?></h2>
            <div class="row product-row images g-3">
                <?php
                foreach ($images as $image):
                $image = $image['picture'];
                ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="product-item img-ani-wrap d-ani d-up">
                        <div class="d-mask"></div>
                        <div class="product-con reset-img-height" pimgh="368" mimgh="456">
                            <img
                                    pcsrc="<?php _e(esc_url($image['url'])); ?>"
                                    msrc="<?php _e(esc_url($image['url'])); ?>"
                                    class="img-ani rotate-wrap d-rotateY"
                                    src="<?php _e(esc_url($image['url'])); ?>"/>
                        </div>
                        <div class="bottom-mask">
                            <div class="mask-text single-line"><span><?php _e(esc_url($image['title'])); ?></span></div>
                            <div class="mask-icon">
                                <div class="iconxiazai1">
                                    <a href="javascript:;" class="hgq-download" data-src="<?php _e(esc_url($image['url'])); ?>">
                                        <span class="iconfont iconxiazai1"></span>
                                        <i class="fa-solid fa-cloud-arrow-up"></i>                                    </a>
                                </div>
                                <div class="iconsearch">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                            </div>
                        </div>
                    </div>

<!--                    <div class="grid-item">Item 1</div>-->
                </div>
                <?php endforeach; ?>
            </div>
            <h2 class="column-name title d-opacity d-ani delay100 d-up txt-uppercase"><?php _e($videos_title); ?></h2>
            <div class="row product-row videos g-3">
                <?php
                foreach ($videos as $video):
                    $image = $video['image'];
                    $url = $video['video'];
                    $title = $video['title'];

                    if ($current_language === 'hy') {
                        $title = $video['title_am'];
                    }
                    ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="product-item img-ani-wrap d-ani d-up">
                            <div class="d-mask"></div>
                            <div class="product-con reset-img-height" pimgh="368" mimgh="456">
                                <img
                                        pcsrc="<?php _e($image); ?>"
                                        msrc="<?php _e($image); ?>"
                                        class="img-ani rotate-wrap d-rotateY"
                                        src="<?php _e($image); ?>"/>
                            </div>
                            <div class="bottom-mask">
                                <div class="mask-text single-line"><span><?php _e(esc_url($title)); ?></span></div>
                                <div class="mask-icon">
                                    <div class="iconxiazai1">
                                        <a href="javascript:;" class="hgq-download" data-src="<?php _e(esc_url($url)); ?>">
                                            <span class="iconfont iconxiazai1"></span>
                                            <i class="fa-solid fa-cloud-arrow-up"></i>                                    </a>
                                    </div>
                                    <div class="iconsearch">
                                        <i class="fa-solid fa-video"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--                    <div class="grid-item">Item 1</div>-->
                    </div>
                <?php endforeach; ?>
            </div>
            <h2 class="column-name title d-opacity d-ani delay100 d-up txt-uppercase"><?php _e($data_title); ?></h2>
            <div class="row product-row datas g-3">
                <?php
                foreach ($datas as $data):
                    $image = $data['image'];
                    $document = $data['document'];
                    $title = $data['title'];

                    if ($current_language === 'hy') {
                        $title = $data['title_am'];
                        $document = $data['document_am'];
                    }
                    ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="product-item img-ani-wrap d-ani d-up">
                            <div class="d-mask"></div>
                            <div class="product-con reset-img-height" pimgh="368" mimgh="456">
                                <img
                                        pcsrc="<?php _e($image); ?>"
                                        msrc="<?php _e($image); ?>"
                                        class="img-ani rotate-wrap d-rotateY"
                                        src="<?php _e($image); ?>"/>
                            </div>
                            <div class="bottom-mask">
                                <div class="mask-text single-line"><span><?php _e(($title)); ?></span></div>
                                <div class="mask-icon">
                                    <div class="iconxiazai1">
                                        <a href="javascript:;" class="hgq-download" data-src="<?php _e(esc_url($document)); ?>">
                                            <span class="iconfont iconxiazai1"></span>
                                            <i class="fa-solid fa-cloud-arrow-up"></i>                                    </a>
                                    </div>
<!--                                    <div class="iconsearch">-->
<!--                                        <i class="fa-solid fa-video"></i>-->
<!--                                    </div>-->
                                </div>
                            </div>
                        </div>

                        <!--                    <div class="grid-item">Item 1</div>-->
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
</div>
<?php
get_footer(); ?>
