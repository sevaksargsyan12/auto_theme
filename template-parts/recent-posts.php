<?php
// Get the ID of the post you're interested in
//$post_id = 123; // Replace 123 with the actual post ID
$post_id = get_the_ID();
$taxonomy = 'service-category';
$terms = wp_get_post_terms($post_id, $taxonomy);

if (!empty($terms)) {
	// Assuming the post is assigned to only one term in the taxonomy
	$taxonomy_id = $terms[0]->term_id;
}

$tax_query = array(
	'taxonomy' => $taxonomy,
	'field' => 'id'
);

if($taxonomy_id) {
	$tax_query['terms'] = $taxonomy_id;
}

// Define arguments for the query
$args = array(
	'post_type' => 'service', // Change to your post type if different
	'post_status' => 'publish', // Only get published posts
	'posts_per_page' => 5, // Number of posts to retrieve
	'post__not_in' => array($post_id), // Exclude the specified post ID
	'tax_query' => array(
		$tax_query
	),
	'orderby' => 'date', // Order by date
	'order' => 'DESC' // Sort in descending order (most recent first)
);

// Get recent posts based on the arguments
$recent_posts = get_posts($args);

// Check if there are posts returned
if ($recent_posts) {
	echo '<div class="recent-post-items">';
	foreach ($recent_posts as $post) {
		setup_postdata($post); // Setup post data for template tags
		get_template_part('template-parts/post-item', 'post-item');
	}
	echo '</div>';
	wp_reset_postdata(); // Reset post data after the loop
} else {
	echo 'No recent posts found.';
}

?>