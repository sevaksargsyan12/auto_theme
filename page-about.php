<?php
/* Template Name: About */

get_header();
$front_page_id = get_option( 'page_on_front' );
$page_id = get_the_ID();
$banner = get_field('banner',$page_id);

//$header_section = get_field('header_section', $page_id);
?>
<main class="page-about hgq-page">
    <header>
        <img style="width: 100%"  src="<?php _e($banner) ?>" alt="page about hongqi armenia"/>
    </header>
    <!-- SECTION ABOUT HONGQI -->
    <section class="hongqi-ideal txt-uppercase">
        <?php $title = get_field('about_hongqi_title', $front_page_id); ?>
        <h2 class="column-name d-ani d-opacity delay100 d-up"><?php _e($title); ?></h2>
        <div class="column-content ">
            <?php
            $items = get_field('about_hongqi_items', $front_page_id);
            //            var_dump($items);
            foreach ($items as $index => $item):
                $col_class = $index > 1 ? 'col3' : 'col2';
                $display_position = 'd-up';
                $delay = '';
                if ($index === 0) {
                    $display_position = 'd-left';
                }

                if ($index === 1) {
                    $display_position = 'd-right';
                }
                if ($index > 2) {
                    $duration = 200 * ($index - 2);
                    $delay = 'delay' . $duration;
                }
                ?>
                <div class="column-item overflow-hidden <?php _e($col_class); ?> <?php _e($duration); ?> img-ani-wrap d-ani <?php _e($display_position); ?>">
                    <a target="_blank" href="<?php _e($item['link_to_page']); ?>"
                       title="hongqi <?php _e($item["title_of_item"]); ?>">
                        <img class="d-img img-ani" alt="hongqi" src="<?php _e($item["banner"]); ?>">
                        <div class="d-mask">
                            <div class="cont">
                                <!-- <div class="img-wrap"><img src="./images/index/hongqiideal_log1.png" class="icon-logo1" /></div> -->
                                <div class="txt-wrap" style="display: block;"><?php _e($item["title_of_item"]); ?></div>
                            </div>
                            <div class="learn-more Without-borders"><?php _e($item["button_text"]); ?></div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php
get_footer();