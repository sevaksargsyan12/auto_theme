<?php
/* Template Name: News */

get_header();
//$page_id = get_the_ID();
//$header_section = get_field('header_section', $page_id);
?>
<main class="page-store hgq-page">

    <div>
        <?php
        echo do_shortcode('[smartslider3 slider="4"]');
        //var_dump(666);exit();
        ?>
    </div>
    <?php
    get_template_part( 'template-parts/content', 'news' ); // This loads content-single.php
    ?>
</main>

<?php get_footer(); ?>

