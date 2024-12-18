<?php
/* Template Name: History */
get_header();
$page_id = get_the_ID();
$current_language = pll_current_language();
$fields = get_field('history_section',$page_id);
$banner = get_field('banner',$page_id);
//var_dump($banner);

$hongqi_history = 'HONGQI HISTORY';
if ($current_language === 'hy') {
    $hongqi_history = 'HONGQI-Ի ՊԱՏՄՈԻԹՅՈՒՆԸ';
}
?>
<main class="hgq-page page-history sub-page">
    <header>
        <img  src="<?php _e($banner) ?>" alt="page history hongqi armenia"/>
    </header>
    <h1 class="history_title">
        <?php the_title(); ?>
    </h1>
    <section class="history">
        <?php $index = 0; foreach ($fields as $field):
        $class = $index % 2 === 0 ? 'cloum' : 'serve';
        $class_inner = $index % 2 === 0 ? 'right' : 'left';
        ?>



        <div class="history_con <?php echo $class; ?>">
            <div class="img">
                <img src="<?php _e($field['image'])?>" alt="">
            </div>
            <div class="<?php _e($class_inner);?> inner">
                <div class="top">
                    <div class="top-title">
                        <?php _e($field['title'])?>
                    </div>
                    <div class="top-subtitle txt-uppercase two-lines">
                        <?php _e($field['sub_title'] ? : $hongqi_history)?>
                    </div>
                </div>
                <div class="text">
                    <?php _e($field['description'])?>
                </div>
            </div>
        </div>
        <?php $index++; endforeach;?>
    </section>
</main>
<?php
get_footer();?>
