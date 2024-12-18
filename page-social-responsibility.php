<?php
/* Template Name: Social Responsibility */

get_header();
$page_id = get_the_ID();
$current_language = pll_current_language();
$banner = get_field('banner',$page_id);
$section_1 = get_field('section_1',$page_id);
$section_2 = get_field('section_2',$page_id);
$section_3 = get_field('section_3',$page_id);
$title_2 = $section_2['title'];
$description_2 = $section_2['description'];
$items = $section_2['item'];

$section_4 = get_field('section_4',$page_id);

$title_4 = $section_4['title'];
$description_4 = $section_4['description'];
$items_4 = $section_4['item'];


?>
<main class="hgq-page page-social page-achievement sub-page">
    <header>
        <img  src="<?php _e($banner) ?>" alt="page social hongqi armenia"/>
    </header>
    <section class="social_wrapper achievement_wrapper">
        <h1 class="social_title achievement_title">
            <?php the_title(); ?>
        </h1>
        <div class="section_1 section">
            <?php _e($section_1);?>
        </div>
        <div class="section_2 section">
            <h2 class="social_sub_title">
                <?php _e($title_2); ?>
            </h2>
            <p>
                <?php _e($description_2); ?>
            </p>
            <div class="boxes-block">
            <?php
            foreach ($items as $item):
                $title_item = $item['title'];
                $description_item = $item['description'];

            ?>
                <div class="box">
                    <h3>
                        <?php _e($title_item); ?>
                    </h3>
                    <div class="box-content">
                        <?php _e($description_item); ?>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
            </div>
        </div>
        <div class="section_1 section">
            <?php _e($section_3);?>
        </div>
        <div class="section_4 section section_2">
            <h2 class="social_sub_title">
                <?php _e($title_4); ?>
            </h2>
            <p>
                <?php _e($description_4); ?>
            </p>
            <div class="boxes-block">
                <?php
                foreach ($items_4 as $item):
//                    $title_item = $item['title'];
//                    $description_item = $item['description'];

                    ?>
                    <div class="box">
                        <img src="<?php _e($item['image'])?>" alt="hongqi armenia" />
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();?>
