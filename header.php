<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/logo_main․png" type="image/x-icon">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
    <div class="container max-container">
        <div class="row header-row">
            <div class="col-xl-2 col-lg-2 col-9">
                <a class="header-logo-a" href="<?php _e(home_url())?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo_main.png" alt="logo" class="header-logo"/>
                     <span><<Քյավառ Սերվիս>> ՍՊԸ</span>
                </a>

            </div>
            <div class="col-xl-8 col-lg-10 header-menu">
                <nav class="nav">
                    <ul class="menu">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'primary-menu',
                        ) );
                        ?>
                    </ul>
                </nav>
                <a class="phone-header-icon d-none" href="tel:747 5000 747">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/phone-icon.svg" alt="logo"/>
                </a>
            </div>
            <div class="col-2 header-phone-col">
                <div class="header-phone-div">
                                            <?php
                                            $phone_number = get_field('phone_2', 'option');
                                            $phone_image = get_field('phone_icon', 'option');
                                            $phone_display = get_field('phone_display_2', 'option');
                                            ?>
                    <a class="header-phone" href="tel:<?php _e($phone_number)?>">
                       <span>Հեռ։</span> <span><?php _e($phone_display)?></span></a>
                </div>
            </div>
            <div class="mobile-header-menu col-lg-9 col-3">
                <a class="phone-header-icon" href="tel:<?php _e($phone_number)?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/phone-icon.svg" alt="logo"/>
                </a>
                <input id="menu-toggle" type="checkbox"/>
                <label class='menu-button-container' for="menu-toggle">
                    <div class='menu-button'></div>
                </label>
                <ul class="mobile-menu">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'mobile-menu',
						'menu_class' => 'mobile-menu', // Add your custom class here
					) );
					?>
<!--                    <li class="nav-item">-->
<!--                        <a href="#custom-glass">Products</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a href="#hardware">Hardware and finishes</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a href="#estimate">Contact us</a>-->
<!--                    </li>-->
                </ul>
            </div>
        </div>
    </div>
</header>