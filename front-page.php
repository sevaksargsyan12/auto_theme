<?php
/* Template Name: Home */

get_header();
//$page_id = get_the_ID();
//$header_section = get_field('header_section', $page_id);
?>
<main class="page-home">

    <?php
    echo do_shortcode('[smartslider3 slider="2"]');
    ?>
    <!--    SECTION CATEGORIES -->
    <?php
    // Get all car types (taxonomy terms)
    $car_types = get_terms([
        'taxonomy' => 'car-type',
        'hide_empty' => false,
    ]);

    if (!empty($car_types)): ?>
        <section class="categories-and-models cartype txt-uppercase">
            <h2 class="title d-opacity delay100">
                EXPLORE hongqi
            </h2>
            <ul class="cartype-name categories-tabs act-switch d-opacity delay200">
                <?php foreach ($car_types as $index => $car_type): ?>
                    <?php if ($car_type->count): ?>
                        <li class="category-tab <?php echo $index === 0 ? 'active' : ''; ?>"
                            data-car-type="<?php echo esc_attr($car_type->slug); ?>">
                            <?php echo esc_html($car_type->name);
                            echo esc_html($car_type->count); ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>

            <div class="cartype-car-group d-opacity d-ani delay200">
                <?php foreach ($car_types as $index => $car_type): ?>
                    <?php if ($car_type->count): ?>

                        <?php
                        // Fetch car models for this car type
                        $car_models = new WP_Query([
                            'post_type' => 'car-model',
                            'tax_query' => [
                                [
                                    'taxonomy' => 'car-type',
                                    'field' => 'slug',
                                    'terms' => $car_type->slug,
                                ],
                            ],
                            'posts_per_page' => -1,
                        ]);
                        $post_count = $car_models->found_posts;
                        $post_count_css = $post_count > 4 ? 100 : $post_count * 25;
                        $rows = ceil($post_count / 4);
                        $ul_height = $rows * 250;
                        ?>
                        <div class="wrapper">

                            <ul style="width: <?php _e($post_count_css) ?>%;"
                                class="cartype-car <?php echo $index === 0 ? 'act' : ''; ?>"
                                data-car-type="<?php echo esc_attr($car_type->slug); ?>">
                                <?php if ($car_models->have_posts()): ?>
                                    <?php $index_item = 0;
                                    while ($car_models->have_posts()): $car_models->the_post();
                                        $car_profile_image = get_field('profile_image', get_the_ID());
                                        ?>
                                        <li data-key="<?php _e(get_the_ID()) ?>"
                                            class="profile-post-image d-center-right delay200 <?php echo $index_item === 0 ? 'act' : ''; ?>">
                                            <?php if ($car_profile_image): ?>
                                                <img src="<?php _e($car_profile_image); ?>"
                                                     class="img"
                                                     alt="<?php the_title_attribute(); ?>">
                                            <?php endif; ?>
                                            <p><span><?php the_title(); ?></span></p>
                                        </li>
                                        <?php $index_item++; endwhile; ?>
                                    <?php wp_reset_postdata(); ?>
                                <?php else: ?>
                                    <li class="d-center-right delay200">
                                        <p><span>No cars available.</span></p>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>

                    <?php endif; ?>

                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>

    <!--    SECTION COLOR SLIDER -->
    <section class="changing-over">
        <div class="d-rela txt-uppercase d-opacity d-ani delay100 mountain-wrapper">
            <div data-role="section-arrow" class="changing_left changing_arrow prev">
                <img src="https://www.hongqi-auto.com/images/index/left.png" alt="hongqi">
            </div>
            <div data-role="section-arrow" class="changing_right changing_arrow next">
                <img src="https://www.hongqi-auto.com/images/index/right.png" alt="hongqi">
            </div>
            <div class="describe-group">
                <div class="describe-item">
                    <h2>AAAAAA</h2>
                    <a href="">Explore</a>
                </div>
            </div>
            <div class="car-group act-switch" id="car-group" style="height: 284.128px;">
                <?php foreach ($car_types as $index => $car_type): ?>
                    <?php if ($car_type->count): ?>
                        <div class="car-item-wrap posts act-switch-item act-switch <?php echo $index === 0 ? 'act' : ''; ?>"
                             data-cat-name="<?php echo esc_attr($car_type->slug); ?>"
                             data-post-count="<?php _e($car_type->count); ?>">

                            <?php
                            // Fetch car models for this car type
                            $car_models = new WP_Query([
                                'post_type' => 'car-model',
                                'tax_query' => [
                                    [
                                        'taxonomy' => 'car-type',
                                        'field' => 'slug',
                                        'terms' => $car_type->slug,
                                    ],
                                ],
                                'posts_per_page' => -1,
                            ]);
                            $post_count = $car_models->found_posts;
                            $post_count_css = $post_count > 4 ? 100 : $post_count * 25;
                            $rows = ceil($post_count / 4);
                            $ul_height = $rows * 250;
                            ?>

                            <?php if ($car_models->have_posts()): ?>
                                <?php $index_item = 0;
                                while ($car_models->have_posts()): $car_models->the_post();
                                    $car_profile_image = get_field('profile_image', get_the_ID());
                                    ?>
                                    <div class="car-item-wrap post car-<?php _e(get_the_ID()) ?> act-switch-item act-switch <?php _e(get_the_ID()) ?> <?php echo $index_item === 0 ? 'act' : ''; ?>"
                                         data-key="<?php _e(get_the_ID()) ?>" data-link="<?php _e(get_permalink()) ?>"
                                         data-title="<?php the_title(); ?>">
                                        <?php
                                        $index_color = 0;
                                        $color_settings = get_field('car_color_settings', get_the_ID());
                                        ?>

                                        <?php foreach ($color_settings as $color_setting): ?>
                                            <img
                                                    src="<?php echo esc_url($color_setting['color_car_image']); ?>"
                                                    class="d-img <?php echo $index_color === 0 ? 'active' : ''; ?> color-car-image car-<?php echo $index_color; ?>"
                                                    alt="">
                                            <?php $index_color++; endforeach; ?>
                                    </div>
                                    <?php $index_item++; endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php endif; ?>

                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="color-btn-group act-switch" id="car-group">
            <?php foreach ($car_types as $index => $car_type): ?>
                <?php if ($car_type->count): ?>
                    <div class="color-btn-item act-switch-item act-switch <?php echo $index === 0 ? 'act' : ''; ?>">

                        <?php
                        // Fetch car models for this car type
                        $car_models = new WP_Query([
                            'post_type' => 'car-model',
                            'tax_query' => [
                                [
                                    'taxonomy' => 'car-type',
                                    'field' => 'slug',
                                    'terms' => $car_type->slug,
                                ],
                            ],
                            'posts_per_page' => -1,
                        ]);
                        $post_count = $car_models->found_posts;
                        $post_count_css = $post_count > 4 ? 100 : $post_count * 25;
                        $rows = ceil($post_count / 4);
                        $ul_height = $rows * 250;
                        ?>

                        <?php if ($car_models->have_posts()): ?>
                            <?php $index_item = 0;
                            while ($car_models->have_posts()): $car_models->the_post();
                                $car_profile_image = get_field('profile_image', get_the_ID());
                                ?>

                                <ul class="color-btn act-switch-item data-for-post<?php _e(get_the_ID()) ?> <?php echo $index_item === 0 ? 'act' : ''; ?>"
                                    data-for-post="<?php _e(get_the_ID()) ?>">
                                    <?php
                                    $index_color = 0;
                                    $color_settings = get_field('car_color_settings', get_the_ID());
                                    ?>

                                    <?php foreach ($color_settings as $color_setting): ?>
                                        <li class="color-box color-icon-<?php _e($index_color); ?> <?php _e($index_color === 0 ? 'act ' : ''); ?>"
                                            data-index="<?php _e($index_color); ?>">
                                            <img src="<?php _e($color_setting['color_icon']); ?>"
                                                 class="d-img  color-car-image car-<?php _e($index_color); ?>" alt="">
                                            <p class="color-name" style="font-style: italic;position: relative;">
                                                <span><?php _e($color_setting['color_name']); ?></span>
                                            </p>
                                        </li>
                                        <?php $index_color++; endforeach; ?>
                                </ul>

                                <?php $index_item++; endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>

                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- SECTION ABOUT HONGQI -->
    <section class="hongqi-ideal txt-uppercase">
        <?php $title = get_field('about_hongqi_title', get_the_ID()); ?>
        <h2 class="column-name d-ani d-opacity delay100 d-up"><?php _e($title); ?></h2>
        <div class="column-content ">
            <?php
            $items = get_field('about_hongqi_items', get_the_ID());
            //            var_dump($items);
            foreach ($items as $index => $item):
                $col_class = $index > 1 ? 'col3' : 'col2';
                $display_position = 'd-up';
                $delay = '';
                if ($index === 0) {
                    $display_position = 'd-left';
                }

                if ($index === 1) {
                    $display_position = 'd-right';
                }
                if ($index > 2) {
                    $duration = 200 * ($index - 2);
                    $delay = 'delay' . $duration;
                }
                ?>
                <div class="column-item overflow-hidden <?php _e($col_class); ?> <?php _e($duration); ?> img-ani-wrap d-ani <?php _e($display_position); ?>"
                     style="height: 353.6px;">
                    <a target="_blank" href="<?php _e($item['link_to_page']); ?>"
                       title="hongqi <?php _e($item["title_of_item"]); ?>">
                        <img class="d-img img-ani" alt="hongqi" src="<?php _e($item["banner"]); ?>">
                        <div class="d-mask">
                            <div class="cont">
                                <!-- <div class="img-wrap"><img src="./images/index/hongqiideal_log1.png" class="icon-logo1" /></div> -->
                                <div class="txt-wrap" style="display: block;"><?php _e($item["title_of_item"]); ?></div>
                            </div>
                            <div class="learn-more Without-borders"><?php _e($item["button_text"]); ?></div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <section class="hongqi-news txt-uppercase news-information">
        <?php
        $current_language = pll_current_language();
        $news_title = 'News';
        $learn_more = 'learn_more';
        // Check the active language
        if ($current_language === 'hy') {
            $news_title = 'Նորություններ';
            $learn_more = 'Կարդալ ավելին';
        }
        ?>
        <h2 class="column-name d-opacity d-ani delay100 d-up"><?php _e($news_title); ?></h2>
        <div class="column-content">
            <?php
            $posts_query = new WP_Query([
                'post_type' => 'post',  // This is the default post type in WordPress
                'posts_per_page' => -1,  // Get all posts (you can change the number to limit posts)
            ]);
            $post_count = $posts_query->found_posts;

            if ($posts_query->have_posts()): ?>
                <?php $index_item = 0;
                while ($posts_query->have_posts()):
                    $posts_query->the_post();
                    $post_id = get_the_ID();
                    $post_date = get_the_date('Y-m-d');
                    $featured_img_id = get_post_thumbnail_id($post_id);
                    if ($featured_img_id) {
                        $featured_img_url = wp_get_attachment_image_src($featured_img_id, 'full')[0];
                        ?>
                        <div class="column-item col3 d-ani d-up">
                            <a href="<?php _e(get_permalink()) ?>" title="1">
                                <div class="img-ani-wrap" style="height: 272px;">
                                    <img class="d-img img-ani" src="<?php _e(esc_url($featured_img_url));?>" alt="<?php _e(esc_attr(get_the_title($post_id)));?>">
                                </div>
                                <div class="news-title  two-lines"><?php  _e(get_the_excerpt());?></div>
                            </a>

                            <div class="column-footer">
                                <div class="time"><?php _e($post_date);?></div>
                                <a class="learn-more More-btn  txt-uppercase" href="<?php _e(get_permalink()) ?>" title="1">
                                    <?php _e($learn_more);?>
                                </a>
                            </div>
                        </div>
                  <?php  }
                endwhile;
                    wp_reset_postdata();
            endif;
            ?>
        </div>
    </section>
</main>
<?php
get_footer();
?>
