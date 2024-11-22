<footer>
    <div class="footer">
        <div class="container max-container">
            <div class="row footer-row">
                <div class="col-lg-5 col-md-12">
                    <div class="main-info">
						<?php
						$phone_number = get_field('phone_2', 'option');
						$phone_display = get_field('phone_display_2', 'option');
						?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo_main.png" alt="footer logo" class="footer-logo"/>
                        <a href="tel:<?php _e($phone_number)?>">
                            Call us: <?php _e($phone_display)?>
                        </a>
						<?php
						$email = get_field('email', 'option');
						?>
                        <a href="mailto:<?php _e($email)?>">Email:
                            <span><?php _e($email)?></span></a>
                        <div class="social-items w-100 email mobile-display">
							<?php
							$socials = get_field('socials', 'option');
							foreach ($socials as $social):
								?>
                                <a href="<?php _e($social['url'])?>">
                                    <img src="<?php _e($social['icon']) ?>">
                                </a>
							<?php endforeach;?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-6 d-flex">
                    <div class="footer-menu">
                        <nav class="nav">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu',
							) );
							?>
<!--                            <ul class="menu">-->
<!--                     <li class="nav-item">-->
<!--                        <a href="#custom-glass">Products</a>-->
<!--                     </li>-->
<!--                    <li class="nav-item">-->
<!--                         <a href="#hardware">Hardware and finishes</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                         <a href="#estimate">Contact us</a>-->
<!--                    </li>-->
                             <!--   <li class="nav-item">
                                    <a href="#custom-glass">Showers</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#custom-glass">Mirrors</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#custom-glass">Glass Railings</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#custom-glass">Storefronts</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#custom-glass">Office Doors and Partitions</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#hardware">Hardware and finishes</a>
                                </li> -->
<!--                            </ul>-->
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6 d-flex">
                    <div class="footer-menu">
                        <nav class="nav">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'footer-menu-2',
							) );
							?>
                        </nav>
                        <div class="social-items w-100 email desktop-display">
							<?php
							$socials = get_field('socials', 'option');
							foreach ($socials as $social):
								?>
                                <a href="<?php _e($social['url'])?>">
                                    <img src="<?php _e($social['icon']) ?>">
                                </a>
							<?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container max-container">
        <div class="row">
            <div class="col-12 footer-span-col">
                <span>Copyright © 2024 ! Professional Glass Services
                </span>
            </div>
        </div>
    </div>
</footer>
<?php
wp_footer();
?>
</body>
</html>