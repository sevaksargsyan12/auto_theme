<?php
/* Template Name: Models */
get_header();
?>
<div class="page-models hq-page">
    <?php
    // Get all car types (taxonomy terms)
    $car_types = get_terms([
        'taxonomy' => 'car-type',
        'hide_empty' => false,
    ]);

    if (!empty($car_types)): ?>
        <section class="categories-and-models cartype txt-uppercase">
            <h2 class="title d-opacity delay100">
                EXPLORE hongqi
            </h2>
            <ul class="cartype-name categories-tabs act-switch d-opacity delay200">
                <?php foreach ($car_types as $index => $car_type): ?>
                    <?php if ($car_type->count): ?>
                        <li class="category-tab <?php echo $index === 0 ? 'active' : ''; ?>"
                            data-car-type="<?php echo esc_attr($car_type->slug); ?>">
                            <?php echo esc_html($car_type->name);
                            echo esc_html($car_type->count); ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>

            <div class="cartype-car-group d-opacity d-ani delay200">
                <?php foreach ($car_types as $index => $car_type): ?>
                    <?php if ($car_type->count): ?>

                        <?php
                        // Fetch car models for this car type
                        $car_models = new WP_Query([
                            'post_type' => 'car-model',
                            'tax_query' => [
                                [
                                    'taxonomy' => 'car-type',
                                    'field' => 'slug',
                                    'terms' => $car_type->slug,
                                ],
                            ],
                            'posts_per_page' => -1,
                        ]);
                        $post_count = $car_models->found_posts;
                        $post_count_css = $post_count > 4 ? 100 : $post_count * 25;
                        $rows = ceil($post_count / 4);
                        $ul_height = $rows * 250;
                        ?>
                        <div class="wrapper">

                            <ul style="width: <?php _e($post_count_css) ?>%;"
                                class="cartype-car <?php echo $index === 0 ? 'act' : ''; ?>"
                                data-car-type="<?php echo esc_attr($car_type->slug); ?>">
                                <?php if ($car_models->have_posts()): ?>
                                    <?php $index_item = 0;
                                    while ($car_models->have_posts()): $car_models->the_post();
                                        $car_profile_image = get_field('profile_image', get_the_ID());
                                        ?>
                                        <li data-key="<?php _e(get_the_ID()) ?>"
                                            class="profile-post-image d-center-right delay200 <?php echo $index_item === 0 ? 'act' : ''; ?>">
                                            <a href="<?php _e(get_permalink()) ?>">
                                            <?php if ($car_profile_image): ?>
                                                <img src="<?php _e($car_profile_image); ?>"
                                                     class="img"
                                                     alt="<?php the_title_attribute(); ?>">
                                            </a>
                                            <?php endif; ?>
                                            <p><span><?php the_title(); ?></span></p>
                                        </li>
                                        <?php $index_item++; endwhile; ?>
                                    <?php wp_reset_postdata(); ?>
                                <?php else: ?>
                                    <li class="d-center-right delay200">
                                        <p><span>No cars available.</span></p>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>

                    <?php endif; ?>

                <?php endforeach; ?>
            </div>
        </section>
    <?php endif; ?>
</div>
<?php
get_footer();?>
