<div class="social-contact follow">
    <?php $socials = get_field('social', 'option');
    ?>
    <?php foreach ($socials as $social): ?>
        <a href="<?php _e($social['link'])?>" target="_blank"><img
                src="<?php _e($social['icon'])?>" class="icon facebook"
                alt="facebook"></a>
    <?php endforeach; ?>
</div>