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
    // Enqueue the favicon
    wp_enqueue_script('custom-favicon', get_template_directory_uri() . '/images/logo.svg', array(), null, false);

    // Enqueue the main stylesheet
    wp_enqueue_style('custom-style', get_stylesheet_directory_uri() . '/css/style.css');

	// Enqueue the lightbox
	wp_enqueue_style('custom-lightbox', get_stylesheet_directory_uri() . '/css/lightbox.css');

    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/bootstrap-5.0.2-dist/css/bootstrap.min.css');

    // Enqueue Slick slider CSS
    wp_enqueue_style('slick-css', get_template_directory_uri() . '/slick-master/slick/slick.css');
    wp_enqueue_style('slick-theme-css', get_template_directory_uri() . '/slick-master/slick/slick-theme.css');


    wp_enqueue_script('jquery');

//    // Enqueue Slick slider scripts
//    wp_enqueue_script('slick-slider', get_template_directory_uri() . '/slick-master/slick/slick.min.js', array('jquery'), null, true);
//
//    // Enqueue Bootstrap Bundle JS
//    wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
//
//
//	// Enqueue custom JavaScript file
//	wp_enqueue_script('custom-lightbox-js', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), null, true);
//
//    // Enqueue custom JavaScript file
//    wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom-scripts.js', array('jquery'), null, true);

    $translation_array = array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'directory_uri' =>  get_template_directory_uri(),

    );
    wp_localize_script('custom-js', 'custom_ajax_object', $translation_array);

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

function custom_excerpt_length($length) {
	return 30; // Adjust the number of words in the excerpt
}
add_filter('excerpt_length', 'custom_excerpt_length');

// Modify the post excerpt "read more" text
function custom_excerpt_more($more) {
//	return '... <a class="read-more" href="' . get_permalink() . '">' . __('Read More', 'text-domain') . '</a>';
	return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');