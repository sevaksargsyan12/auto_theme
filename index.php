<?php
get_header();
$post_id = get_the_ID();
var_dump(4444);exit();
?>
<style>
    .banner {
        position: relative;
        width: 100%;
        height: 50vh; /* Adjust the height as needed (e.g., 50% of viewport height) */
        overflow: hidden;
    }

    .banner-image {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: auto;

        /* Fallback for smaller screens where the height might be insufficient */
        min-height: 100%;
        min-width: 100%;
        object-fit: cover; /* Ensures the image covers the banner area without distortion */
    }

</style>
<section class="container max-container single-post">
    <div class="banner">
        <img src="path-to-your-image.jpg" alt="Banner" class="banner-image">
    </div>
    <h1><?php the_title(); ?></h1>
    <div class="row">
        <div class="col-xl-9 col-lg-8">
            <div class="single-post-wrapper">
                <?php
                $featured_img_id = get_post_thumbnail_id($post_id);
                $post_date = get_the_date('F j, Y');
                if ($featured_img_id) {
                    $featured_img_url = wp_get_attachment_image_src($featured_img_id, 'full')[0];
                    echo '<div class="main-image"><img class="w-100" src="' . esc_url($featured_img_url) . '" alt="' . esc_attr(get_the_title($post_id)) . '"></div>';
                }
                ?>
                <div class="main-content">
                    <div class="date">
                <span>
                    <?php
                    $post_date = get_the_date('F j, Y');
                    echo $post_date;
                    ?>
                </span>
                    </div>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xl-3">
            <!--			--><?php //get_template_part('template-parts/post-item', 'post-item'); ?>
            <?php setup_postdata($post_id)?>
            <?php
            get_template_part('template-parts/recent-posts', 'recent-posts');
            ?>
            <div class="d-none latest-articles-singlin">
                <?php  get_template_part('template-parts/last-articles', 'last-articles'); ?>
            </div>
            <?php wp_reset_postdata();?>
            <div class="post-by-category-sidebar">
                <?php 	get_template_part('template-parts/posts-by-category-sidebar', 'posts-by-category-sidebar'); ?>
            </div>
            <div class="post-by-category-big d-none">
                <?php
                get_template_part('template-parts/posts-by-category', 'posts-by-category');
                ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>

