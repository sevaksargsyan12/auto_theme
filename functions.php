<?php


/*
 * Helpers
 * */

if (!function_exists('custom_global_function')) {
	function dateFormatter($dateString) {
//		$timestamp = strtotime($dateString);
//		$formattedDate = date("F d, Y", $timestamp);
		$dateObj = DateTime::createFromFormat('d/m/Y', $dateString);
		$formattedDate = $dateObj->format('F d, Y');
		return $formattedDate;
	}
}

function custom_admin_styles() {
    // Enqueue the custom admin CSS file
    wp_enqueue_style('custom-admin-css', get_template_directory_uri() . '/admin-style.css');
}
add_action('admin_enqueue_scripts', 'custom_admin_styles');

function custom_theme_scripts() {

    wp_enqueue_style(
        'google-fonts-montserrat',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap',
        [],
        null
    );


	wp_enqueue_style('theme-style', get_stylesheet_uri());

	// Enqueue the favicon
    wp_enqueue_script('custom-favicon', get_template_directory_uri() . '/images/logo.svg', array(), null, false);

    // Enqueue the main stylesheet
    wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/css/style.css');

	// Enqueue the lightbox
	wp_enqueue_style('custom-lightbox', get_stylesheet_directory_uri() . '/css/lightbox.css');

    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/bootstrap-5.0.2-dist/css/bootstrap.min.css');

    // Enqueue Singla car post css
	wp_enqueue_style('single-car-post', get_stylesheet_directory_uri() . '/css/single-car-post.css');


	// Enqueue Slick slider CSS
//    wp_enqueue_style('slick-css', get_template_directory_uri() . '/slick-master/slick/slick.css');
//    wp_enqueue_style('slick-theme-css', get_template_directory_uri() . '/slick-master/slick/slick-theme.css');


	// Enqueue other scripts to load in the footer
	wp_enqueue_script('jquery');

//	wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js', array(), '', true);
//	wp_enqueue_script('hqg-public-js', get_template_directory_uri() . '/js/public.js', array('jquery'));
//	wp_enqueue_script('hqg-common-js', get_template_directory_uri() . '/js/common.js', array('jquery'));
//	wp_enqueue_script('hqg-index-js', get_template_directory_uri() . '/js/index.js', array('jquery'));

    wp_enqueue_script('hgq-single-car-post-js', get_template_directory_uri() . '/js/single-car-post.js', array('jquery'));
    wp_enqueue_script('hgq-custom-js', get_template_directory_uri() . '/js/custom-scripts.js', array('jquery'));
    // Enqueue custom JavaScript file
    wp_enqueue_script('custom-lightbox-js', get_template_directory_uri() . '/js/lightbox.js', array('jquery'));
//    $translation_array = array(
//        'ajax_url' => admin_url('admin-ajax.php'),
//        'directory_uri' =>  get_template_directory_uri(),
//
//    );
//    wp_localize_script('custom-js', 'custom_ajax_object', $translation_array);

}

add_action('wp_enqueue_scripts', 'custom_theme_scripts');




function my_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu' ),
			'mobile-menu' => __( 'Mobile Menu' ),
//			'secondary-menu' => __( 'Secondary Menu' ),
//			'footer-menu' => __( 'Footer Menu' ),
//			'footer-menu-2' => __( 'Footer Menu Second' ),
		)
	);
}

add_action('after_setup_theme', 'my_theme_setup');

function add_li_class($classes, $item, $args)
{
	$classes[] = 'nav-item';
	return $classes;
}

add_filter('nav_menu_css_class', 'add_li_class', 1, 3);


