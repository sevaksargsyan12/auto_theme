<?php
/* Template Name: Glass Storefronts */
get_header();
$page_id = get_the_ID();
$header_section = get_field('header_section', $page_id);
?>

<section class="section-cover" style="background-image: url(<?php _e($header_section['background']);?>)">
    <div class="section-cover-mobile-bg"  style="background-image: url(<?php _e($header_section['background_mobile']);?>)"></div>
    <div class="container max-container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-8 col-xl-6 text-md-start text-center">
                <div class="cover-div">
                    <h1><?php _e($header_section['title']) ?></h1>
                    <h6><?php _e($header_section['description']) ?></h6>
                    <a class="custom-button" href="#estimate">Get FREE Estimate Now!<img
                                src="<?php echo get_template_directory_uri(); ?>/images/right.svg"
                                alt="button icon"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $section_transform_property = get_field('section_transform_property', $page_id);
?>
<section class="transform-property-section">
    <div class="container max-container">
        <div class="row justify-content-end">
            <div class="col-lg-7">
                <div class="image-div" style="background-image: url(<?php _e($section_transform_property['background']) ?>)">
                    <img class="object-fit-contain w-100" src="<?php _e($section_transform_property['background']) ?>" alt="<?php _e($section_transform_property['title']); ?>"/>
                </div>
            </div>
            <div class="col-lg-5 d-flex align-items-center">
                <div class="info-div">
                    <h2><?php _e($section_transform_property['title']); ?></h2>
                    <p><?php _e($section_transform_property['description']); ?></p>
                    <a href="<?php _e($section_transform_property['button']['url']) ?>"
                       class="custom-button"><?php _e($section_transform_property['button']['label']) ?><img
                                src="<?php echo get_template_directory_uri(); ?>/images/right.svg" alt="button icon"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $why_choose_section = get_field('why_choose_section_general', $page_id);
        $items = $why_choose_section['items'];
?>
<section class="service-apart-section">
    <div class="container max-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 text-center">
                <h2><?php _e($why_choose_section['title']);?></h2>
                <p class="p"><?php _e($why_choose_section['description']);?>.</p>
            </div>
            <div class="row service-apart-row mobile-bigger">
				<?php foreach ($items as $item): ?>
                    <div class="col-lg-4 col-sm-12 col-md-12">
                        <div class="service-apart-div">
                            <h5><?php _e($item['title']);?></h5>
                            <p><?php _e($item['description']);?></p>
                            <img src="<?php _e($item['icon']);?>"
                                 alt="<?php _e($item['title']);?>">
                        </div>
                    </div>
				<?php endforeach;?>
            </div>
        </div>
    </div>
    <div class="service-apart-row mobile-small w-100 overflow-hidden container">
        <div class="why-choose-mobile-slider">
			<?php foreach ($items as $item): ?>
                <div class="service-apart-div">
                    <h5><?php _e($item['title']);?></h5>
                    <p><?php _e($item['description']);?></p>
                    <img src="<?php _e($item['icon']);?>"
                         alt="<?php _e($item['title']);?>">
                </div>
			<?php endforeach;?>
        </div>
    </div>
