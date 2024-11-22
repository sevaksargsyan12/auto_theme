<?php
$post_id = get_the_ID();
$page_url = get_permalink($post_id);

$taxonomy = 'service-category';
$terms = wp_get_post_terms($post_id, $taxonomy);
$all_terms = get_terms( array(
	'taxonomy' => $taxonomy,
	'hide_empty' => false, // Set to true to hide empty terms
) );
//var_dump($all_terms);
$all_taxonomies_slugs = array_map(function($term_object) {
	return $term_object->slug;
}, $all_terms);

$all_taxonomies_ids = array_map(function($term_object) {
	return $term_object->term_id;
}, $all_terms);

$slug = '';
if(isset($_GET['service-category'])) {
	$slug = $_GET['service-category'];
}
$term = get_term_by('slug', $slug, $taxonomy);


if ($term) {
    $termId = $term->term_id;

	// Assuming the post is assigned to only one term in the taxonomy
	$taxonomy_id = $term->term_id;
}

$tax_query = array(
	'taxonomy' => $taxonomy,
//	'field' => 'id'
);

if(isset($taxonomy_id)) {
	$tax_query['terms'] = $taxonomy_id;
	$tax_query['field'] = 'id';
}

// $isFirstActive = !in_array($slug,$all_taxonomies_slugs);
$isFirstActive = !in_array($termId,$all_taxonomies_ids);

// Define arguments for the query
$args = array(
	'post_type' => 'service', // Change to your post type if different
	'post_status' => 'publish', // Only get published posts
	'posts_per_page' => -1, // Number of posts to retrieve
//	'post__not_in' => array($post_id), // Exclude the specified post ID
//	'tax_query' => array(
//		$tax_query
//	),
	'orderby' => 'date', // Order by date
	'order' => 'DESC' // Sort in descending order (most recent first)
);

if(isset($taxonomy_id)) {
    $args['tax_query'] = array($tax_query);
}

// Get recent posts based on the arguments
$posts_by_category = get_posts($args);
$post_count = count($posts_by_category);
// Check if there are posts returned
?>
    <h5 class="mt-4">Աշխատանքներ ըստ բաժինների</h5>
    <div class="postBy-category-links flex-wrap">
        <a style="font-size: 18px;height: 52px;"  class="mt-2 link-category custom-link-button <?php _e(($isFirstActive)?'active':'')?>" href="<?php _e($page_url)?>">
			Բոլորը
        </a>
        <?php foreach ($all_terms as $term):$taxonomy_show= get_field('show_in_blog_and_single', $taxonomy.'_'.$term->term_id);
        if($taxonomy_show){?>
            <a style="font-size: 18px;height: 52px;" class="mt-2 link-category custom-link-button <?php _e(($termId == $term->term_id)?'active':'')?>" href="<?php _e('?service-category='.$term->slug)?>">
				<?php _e($term->name)?>
            </a>
        <?php } endforeach;?>
    </div>
    <?php
    $i = 1;
if ($posts_by_category) {
	echo '<div class="row posts-by-category-wrapper">';
	foreach ($posts_by_category as $post) {
		setup_postdata($post); // Setup post data for template tags
	 echo ($i > 4 ? '<div class="col-lg-12 cat-post d-none item-'.$i.'">':'<div class="col-lg-12 cat-post active item-'.$i.'">');
	 	get_template_part('template-parts/post-item-large', 'post-item-large');
		echo '</div>';
        $i++;
	}
	echo '</div>';?>
    <button class="custom-button view-more cat w-auto m-auto d-none" data-count="<?php _e($post_count)?>">Տեսնել ավելին<img src="<?php echo get_template_directory_uri();?>/images/right.svg" alt="button icon"/></button>
	<?php wp_reset_postdata(); // Reset post data after the loop
} else {
	echo 'No posts found.';
}

?>
