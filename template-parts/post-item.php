
<?php
$post_thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // 'thumbnail' is the size of the image you want to retrieve
$post_url = get_permalink(get_the_ID());

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?> class="position-relative">
    <div class="item-image">
        <?php if ($post_thumbnail_url):?>
        <img class="w-100" src="<?php _e($post_thumbnail_url)?>" alt="<?php the_title()?>">
        <?php endif;?>
    </div>
	<div class="item-footer">
        <div class="date">
                <span>
                    <?php
					$post_date = get_the_date('F j, Y');
					echo $post_date;
					?>
                </span>
        </div>
        <a href="<?php _e($post_url)?>"><?php the_title();?></a>
	</div>
</article>