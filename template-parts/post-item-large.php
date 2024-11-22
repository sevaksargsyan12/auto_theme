
<?php
$post_thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // 'thumbnail' is the size of the image you want to retrieve
$post_url = get_permalink(get_the_ID());

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-item large position-relative'); ?>>
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
		<p><?php the_excerpt();?></p>
	</div>
    <div class="post-item-hover align-items-center justify-content-center position-absolute w-100 top-0 text-center">
        <h5 class="title  mb-4">
			<?php the_title();?>
        </h5>
        <a class="custom-button" href="<?php _e($post_url)?>">Ավելին<img src="<?php echo get_template_directory_uri();?>/images/right.svg" alt="button icon"/></a>
    </div>
</article>