</section>
<?php $design_versatility = get_field('design_versatility', $page_id);?>
<section class="section-cover design-versatility" style="background-image: url(<?php _e($design_versatility['background']);?>)">
    <div class="section-cover-mobile-bg"  style="background-image: url(<?php _e($header_section['background_mobile']);?>)"></div>
    <div class="container max-container h-100">
        <div class="row h-100">
            <div class="col-12 col-md-12 col-lg-8 col-xl-6 text-md-start text-center h-100 d-flex align-items-center p-sm-0">
                <div class="cover-div p-sm-0">
                    <h1><?php _e($design_versatility['title']) ?></h1>
                    <h6><?php _e($design_versatility['description']) ?></h6>
                    <a class="custom-button" href="#estimate">Get FREE Estimate Now!<img
                                src="<?php echo get_template_directory_uri(); ?>/images/right.svg"
                                alt="button icon"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="what-we-offer-section" id="offer-items">
    <div class="container max-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7">
				<?php $info_items_section = get_field('what_we_offer', $page_id);
				$items = $info_items_section['items'];
				?>
                <h2 class="text-center"><?php _e($info_items_section['title']); ?></h2>
                <p class="main-description text-center"><?php _e($info_items_section['description']); ?></p>
            </div>
            <div class="col-12 info-items-wrapper">
                <div class="row info-items-row mobile-bigger">
					<?php
					if (!empty($items) && !is_wp_error($items)) {
						$i = 0;
                        $item_index = floor(12/count($items));
						foreach ($items as $item) {
							$i++;
							?>
                            <div class="col-lg-<?php _e($item_index);?> info-item">
                                <div class="info-item-content-wrapper">
                                    <h5 class="title mb-3">
										<?php _e($item['title']); ?>
                                    </h5>
                                    <p class="description">
										<?php _e($item['description']); ?>
                                    </p>
                                </div>
                            </div>
							<?php
						}
					} ?>
                </div>
            </div>
            <div class="mobile-small what-we-offer-slider-container w-100">
                <div class="what-we-offer-slider">
					<?php
					if (!empty($items) && !is_wp_error($items)) {
						$i = 0;
						$item_index = floor(12/count($items));
						foreach ($items as $item) {
							$i++;
							?>
                            <div class="col-lg-<?php _e($item_index);?> info-item">
                                <div class="info-item-content-wrapper">
                                    <h5 class="title mb-3">
										<?php _e($item['title']); ?>
                                    </h5>
                                    <p class="description">
										<?php _e($item['description']); ?>
                                    </p>
                                </div>
                            </div>
							<?php
						}
					} ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="info-items-section" id="info-items">
    <div class="container max-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7">
				<?php $info_items_section = get_field('info_items_section', $page_id);
				$items = $info_items_section['items'];
				?>
                <h2 class="text-center"><?php _e($info_items_section['title']); ?></h2>
                <p class="main-description text-center"><?php _e($info_items_section['description']); ?></p>
            </div>
            <div class="col-12 info-items-wrapper">
                <div class="row info-items-row mobile-bigger">
					<?php
					if (!empty($items) && !is_wp_error($items)) {
						$i = 0;
                        $item_index = floor(12/count($items));
						foreach ($items as $item) {
							$i++;
							?>
                            <div class="col-lg-<?php _e($item_index);?> info-item">
                                <div class="info-item-icon-wrapper">
                                    <div class="info-item-icon <?php _e($i === count($item)?'':'bg')?>">
                                        <img src="<?php _e($item['icon']); ?>" alt="<?php _e($item['title'])?>"/>
                                    </div>
                                </div>
                                <div class="info-item-content-wrapper">
                                    <h5 class="title mb-3">
										<?php _e($item['title']); ?>
                                    </h5>
                                    <p class="description">
										<?php _e($item['description']); ?>
                                    </p>
                                </div>
                            </div>
							<?php
						}
					} ?>
                </div>
                <div class="mobile-small info-items-row info-items-row-slider">
					<?php
					if (!empty($items) && !is_wp_error($items)) {
						$i = 0;
						foreach ($items as $item) {
							$i++;
							?>
                            <div class="col-md-4 info-item">
                                <div class="info-item-icon-wrapper">
                                    <div class="info-item-icon <?php _e($i === count($item)?'':'bg')?>">
                                        <img src="<?php _e($item['icon']); ?>" alt="<?php _e($item['title'])?>"/>
                                    </div>
                                </div>
                                <div class="info-item-content-wrapper">
                                    <h5 class="title">
										<?php _e($item['title']); ?>
                                    </h5>
                                    <p class="description">
										<?php _e($item['description']); ?>
                                    </p>
                                </div>
                            </div>
							<?php
						}
					} ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $why_choose_section = get_field('why_choose_section', $page_id);
$items = $why_choose_section['items'];?>
<section class="service-apart-section">
    <div class="container max-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 text-center">
                <h2><?php _e($why_choose_section['title']);?></h2>
                <p class="p"><?php _e($why_choose_section['description']);?></p>
            </div>
            <div class="row service-apart-row mobile-bigger">
				<?php foreach ($items as $item):
					$item_index = floor(12/count($items));
					?>
                    <div class="col-lg-<?php _e($item_index);?> col-sm-12 col-md-12">
                        <div class="service-apart-div">
                            <h5><?php _e($item['title']);?></h5>
                            <p><?php _e($item['description']);?></p>
                            <img src="<?php _e($item['icon']);?>"
                                 alt="<?php _e($item['title']);?>">
                        </div>
                    </div>
				<?php endforeach;?>
            </div>
        </div>
    </div>
    <div class="service-apart-row mobile-small w-100 overflow-hidden container">
        <div class="why-choose-mobile-slider">
			<?php foreach ($items as $item): ?>
                <div class="service-apart-div">
                    <h5><?php _e($item['title']);?></h5>
                    <p><?php _e($item['description']);?></p>
                    <img src="<?php _e($item['icon']);?>"
                         alt="<?php _e($item['title']);?>">
                </div>
			<?php endforeach;?>
        </div>
    </div>
