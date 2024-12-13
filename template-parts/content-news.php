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
                            <div class="img-ani-wrap">
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
