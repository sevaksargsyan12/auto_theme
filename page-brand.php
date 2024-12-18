<?php
/* Template Name: Brand */
get_header();
$page_id = get_the_ID();
$current_language = pll_current_language();
$main_blocks = get_field('main_blocks',$page_id);
$image_blocks = get_field('image_block',$page_id);
$banner = get_field('banner',$page_id);

$hongqi_brand = 'Brand';
if ($current_language === 'hy') {
    $hongqi_brand = 'Բրենդ';
}
?>
<main class="hgq-page page-brand sub-page">
    <header>
        <img  src="<?php _e($banner) ?>" alt="page brand hongqi armenia"/>
    </header>
    <h1 class="brand_title">
        <?php _e($hongqi_brand); ?>
    </h1>
    <section class="brand">
        <?php $index = 0; foreach ($main_blocks as $field):
            $class = $index % 2 === 0 ? '' : 'row_dectrion';
            $class_inner = $index % 2 === 0 ? 'right' : 'left';
            $class_reset = $field['image'] ? "" : "reset";
            ?>
            <div class="brand_con d-ani d-up <?php _e($class);?>  <?php _e($class_reset);?>">
                <div class="brand_img brand_block">
                    <img src="<?php _e($field['image']);?>" alt="">
                </div>
                <div class="brand_text brand_block">
                    <p class="txt-uppercase title"><?php _e($field['title']);?></p>
                    <p class="text_con">
                        <?php _e($field['description']);?>
                    </p>
                </div>
            </div>
        <?php $index++; endforeach;?>
        <?php $index = 0; foreach ($image_blocks as $field):
            $class_inner = $index % 2 === 0 ? '' : 'brand_flex row_dectrion';
            ?>
            <div class="brand_desing brand_con d-ani d-up <?php _e($class_inner);?>">
                <div class="brand_img brand_block">
                    <img src="<?php _e($field['image']);?>" alt="">
                </div>
                <div class="brand_text brand_block">
<!--                    <p class="txt-uppercase title">--><?php //_e($field['title']);?><!--</p>-->
                    <p class="text_con">
                        <?php _e($field['title']);?>
<!--                        --><?php //_e($field['description']);?>
                    </p>
                </div>
            </div>
            <?php $index++; endforeach;?>
            <div class="brand_content">
                <?php
                the_content();
                ?>
            </div>
    </section>
</main>
<?php
get_footer();?>
