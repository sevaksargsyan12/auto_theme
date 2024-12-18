<?php
/* Template Name: Achievement */
get_header();
$page_id = get_the_ID();
$current_language = pll_current_language();
$banner = get_field('banner',$page_id);
$awards = get_field('awards',$page_id);
$awards_title = $awards['title'];
$awards_items = $awards['award_item'];

$international_motor_show = get_field('international_motor_show',$page_id);
$motor_title = $international_motor_show['title'];
$motor_items = $international_motor_show['show_item'];

$international_development = get_field('international_development',$page_id);
$development_title = $international_development['title'];
$development_sub_title = $international_development['sub_title'];
$development_items = $international_development['items'];

$show_more = 'Show More';
if ($current_language === 'hy') {
    $show_more = 'Տեսնել ավելին';
}
?>
<main class="hgq-page page-achievement page-brand sub-page">
    <header>
        <img  src="<?php _e($banner) ?>" alt="page achievement hongqi armenia"/>
    </header>
    <section class="achievement_wrapper">
        <h1 class="achievement_title">
            <?php the_title(); ?>
        </h1>
        <div class="awards block">
            <h2 class="achievement_sub_title">
                <?php _e($awards_title); ?>
            </h2>
            <div class="items text-center">
                <?php

//                var_dump($awards_items);
                $index = 0;
                foreach ($awards_items as $awards_item):
                    $awards_item_top_text = $awards_item['top_text'];
                    $awards_item_bottom_text = $awards_item['bottom_text'];
                    $awards_item_images = $awards_item['images'];
                    $d_none_height = $index > 1 ? 'd-none' : '';
                    ?>
                <div class="award_item <?php _e($d_none_height);?>">
                    <p class="top">
                        <?php _e($awards_item_top_text);?>
                    </p>
                    <div class="images">
                        <?php
                        $count = count($awards_item_images);
                        foreach ($awards_item_images as $image):?>
                            <img class="size<?php _e($count);?>" src="<?php _e($image['image']) ?>" alt="page achievement hongqi armenia"/>
                        <?php endforeach;?>
                    </div>
                    <p class="bottom">
                        <?php _e($awards_item_bottom_text);?>
                    </p>
                </div>
                <?php $index++; endforeach;?>
                <?php if($d_none_height):?>
                <button class="More-btn with-hover show_more">
                    <?php _e($show_more);?>
                </button>
                <?php endif; ?>
            </div>
        </div>
        <div class="awards block">
            <h2 class="achievement_sub_title">
                <?php _e($development_title); ?>
            </h2>
            <div class="development">
                <h6>
                    <?php _e($development_sub_title); ?>
                </h6>
                <div class="row product-row datas g-3">
                <?php
                foreach ($development_items as $data):
                    $image = $data['image'];
                    $title = $data['text'];

                    ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="product-item img-ani-wrap d-ani d-up">
                            <div class="product-con reset-img-height" pimgh="368" mimgh="456">
                                <img
                                    pcsrc="<?php _e($image); ?>"
                                    msrc="<?php _e($image); ?>"
                                    class="img-ani rotate-wrap d-rotateY"
                                    src="<?php _e($image); ?>"/>
                            </div>
                            <div class="bottom-mask">
                                <div class="mask-text single-line"><span><?php _e(($title)); ?></span></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            </div>
        </div>
        <div class="awards block">
            <h2 class="achievement_sub_title">
                <?php _e($motor_title); ?>
            </h2>
            <div class="items text-center">
                <?php

                //                var_dump($awards_items);
                $index = 0;
                foreach ($motor_items as $awards_item):
                    $awards_item_top_text = $awards_item['top_text'];
                    $awards_item_bottom_text = $awards_item['bottom_text'];
                    $awards_item_images = $awards_item['images'];
                    $d_none_height = $index > 1 ? 'd-none' : '';
                    ?>
                    <div class="award_item <?php _e($d_none_height);?>">
                        <p class="top">
                            <?php _e($awards_item_top_text);?>
                        </p>
                        <div class="images">
                            <?php
                            $count = count($awards_item_images);
                            foreach ($awards_item_images as $image):?>
                                <img class="size<?php _e($count);?>" src="<?php _e($image['image']) ?>" alt="page achievement hongqi armenia"/>
                            <?php endforeach;?>
                        </div>
                        <p class="bottom">
                            <?php _e($awards_item_bottom_text);?>
                        </p>
                    </div>
                    <?php $index++; endforeach;?>
                <?php if($d_none_height):?>
                    <button class="More-btn with-hover show_more">
                        <?php _e($show_more);?>
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();?>
