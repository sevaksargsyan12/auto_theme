<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/images/logo.png'); ?>" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!--    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcVJMS4L8bepDHAimvBgMC6nrux1IK8cc"></script>-->

	<?php wp_head(); ?>
    <style>
       <?php if(!hg_is_admin_user()):?>

        html {
            margin-top: 0 !important;
        }
        #wpadminbar {
            display: none !important;
        }
        <?php endif;?>
    </style>
</head>
<body <?php body_class(); ?>>
<header id="cti-header" class="txt-uppercase d-fixed" style="opacity: 1; display: block; top: 0px;">
    <div class="default-menu">
        <div class="menu-wrap iconfont">
            <div class="menu_logo menu_active">
                <a class="header-logo-a hg-desktop" href="<?php _e(home_url())?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"  alt="logo armenia hongqi" class="logo"/>
                </a>
                <a class="header-logo-a hg-mobile" href="<?php _e(home_url())?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo_white.png"  alt="logo armenia hongqi" class="logo"/>
                </a>
            </div>
            <div class="desktop-menu">
				<?php
				wp_nav_menu([
					'theme_location' => 'primary-menu', // Replace with your theme location
					'menu_class'     => 'menu',
					'container'      => false,
					'walker'         => new Custom_Walker_Nav_Menu(), // Custom walker
				]);
				?>
                <div class="menu-close-wrapper hg-mobile">
                    <i class="fa fa-close" aria-hidden="true"></i>
                </div>
            </div>
            <div class="mobile-burger-wrapper hg-mobile">
                <button>
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
            <div class="mobile-language hg-mobile">
                <i class="fa-solid fa-globe text-white"></i>
                <?php
                if (function_exists('pll_the_languages')) {
                    echo '<div class="language-switcher">';
                    pll_the_languages([
                        'hide_current' => 1,
                        'dropdown' => 0,          // Set to 1 for a dropdown list
                        'show_flags' => 1,        // Show flags
                        'show_names' => 1,        // Show language names
                        'hide_if_empty' => 0,     // Hide if no translation exists
                        'force_home' => 0,        // Link to home page
                    ]);
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</header>