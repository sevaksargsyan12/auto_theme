<?php
/* Template Name: Other solutions */
get_header();
$page_id = get_the_ID();
$header_section = get_field('header_section', $page_id);
?>

<section class="section-cover first" style="background-image: url(<?php _e($header_section['background']);?>)">
    <div class="section-cover-mobile-bg"  style="background-image: url(<?php _e($header_section['background_mobile']);?>)"></div>
    <div class="container max-container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6 col-xl-5 text-md-start text-center">
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
<?php
$shape_space = get_field('shape_space', $page_id);
$items = $shape_space['items'];
?>
<section class="section-explore-range">
    <div class="container max-container">
        <div class="row">
            <div class="col-12 text-md-start text-center">
                <div class="text-block">
                    <h1 class="text-sm-center col-12 col-lg-9 col-xl-5 m-sm-auto"><?php _e($shape_space['title']) ?></h1>
                    <p class="text-sm-center col-12 col-lg-10 col-xl-6 m-sm-auto"><?php _e($shape_space['description']) ?></p>
                </div>
            </div>
            <div class="col-12 shape-space-items d-flex row mobile-bigger">
				<?php foreach ($items as $item):?>
                    <div class="col-12 col-lg-6 shape-space-item-wrapper">
                        <div class="shape-space-item position-relative" style="background-image: url(<?php _e($item['image']);?>)">
                            <div class="shape-space-item-title">
								<?php _e($item['title'])?>
                            </div>
                        </div>
                        <div class="shape-space-footer">
							<?php _e($item['description'])?>
                        </div>
                    </div>
				<?php endforeach;?>
            </div>
            <div class="shape-space-items-slider mobile-small">
				<?php foreach ($items as $item):?>
                    <div class=" shape-space-item-wrapper">
                        <div class="shape-space-item position-relative" style="background-image: url(<?php _e($item['image']);?>)">
                            <div class="shape-space-item-title">
								<?php _e($item['title'])?>
                            </div>
                        </div>
                        <div class="shape-space-footer">
							<?php _e($item['description'])?>
                        </div>
                    </div>
				<?php endforeach;?>
            </div>
        </div>
    </div>
</section>
<?php $design_versatility = get_field('transforming_spaces', $page_id);?>
<section class="section-cover design-versatility" style="background-image: url(<?php _e($design_versatility['background']);?>)">
    <div class="section-cover-mobile-bg"  style="background-image: url(<?php _e($design_versatility['background_mobile']);?>)"></div>
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
                    <div class="col-xl-<?php _e($item_index);?> col-md-12 col-12 mb-xl-0 mb-4">
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
<section class="upgrade-spaces-section dreaming-unique-space">
    <div class="container max-container">
        <div class="row justify-content-end">
            <div class="image-block">
                <div class="image-div" style="background-image: url(<?php _e($section_upgrade_your_space['background']) ?>)">
                    <img class="object-fit-contain w-100" src="<?php _e($section_upgrade_your_space['background']) ?>" alt="<?php _e($section_upgrade_your_space['title']); ?>"/>
                </div>
            </div>
            <div class="info-block align-items-center d-flex">
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
                <div class="customers-slider-testimonials-2 m-auto">
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
<?php $section_upgrade_your_space = get_field('from_concept_to_reality', $page_id); ?>
<section class="upgrade-spaces-section from_concept_to_reality">
    <div class="container max-container">
        <div class="row justify-content-end">
            <div class="image-block">
                <div class="image-div" style="background-image: url(<?php _e($section_upgrade_your_space['background']) ?>)">
                    <img class="object-fit-contain w-100" src="<?php _e($section_upgrade_your_space['background']) ?>" alt="<?php _e($section_upgrade_your_space['title']); ?>"/>
                </div>
            </div>
            <div class="info-block align-items-center d-flex">
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
<section class="estimate-section others" id="estimate">
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
									echo do_shortcode('[contact-form-7 id="3e2bc0e" title="Other glass solutions"]')
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
