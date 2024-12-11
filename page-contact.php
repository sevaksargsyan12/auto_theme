<?php
/* Template Name: Contact */
get_header();

$current_language = pll_current_language();
$post_id = get_the_ID();
$featured_img_id = get_post_thumbnail_id($post_id);
if ($featured_img_id) {
    $featured_img_url = wp_get_attachment_image_src($featured_img_id, 'full')[0];
}
// Check the active language
$emailName = 'Էլ Փոստ․';
$suggestion = 'Առաջարկություն';


if ($current_language == 'en'){
    $emailName = 'Email';
    $suggestion = 'Suggestion';
}

$email = get_field('email', 'option');
$contact_form_shortcode = '[contact-form-7 id="efdd60d" title="Main Contact"]';
if ($current_language === 'hy') {
    $contact_form_shortcode = '[contact-form-7 id="48f1482" title="Main Contact Հայերեն"]';
}

?>
<main class="hgq-page page-contact">
    <header>
        <a  data-lightbox="<?php _e($featured_img_url); ?>">
            <img  src="<?php _e($featured_img_url) ?>" alt="page contact hongqi"/>
        </a>
    </header>
    <div class="page-contact-content hgq-post-car-container">
        <section class="application_content_email">
            <div class="item_left item">
                <?php _e($emailName)?>
            </div>
            <div class="item_right item">
                <?php _e($email)?>
            </div>
        </section>
        <section class="suggestion">
            <h2><?php _e($suggestion);?></h2>
            <div class="suggestion-contact-form">
                <?php _e(do_shortcode($contact_form_shortcode));?>
            </div>
        </section>
    </div>
</main>
<?php
get_footer();?>
