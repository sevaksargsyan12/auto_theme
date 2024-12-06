<style>
  .address-template-part {
      width: calc(100% - 80px);
      /*margin: 4% auto;*/
      font-size: 1vw;
  }

  .address-template-part .type {
      font-weight: 700;
      font-size: 1.2vw;
  }

  .address-template-part  a {
      color: #000;
  }

  .address-template-part  a i {
      transition: transform 0.5s ease; /* Smooth rotation effect */
  }

  .address-template-part  a:hover {
      text-decoration: underline;
  }
  .address-template-part  a:hover i {
      transform: rotate(90deg);
  }
</style>
<div class="address-template-part">
    <div class="d-flex flex-column address-wrapper">
        <?php
        $current_language = pll_current_language();
        $addressName = 'Հասցե';

        if($current_language == 'en'){
            $addressName = 'Address';
        }

        $phoneName = 'Հեռ․';

        if($current_language == 'en'){
            $phoneName = 'Phone';
        }

        $emailName = 'Էլ Փոստ․';

        if($current_language == 'en'){
            $emailName = 'Email';
        }

        $address = get_field('address', 'option');
        $email = get_field('email', 'option');
        $phones = get_field('phones', 'option');


        ?>
        <div class="address-block block">
            <p class="type-address type">
                <?php _e($addressName);?>
            </p>
            <p class="content-address">
                <?php _e($address);?>
            </p>
        </div>
        <div class="email-block block">
            <p class="type-email type">
                <?php _e($emailName);?>
            </p>
            <p class="content-email">
                <?php _e($email);?>
            </p>
        </div>
        <div class="block phone-block">
            <p class="type-phone type">
                <?php _e($phoneName);?>
            </p>
            <div>
                <p class="content-phone">
                    <?php foreach ($phones as $phone): ?>
                        <a href="tel:<?php _e($phone['phone'])?>" target="_blank">
                            <i class="fas fa-phone"></i><?php _e($phone['phone_display']) ?>
                        </a>
                    <?php endforeach; ?>
                </p>
            </div>
        </div>

    </div>
<!--    --><?php
//    get_template_part( 'template-parts/content', 'socials' ); // This loads content-single.php
//    ;?>
</div>