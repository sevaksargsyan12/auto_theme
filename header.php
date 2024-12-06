<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/logo_main․png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!--    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcVJMS4L8bepDHAimvBgMC6nrux1IK8cc"></script>-->

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header id="cti-header" class="txt-uppercase d-fixed" style="opacity: 1; display: block; top: 0px;">
    <div class="default-menu">
        <div class="logo-wrap" style="height: 44px;"></div>
        <div class="menu-wrap iconfont">
            <div class="menu_logo menu_active">
<!--                <a href="https://www.hongqi-auto.com/"> <img src="./home/logo.png" class="logo" alt="logo"-->
<!--                                                             style="display: none;"></a>-->
                <a class="header-logo-a" href="<?php _e(home_url())?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"  alt="logo" class="logo"/>
                </a>

            </div>
				<?php
				wp_nav_menu([
					'theme_location' => 'primary-menu', // Replace with your theme location
					'menu_class'     => 'menu',
					'container'      => false,
					'walker'         => new Custom_Walker_Nav_Menu(), // Custom walker
				]);
				?>
        </div>
    </div>
</header>