function handle_custom_form() {
    if (isset($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['zipCode'], $_POST['dimensions'], $_POST['description'], $_POST['type'], $_POST['finishName'], $_POST['finishNameImage'], $_POST['handleStyle'])) {
        // Sanitize and assign the form data

        $admin_email = get_option('admin_email');
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $zipCode = sanitize_text_field($_POST['zipCode']);
        $dimensions = sanitize_text_field($_POST['dimensions']);
        $description = sanitize_text_field($_POST['description']);
        $type = sanitize_text_field($_POST['type']);
        $finishName = sanitize_text_field($_POST['finishName']);


        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo 'Please provide a valid email.';
            wp_die();
        }

        // Prepare the email content
        $subject = 'New Sliding Door Inquiry';
        $body = "Name: $name\n";
        $body .= "Email: $email\n";
        $body .= "Phone: $phone\n";
        $body .= "Zip Code: $zipCode\n";
        $body .= "Dimensions: $dimensions\n";
        $body .= "Description: $description\n";
        $body .= "Type: $type\n";
        $body .= "Finish Name: $finishName\n";


        // Email Headers
        $headers = array('Content-Type: text/plain; charset=UTF-8');

        // Multiple Attachments
        // Replace with the actual server paths to the attachments
        $attachment = array(
            $_POST['finishName'],
            $_POST['handleStyle']
            // Add more file paths as needed
        );

        // Send the email
        if (wp_mail('info@yourteam.marketing', $subject, $body, $headers, $attachment)) {
            echo 'Thank you, ' . esc_html($name) . ', for your message!';
        } else {
            echo 'There was an error sending your message.';
        }
    } else {
        echo 'Error: Form data not received.';
    }
    wp_die();
}

add_action('wp_ajax_handle_custom_form', 'handle_custom_form');
add_action('wp_ajax_nopriv_handle_custom_form', 'handle_custom_form');


function acf_set_featured_image($value, $post_id, $field)
{

	if ($value != '') {
		//Add the value which is the image ID to the _thumbnail_id meta data for the current post
		add_post_meta($post_id, '_thumbnail_id', $value);
	}

	return $value;
}

// acf/update_value/name={$field_name} - filter for a specific field based on it's name
add_filter('acf/update_value/name=services', 'acf_set_featured_image', 10, 3);

//function custom_excerpt_length($length) {
//	return 30; // Adjust the number of words in the excerpt
//}
//add_filter('excerpt_length', 'custom_excerpt_length');
//
//// Modify the post excerpt "read more" text
//function custom_excerpt_more($more) {
////	return '... <a class="read-more" href="' . get_permalink() . '">' . __('Read More', 'text-domain') . '</a>';
//	return '...';
//}
//add_filter('excerpt_more', 'custom_excerpt_more');

function custom_excerpt($content, $limit = 100) {
    // Strip shortcodes and tags
    $content = wp_strip_all_tags(strip_shortcodes($content));

    // Check if the content length exceeds the limit
    if (strlen($content) > $limit) {
        $content = substr($content, 0, $limit) . '...';
    }

    return $content;
}

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
	// Start each element
	public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
		$classes = empty($item->classes) ? [] : (array) $item->classes;
		$classes[] = 'item';

		if (in_array('menu-item-has-children', $classes)) {
			$classes[] = 'has-secondlevel';
		}

		$class_names = join(' ', array_filter($classes));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

		$attributes  = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

		$output .= '<a' . $class_names . $attributes . '>';

		$title = apply_filters('the_title', $item->title, $item->ID);
		$output .= $title;

		if (in_array('menu-item-has-children', $classes)) {
			$output .= ' <img src="/images/common/new-icon.png" alt="new" class="website-nav">';
		}

		$output .= '</a>';
	}
}


function initialize_swiper_slider() {
	?>
<!--	<script>-->
<!--        document.addEventListener('DOMContentLoaded', function () {-->
<!--            new Swiper('.swiper-container', {-->
<!--                loop: true, // Enable continuous loop-->
<!--                autoplay: {-->
<!--                    delay: 5000,-->
<!--                    disableOnInteraction: false,-->
<!--                },-->
<!--                pagination: {-->
<!--                    el: '.swiper-pagination',-->
<!--                    clickable: true,-->
<!--                },-->
<!--                navigation: {-->
<!--                    nextEl: '.swiper-button-next',-->
<!--                    prevEl: '.swiper-button-prev',-->
<!--                },-->
<!--                slidesPerView: 1,-->
<!--                spaceBetween: 0,-->
<!--                breakpoints: {-->
<!--                    768: {-->
<!--                        slidesPerView: 1,-->
<!--                        spaceBetween: 10,-->
<!--                    },-->
<!--                    1024: {-->
<!--                        slidesPerView: 1,-->
<!--                        spaceBetween: 20,-->
<!--                    },-->
<!--                },-->
<!--            });-->
<!--        });-->
<!--	</script>-->
	<?php
}
add_action('wp_footer', 'initialize_swiper_slider');

