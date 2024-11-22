<?php
/* Template Name: Gallery */

get_header();
$page_id = get_the_ID();
$header_section = get_field('header_section', $page_id);
$cat_slug = get_field('category_slug', $page_id);
?>
<section class="section-cover gallery-cover" style="background-image: url(<?php _e($header_section['background']); ?>)">
    <div class="container max-container">
        <div class="row">
            <div class="col-12 col-md-9 col-lg-8 col-xl-6 text-md-start text-center m-auto cover-div-container" style="z-index: 9;">
                <div class="cover-div m-auto">
                    <h1 class="m-auto text-sm-center mb-4"><?php _e($header_section['title']) ?></h1>
                    <h6 class="m-auto text-sm-center"><?php _e($header_section['description']) ?></h6>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container max-container">
    <div class="row">
        <div class="sidebar sidebar-gallery col-xl-3 col-lg-4">
            <ul>
				<?php
				$taxonomy = 'service-category'; // Change 'category' to the name of your taxonomy
				$terms = get_terms(array(
					'taxonomy' => $taxonomy,
					'hide_empty' => false, // Set to true to hide empty terms
				));
				$i = 0;
				foreach ($terms as $term):
					$service_gallery = get_field('service_gallery', $taxonomy . '_' . $term->term_id);
					if (!isset($service_gallery['title']))
						continue;
					$title = $service_gallery['title'];

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
		$taxonomy = 'service-category'; // Change 'category' to the name of your taxonomy
		$terms = get_terms(array(
//			'slug' => $cat_slug,
			'taxonomy' => $taxonomy,
			'hide_empty' => false, // Set to true to hide empty terms
		));
		?>
		<?php
		$i = 0;
		foreach ($terms as $term):
			$service_gallery = get_field('service_gallery', $taxonomy . '_' . $term->term_id);
			if (!isset($service_gallery))
				continue;
			if (!isset($service_gallery['title']))
				continue;
			$title = $service_gallery['title'];
			if (!isset($service_gallery['description']))
				continue;
			$description = $service_gallery['description'];
			$items = $service_gallery['items'];
			if (!isset($items)) continue;
			$index = 0;

			?>
            <section
                    class="main gallery-content col-xl-9 col-lg-8 row m-auto <?php if ($i == 0) echo 'active' ?> <?php _e("gallery-" . $i) ?>" <?php _e("data-to='" . $i . "'") ?>>
                <h2><?php _e($service_gallery['title']) ?></h2>
                <p class="p">
					<?php _e($description); ?>
                </p>
                <div class="justify-content-center">
					<?php if ($items && count($items)): ?>

                        <div class="row">
							<?php

							foreach ($items as $item): ?>
                                <div class="col-4 gallery-image-wrapper p-1 <?php if ($index >= 9) _e('view_more_default'); ?>">
                                    <a href="<?php _e($item['gallery_item']); ?>"
                                       data-lightbox="<?php _e($item['gallery_item']); ?>"
                                       data-title="<?php _e($title); ?>">
                                        <img class="w-100" src="<?php _e($item['gallery_item']); ?>"
                                             alt="<?php _e($title); ?>">
                                    </a>
                                </div>
								<?php
								$index++;
							endforeach; ?>
                        </div>
					<?php endif; ?>
                </div>
				<?php  if ($index > 9):?>
                    <div class="d-flex justify-content-end px-8 view-all-container"><a
                                class="view-all-gallery" style="cursor: pointer;">Տեսնել բոլորը</a></div>
				<?php endif; ?>
            </section>
			<?php $i++;endforeach; ?>
    </div>
</div>
<?php
get_footer();
?>

