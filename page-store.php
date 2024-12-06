<?php
/* Template Name: Store */

get_header();
//$page_id = get_the_ID();
//$header_section = get_field('header_section', $page_id);
?>
<main class="page-store hgq-page">

    <div>
        <?php
        echo do_shortcode('[smartslider3 slider="3"]');
        //var_dump(666);exit();
        ?>
    </div>
    <section class="page-store-content d-flex hgq-post-car-container">
        <div class="address-wrapper">
            <?php
            get_template_part( 'template-parts/content', 'address' ); // This loads content-single.php
            ?>
            <?php
            get_template_part( 'template-parts/content', 'socials' ); // This loads content-single.php
            ;?>
        </div>
        <div class="map-wrapper">
            <?php
            get_template_part( 'template-parts/content', 'map' ); // This loads content-single.php
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>

