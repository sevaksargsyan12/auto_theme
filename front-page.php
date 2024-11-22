<?php
/* Template Name: Home */

get_header();
$page_id = get_the_ID();
$header_section = get_field('header_section', $page_id);
?>


<section class="section-cover" style="background-image: url(<?php _e($header_section['background']);?>)">
  <!--  <div class="section-cover-mobile-bg"  style="background-image: url(<?php _e($header_section['background_mobile']);?>)">
    </div>-->
    <div class="container max-container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-6 col-xl-6 text-md-start text-center" style="z-index: 9">
                <div class="cover-div">
                    <h1><?php _e($header_section['title']) ?></h1>
                    <h6><?php _e($header_section['description']) ?></h6>
                    <a class="custom-button" href="#estimate"><?php _e($header_section['button']['label']) ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $category_section_header = get_field('category_section_header', $page_id);
?>
<section class="custom-glass-section" id="custom-glass">
    <div class="container max-container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7">
                <h2><?php _e($category_section_header['title'])?></h2>
                <p><?php _e($category_section_header['description'])?></p>
            </div>
            <div class="col-12">
                <div class="row custom-glass-row">
					<?php
					$taxonomy = 'service-category'; // Change 'category' to the name of your taxonomy
					$terms = get_terms( array(
						'taxonomy' => $taxonomy,
						'hide_empty' => false, // Set to true to hide empty terms
					) );

					// Loop through the terms
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
						foreach ( $terms as $term ) {
							$taxonomy_image= get_field('taxonomy_image', $taxonomy.'_'.$term->term_id);
							$taxonomy_page_url= get_field('taxonomy_page_url', $taxonomy.'_'.$term->term_id);
                            ?>
                            <div class="col-xl-4 col-lg-6 custom-glass-div">
                                <div class="custom-glass-img-div">
                                    <img src="<?php echo $taxonomy_image;?>" class="glass-img" alt="<?php _e($term->name);?>"/>
<!--                                    <img src="--><?php //echo get_template_directory_uri();?><!--/images/templates/showers/showers-cover.webp" class="glass-img" alt="--><?php //_e($term->name);?><!--"/>-->
                                    <div class="custom-glass-blur-div">
                                        <h5><?php _e($term->name);?></h5>
                                        <div class="glass-show-div">
                                            <p><?php _e($term->description);?></p>
                                            <a href="<?php _e($taxonomy_page_url);?>" class="custom-button">Տեսնել ավելին</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php
						}
					} ?>
                </div>
                <div class="row custom-glass-row mobile-small">
                    <div class="custom-glass-mobile-slider">
					<?php
					$taxonomy = 'service-category'; // Change 'category' to the name of your taxonomy
					$terms = get_terms( array(
						'taxonomy' => $taxonomy,
						'hide_empty' => false, // Set to true to hide empty terms
					) );

					// Loop through the terms
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
						foreach ( $terms as $term ) {
							$taxonomy_image= get_field('taxonomy_image', $taxonomy.'_'.$term->term_id);
							$taxonomy_page_url= get_field('taxonomy_page_url', $taxonomy.'_'.$term->term_id);
							?>
                            <div class="col-lg-4 custom-glass-div">
                                <div class="custom-glass-img-div">
                                    <img src="<?php echo $taxonomy_image;?>" class="glass-img" alt="<?php _e($term->name);?>"/>
                                    <!--                                    <img src="--><?php //echo get_template_directory_uri();?><!--/images/templates/showers/showers-cover.webp" class="glass-img" alt="--><?php //_e($term->name);?><!--"/>-->
                                    <div class="custom-glass-blur-div">
                                        <h5><?php _e($term->name);?></h5>
                                        <div class="glass-show-div">
                                            <p><?php _e($term->description);?></p>
                                            <a href="<?php _e($taxonomy_page_url);?>" class="custom-button">Տեսնել ավելին</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php
						}
					} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="estimate-section" id="estimate">
    <div class="container max-container">
            <div class="col-12 col-lg-10 col-xl-8 estimate-col m-auto" style="position: relative;">
                        <div class="estimate-div text-center">
                            <div>
                            <img src="<?php echo get_template_directory_uri();?>/images/logo_main.png" class="w-100  est-img position-relative">
                            </div>
                            <h2>Կապ հաստատել մեր հետ</h2>
                             <div class="tab-content">
									 <?php
									 echo do_shortcode('[contact-form-7 id="c4b5802" title="Get In Touch"]')
									 ?>
                             </div>
                        </div>
            </div>
    </div>
</section>

<?php
get_footer();
?>
