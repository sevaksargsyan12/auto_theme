<?php
/* Template Name: Design */
get_header();
?>
<section class="section-contacts">
	<div class="container max-container bg">
		<div class="row">
			<div class="contact-info col-lg-6 col-xl-5">
				<div class="contact-info-div flex-wrap">
					<div>
						<h1 class="w-100">
							Contact Us<br>
							Get in Touch with Us
						</h1>
						<div class="contact-item w-100 phone">
							<?php
							$phone_number = get_field('phone', 'option');
							$phone_image = get_field('phone_icon', 'option');
							$phone_display = get_field('phone_display', 'option');
							?>
							<img src="<?php _e($phone_image) ?>">
							<a href="tel:<?php _e($phone_number)?>">
								<?php _e($phone_display)?>
							</a>
						</div>
						<div class="contact-item w-100 location">
							<?php
							$location = get_field('location', 'option');
							$location_icon= get_field('location_icon', 'option');
							?>
							<img src="<?php _e($location_icon) ?>">
							<span>
							<?php _e($location)?>
                        </span>
						</div>
						<div class="contact-item w-100 email">
							<?php
							$email = get_field('email', 'option');
							$email_icon = get_field('email_icon', 'option');
							?>
							<img src="<?php _e($email_icon) ?>">
							<a href="mailto:<?php _e($email)?>">
								<span><?php _e($email)?></span></a>
						</div>
						<div class="social-items w-100 email">
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
			<div class="contact-form col-lg-6 col-xl-7">
				<section class="estimate-section others" id="estimate">
					<div class="justify-content-center estimate-row">
						<div class="estimate-div text-center">
							<h2>Please fill te Form</h2>
							<div class="tab-content">
								<?php
								echo do_shortcode('[contact-form-7 id="c4b5802" title="Get In Touch"]')
								?>
							</div>
						</div>
					</div>
				</section>
			</div>
</section>
<?php
get_footer();?>
