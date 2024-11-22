<?php
/* Template Name: FAQ */

get_header();
$page_id = get_the_ID();
$header_section = get_field('header_section', $page_id);
$cat_slug = get_field('category_slug', $page_id);
?>
<section class="section-cover faq-cover" style="background-image: url(<?php _e($header_section['background']); ?>)">
	<div class="container max-container">
		<div class="row">
			<div class="col-12 col-md-9 col-lg-8 col-xl-6 text-md-start text-center m-auto">
				<div class="cover-div m-auto">
					<h1 class="m-auto text-center mb-4"><?php _e($header_section['title']) ?></h1>
					<h6 class="m-auto text-center"><?php _e($header_section['description']) ?></h6>
					<a class="custom-button m-auto" href="#estimate"><?php _e($header_section['button']['label']) ?><img
							src="<?php echo get_template_directory_uri(); ?>/images/right.svg"
							alt="button icon"/>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="container max-container">
	<div class="row">
		<div class="sidebar sidebar-faq col-xl-3 col-lg-4">
			<ul>
				<?php
				$taxonomy = 'faq-category'; // Change 'category' to the name of your taxonomy
				$terms = get_terms(array(
					'taxonomy' => $taxonomy,
					'hide_empty' => false, // Set to true to hide empty terms
				));
				$i = 0;
				foreach ($terms as $term):
//					$service_gallery = get_field('service_gallery', $taxonomy . '_' . $term->term_id);
//					if (!isset($service_gallery['title']))
//						continue;
					$title = $term->name;

					?>
					<li class="<?php if ($i == 0) echo 'active' ?> <?php _e(" data-li-" . $i) ?>"
						style="list-style: none;">
						<?php if ($i == 0): ?>
							<img
								class="arrow-side"
								src="<?php echo get_template_directory_uri(); ?>/images/right-blue.svg"
								alt="button icon"/>
						<?php endif; ?>
						<a href="#" <?php _e("data-cat='" . $i . "'") ?>
						   style="color: #030D22;"><?php _e($title); ?></a>
					</li>
					<?php $i++; endforeach; ?>
			</ul>
		</div>
		<?php
		?>
		<?php
		$i = 0;
		foreach ($terms as $term):
			$taxonomy_id = $term->term_id;
			$tax_query = array(
				'taxonomy' => $taxonomy,
				'field' => 'id'
			);

			if($taxonomy_id) {
				$tax_query['terms'] = $taxonomy_id;
			}

			$args = array(
				'post_type' => 'faq', // Change to your post type if different
				'post_status' => 'publish', // Only get published posts
				'posts_per_page' => -1, // Number of posts to retrieve
				'tax_query' => array(
					$tax_query
				),
				'orderby' => 'date', // Order by date
				'order' => 'DESC' // Sort in descending order (most recent first)
			);

			// Get recent posts based on the arguments
			$recent_posts = get_posts($args);
			?>
			<section
				class="main faq-content col-xl-9 col-lg-8 m-auto row <?php if ($i == 0) echo 'active' ?> <?php _e("faq-" . $i) ?>" <?php _e("data-to='" . $i . "'") ?>>
				<div class="justify-content-center">
					<?php if ($recent_posts && count($recent_posts)): ?>

						<div class="row">
							<?php
							$index = 0;

							foreach ($recent_posts as $post): ?>
								<div class="col-lg-12 faq-item d-flex justify-content-between  <?php _e($index == 0?'active': '')?>">
                                    <div class="faq-item-content">
                                        <div class="question"><?php _e($post->post_title)?></div>
                                        <div class="answer"><?php _e($post->post_content)?></div>
                                    </div>
                                    <div class="faq-button">
                                        <button class="btn-faq">
                                            <img class="close" src="<?php echo get_template_directory_uri();?>/images/arrow-down-black.svg">
                                            <img class="opened" src="<?php echo get_template_directory_uri();?>/images/arrow-up-black.svg">
                                        </button>
                                    </div>
								</div>
								<?php
								$index++;
							endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>
			<?php $i++;endforeach; ?>
	</div>
</div>
<section class="estimate-section faq" id="estimate">
    <div class="container max-container">
        <div class="row justify-content-center estimate-row">
            <img src="<?php echo get_template_directory_uri(); ?>/images/estimate-now.svg" class="w-100 pt-4 est-img">
            <div class="col-12 col-lg-10 col-xl-8 estimate-col">
                <div class="estimate-div text-center">
                    <h2>Still Have Questions?</h2>
                    <p class="contact-title">
                        Can’t find the answer you are looking for?<br/>
                        Please contact us.
                    </p>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-content">
								<?php
								echo do_shortcode('[contact-form-7 id="1e45350" title="FAQ"]')
								?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>