</section>
<?php $section_upgrade_your_space = get_field('upgrade_your_space', $page_id); ?>
<section class="upgrade-spaces-section">
    <div class="container max-container">
        <div class="row justify-content-end">
            <div class="image-block">
                <div class="image-div" style="background-image: url(<?php _e($section_upgrade_your_space['background']) ?>)">
                    <img class="object-fit-contain w-100" src="<?php _e($section_upgrade_your_space['background']) ?>" alt="<?php _e($section_upgrade_your_space['title']); ?>"/>
                </div>
            </div>
            <div class="info-block flex-column-reverse d-flex">
                <div class="info-div">
                    <h2><?php _e($section_upgrade_your_space['title']); ?></h2>
                    <p><?php _e($section_upgrade_your_space['description']); ?></p>
                    <a href="<?php _e($section_upgrade_your_space['button']['url']) ?>"
                       class="custom-button"><?php _e($section_upgrade_your_space['button']['label']) ?><img
                                src="<?php echo get_template_directory_uri(); ?>/images/right.svg" alt="button icon"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="customers-section">
	<?php  $testimonials = get_field('testimonials', $page_id);
	$items = $testimonials['items'];
	//        var_dump($testimonials);
	?>
    <div class="container max-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 text-center">
                <h2><?php _e($testimonials['title']);?></h2>
            </div>
            <div class="col-12">
                <div class="customers-slider-showers-testimonials m-auto" style="max-width: 690px;">
					<?php foreach ($items as $item):?>
                        <div style="max-width: 690px;">
                            <div class="customers-div">
                                <div>
                                    <h5><?php _e($item['author']);?></h5>
                                    <p><?php _e($item['comment']);?></p>
                                </div>
                                <div class="testimonial-footer">
                                    <div class="testimonial-date-address">
                                        <div><?php _e($item['date']);?></div>
                                        <div><?php _e($item['address']);?></div>
                                    </div>
                                    <div class="testimonial-icon">
                                        <img src="<?php echo get_template_directory_uri();?>/images/saying.svg">
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php endforeach;?>
					<?php foreach ($items as $item):?>
                        <div style="max-width: 690px;">
                            <div class="customers-div">
                                <div>
                                    <h5><?php _e($item['author']);?></h5>
                                    <p><?php _e($item['comment']);?></p>
                                </div>
                                <div class="testimonial-footer">
                                    <div class="testimonial-date-address">
                                        <div><?php _e($item['date']);?></div>
                                        <div><?php _e($item['address']);?></div>
                                    </div>
                                    <div class="testimonial-icon">
                                        <img src="<?php echo get_template_directory_uri();?>/images/saying.svg">
                                    </div>
                                </div>
                            </div>
                        </div>
					<?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $images_slider = get_field('images_slider', $page_id);
$items = $images_slider['items'];
?>
<section class="customers-section slider-section">
    <div class="container max-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 text-center">
                <h2><?php _e($images_slider['title']);?></h2>
                <p class="p"><?php _e($images_slider['description']);?></p>
            </div>
            <div class="col-12">
                <div class="customers-slider-glasses mobile-bigger">
					<?php foreach ($items as $item):?>
<!--                        <div class="customers-div-glasses">-->
                            <img src="<?php _e($item['icon']);?>">
<!--                        </div>-->
					<?php endforeach;?>
					<?php
					$i = 0;
					foreach ($items as $item): if($i == 2) break; $i++;?>
<!--                        <div class="customers-div-showers p-1">-->
                            <img src="<?php _e($item['icon']);?>">
<!--                        </div>-->
					<?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
    <div class="customers-slider-showers-2-container mobile-small w-100 overflow-hidden">
        <div class="customers-slider-showers-2">
			<?php foreach ($items as $item):?>
                <div class="customers-div-showers">
                    <img src="<?php _e($item['icon']);?>">
                </div>
			<?php endforeach;?>
			<?php
			$i = 0;
			foreach ($items as $item): if($i == 2) break; $i++;?>
                <div class="customers-div-showers">
                    <img src="<?php _e($item['icon']);?>">
                </div>
			<?php endforeach;?>
        </div>
</section>
<section class="estimate-section showers" id="estimate">
    <div class="container max-container">
        <div class="row justify-content-center estimate-row">
            <img src="<?php echo get_template_directory_uri(); ?>/images/estimate-now.svg" class="w-100 pt-4 est-img">
            <div class="col-12 col-lg-10 col-xl-8 estimate-col">
                <div class="estimate-div text-center">
                    <h2>Get FREE Estimate Now</h2>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="nav nav-tabs justify-content-center" id="myTabs">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab1-tab" data-bs-toggle="tab"
                                       href="#tab1">Free Estimate</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab2-tab" data-bs-toggle="tab" href="#tab2">Get In Touch</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab1">
									<?php
									echo do_shortcode('[contact-form-7 id="cd31200" title="Glass Storefronts"]')
									?>
                                </div>
                                <div class="tab-pane fade" id="tab2">
									<?php
									echo do_shortcode('[contact-form-7 id="c4b5802" title="Get In Touch"]')
									?>
                                </div>
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
