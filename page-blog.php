<?php
/* Template Name: Blog */
get_header();

//get_template_part('template-parts/posts-by-category', 'posts-by-category');
?>
<div class="container max-container page-blog-wrapper">
	<?php
	get_template_part('template-parts/posts-by-category', 'posts-by-category');
	get_template_part('template-parts/last-articles', 'last-articles');
	?>
</div>
<?php
get_footer();
?>