function add_custom_taxonomy_column($columns) {
	// Add a new column for the taxonomy
	$columns['custom_taxonomy'] = 'Categories'; // Replace "Categories" with your taxonomy name
	return $columns;
}
add_filter('manage_car-model_posts_columns', 'add_custom_taxonomy_column'); // Replace "car-model" with your custom post type slug

function display_custom_taxonomy_column($column, $post_id) {
	if ($column === 'custom_taxonomy') {
		// Get taxonomy terms for the current post
		$terms = get_the_terms($post_id, 'car-type'); // Replace "your_taxonomy" with your taxonomy slug

		if (!empty($terms) && !is_wp_error($terms)) {
			// Display the terms as a comma-separated list
			$term_names = wp_list_pluck($terms, 'name');
			echo esc_html(implode(', ', $term_names));
		} else {
			echo '—'; // If no terms, display a dash
		}
	}
}
add_action('manage_car-model_posts_custom_column', 'display_custom_taxonomy_column', 10, 2); // Replace "car-model" with your custom post type slug

function get_field_by_language($field_key, $default_lang = 'en') {
	// Check if the 'lang' parameter exists in the URL
	$lang = isset($_GET['lang']) ? $_GET['lang'] : $default_lang;

	// Get the current post ID
	global $post;
	$post_id = $post->ID;

	// Fetch the field data
	$field_data = get_field($field_key, $post_id);
//    var_dump($field_data); exit();

	// If a language-specific field exists, return it
	$localized_field_key = $field_key;

	if($lang !== 'en') {
		$localized_field_key = $field_key . '_' . $lang;
	}
//    var_dump($localized_field_key);
	if (isset($field_data[$localized_field_key])) {
		return $field_data[$localized_field_key];
	}

	// Fallback to the default language field
	return isset($field_data[$field_key]) ? $field_data[$field_key] : '';
}
//var_dump(5555);
//die(444);

add_filter('show_admin_bar', '__return_true');

// English and Armenian Copyright Block
function display_copyright_block() {
    $current_language = pll_current_language();
    $year = date('Y');
    ?>
    <div style="text-align: center; padding: 10px; background: #f1f1f1; font-size: 10px;">
        <p style="margin-bottom: 0">
            <?php if($current_language == 'en') {?>
            Copyright © <?php echo $year; ?> | All rights reserved, created by SimportS.
            <?php } else  {?>
            Copyright © <?php echo $year; ?> | Բոլոր իրավունքները պաշտպանված են, ստեղծվել է SimportS-ի կողմից:
            <?php }?>
        </p>
    </div>
    <?php
}
add_action('wp_footer', 'display_copyright_block');

// TRANSLATIONS

// Add a custom options page
function custom_translation_options_page() {
    add_options_page(
        'Translation Manager', // Page title
        'Translations',        // Menu title
        'manage_options',      // Capability
        'translation-manager', // Menu slug
        'render_translation_page' // Callback function
    );
}
add_action('admin_menu', 'custom_translation_options_page');

