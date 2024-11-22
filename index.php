<?php
get_header();
$post_id = get_the_ID();
?>
<section class="container max-container single-post">
	<h1><?php the_title(); ?></h1>
	<?php the_content();?>
</section>
<?php get_footer(); ?>