// Render the options page
function render_translation_page() {
    ?>
    <div class="wrap">
        <h1>Translation Manager</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('custom_translation_options');
            do_settings_sections('translation-manager');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Register custom settings
function custom_translation_settings() {
    register_setting('custom_translation_options', 'translation_fields');

    add_settings_section(
        'translation_section',
        'Manage Translations',
        'translation_section_callback',
        'translation-manager'
    );

    add_settings_field(
        'dynamic_translation_fields',
        'Translation Fields',
        'dynamic_translation_fields_callback',
        'translation-manager',
        'translation_section'
    );
}
add_action('admin_init', 'custom_translation_settings');

// Section description
function translation_section_callback() {
    echo '<p>Add keys and translations for your fields below.</p>';
}
function dynamic_translation_fields_callback() {
    $translation_fields = get_option('translation_fields', []);
    ?>
    <div id="translation-fields-container">
        <?php if (!empty($translation_fields)) : ?>
            <?php foreach ($translation_fields as $key => $translations) : ?>
                <div class="translation-group">
                    <div style="margin-top: 4px;">
                    <input
                            type="text"
                            name="translation_fields[new_<?php echo esc_attr($key); ?>][key]"
                            value="<?php echo esc_attr($key); ?>"
                            placeholder="Field Key" />
                    <input
                            type="text"
                            name="translation_fields[new_<?php echo esc_attr($key); ?>][hy]"
                            value="<?php echo esc_attr($translations['hy'] ?? ''); ?>"
                            placeholder="Armenian Translation (hy)" />
                    <input
                            type="text"
                            name="translation_fields[new_<?php echo esc_attr($key); ?>][en]"
                            value="<?php echo esc_attr($translations['en'] ?? ''); ?>"
                            placeholder="English Translation (en)" />
                    <button type="button" style="background: red;" class="remove-translation-field">Remove</button>
                    </div>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <button type="button" style="background: #0d99d5; color: #fff;margin-top: 4px;" id="add-translation-field">Add Field</button>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.getElementById('translation-fields-container');
            const addFieldButton = document.getElementById('add-translation-field');

            addFieldButton.addEventListener('click', () => {
                const index = container.children.length;
                const newFieldGroup = document.createElement('div');
                newFieldGroup.classList.add('translation-group');
                newFieldGroup.innerHTML = `
                    <input type="text" name="translation_fields[new_${index}][key]" placeholder="Field Key" />
                    <input type="text" name="translation_fields[new_${index}][hy]" placeholder="Armenian Translation (hy)" />
                    <input type="text" name="translation_fields[new_${index}][en]" placeholder="English Translation (en)" />
                    <button type="button" class="remove-translation-field">Remove</button>
                `;
                container.appendChild(newFieldGroup);
            });

            container.addEventListener('click', (e) => {
                if (e.target.classList.contains('remove-translation-field')) {
                    e.target.closest('.translation-group').remove();
                }
            });
        });
    </script>
    <?php
}



// Process data before saving to the database
function save_translation_fields_as_object($value) {
    $processed_data = [];

    foreach ($value as $entry) {
        if (!empty($entry['key'])) {
            $key = $entry['key'];
            $processed_data[$key] = [
                'hy' => $entry['hy'] ?? '',
                'en' => $entry['en'] ?? '',
            ];
        }
    }

    return $processed_data;
}
add_filter('pre_update_option_translation_fields', 'save_translation_fields_as_object');

if (!function_exists('hg_translate')) {
    /**
     * Get and safely display a translation.
     *
     * @param string $key The translation key to fetch.
     * @param string $current_language The current language (e.g., 'hy', 'en').
     * @return string The translated text or the key if the translation is missing.
     */
    function hg_translate($key) {
        // Fetch all translations from the options.
        $translations = get_option('translation_fields', []);
        if(pll_current_language() !== null)
        $current_language = pll_current_language();
        else $current_language = "en";

        // Check if the key exists and if the translation for the current language is available.
        if (isset($translations[$key]) && !empty($translations[$key][$current_language])) {
            return esc_html($translations[$key][$current_language]);
        }

        // If the key or translation is missing, return the key itself as a fallback.
        return esc_html($key);
    }
}

function hg_is_admin_user() {
    // Get the current user object
    $current_user = wp_get_current_user();

    // Check if the user has the 'administrator' role
    if (in_array('administrator', (array) $current_user->roles)) {
        return true;
    }

    return false;
}


?>
