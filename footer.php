<style>
    #cti-footer {
        margin-top: 2%;
        display: flex;
        font-size: 1vw;
        padding: 4% 6% 7%;
        background: #333;
        color: #898989;
        justify-content: space-between;
        line-height: 2;
    }

    #cti-footer a {
        color: inherit;
    }

    #cti-footer .contact {
        width: 37%;
    }

    #cti-footer .follow {
        width: 49%;
    }

    #cti-footer .follow .footer-title a {
        text-transform: lowercase;
        font-weight: 400;
        margin-left: 1%;
        letter-spacing: 0;
    }

    #cti-footer .follow .icon {
        width: 2.24vw;
        margin: 4% 4% 0 0;
        filter: grayscale(100%);
        transition: all .3s;
        cursor: pointer;
    }

    #cti-footer .follow .icon:hover {
        filter: none;
    }

    #cti-footer .footer-title {
        color: #898989;
        font-size: 1.25vw;
        line-height: 4;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: .1em;
    }

    #cti-footer .contact .email-wrap {
        display: flex;
        margin: 8% 0;
    }

    #cti-footer .contact .email-wrap .input {
        width: calc(100% - 13em);
    }

    #cti-footer .contact .email-wrap .input input {
        background-color: #b0b0b0;
        color: #fff;
        font-size: 1.56vw;
        padding: 0 4%;
        line-height: 2em;
        width: 100%;
        box-sizing: border-box;
        font-style: italic;
        height: 100%;
        border: none;
    }

    #cti-footer .contact .email-wrap .button {
        width: 13em;
        min-width: 100px;
        line-height: 3em;
        box-sizing: border-box;
        padding: 0 2%;
        transition: all .3s;
        background: #8a8a8a;
    }

    #cti-footer .contact .email-wrap .button button {
        border: none;
        background: none;
        color: #fff;
    }

    .subscription-footer > p  {
        display: flex;
    }

    .subscription-footer > p input[type="email"] {
        background-color: #b0b0b0;
        color: #fff;
        font-size: 1.56vw;
        padding: 0 4%;
        line-height: 2em;
        width: 100%;
        box-sizing: border-box;
        font-style: italic;
        height: 100%;
        border: none;
        outline: none;
    }

    .subscription-footer > p input[type="submit"] {
        line-height: 3em;
        box-sizing: border-box;
        padding: 0 2%;
        transition: all .3s;
        background: #8a8a8a;
        color: #fff;
        border:none;
    }

    .subscription-footer > p input::placeholder {
        color: #fff;
    }

    .subscription-footer > p input[type="submit"]:hover {
        background: #6c6b6b;
    }

</style>
<?php

$current_language = pll_current_language();
$contact_form_shortcode = '[contact-form-7 id="27e531f" title="Footer subscription En"]';
if ($current_language === 'hy') {
    $contact_form_shortcode = '[contact-form-7 id="95d7bb8" title="Footer subscription"]';
}

$email = get_field('email', 'option');

?>
<footer id="cti-footer">
    <div class="contact">
        <div class="footer-title">Stay informed</div>
        <p>To keep you in the loop of our latest news, register now for our email newsletter.</p>
        <div class="email-wrap">
<!--            <div class="input">-->
<!--                <input class="email" type="email" name="email" required="" aria-required="true" autocomplete="email"-->
<!--                       placeholder="Your email address">-->
<!--            </div>-->
<!--            <a href="javascript:;" class="button">-->
<!--                <span class="iconfont iconarrow-right"></span>-->
<!--                <button>Sign up now</button>-->
<!--            </a>-->
            <?php

            _e(do_shortcode($contact_form_shortcode));
            ?>
        </div>
        <div class="agree-wrap">
            <div class="agree-icon show-switch"></div>
            <p>
                I agree to the
                <a class="agree_privacy_btn" target="_blank" href="./pages/Privacy-statement/Privacy-statement.html">Privacy
                    Policy</a>
            </p>
        </div>
    </div>
    <div class="follow">
        <div class="footer-title">
            CONTACT US:<a href="mailto:<?php _e($email); ?>"><?php _e($email); ?></a>
        </div>
        <p>
            Follow us and use following social media platforms to get in contact with us and to
            share your passion for the brand, products and services of Hongqi.
        </p>

        <?php
            get_template_part( 'template-parts/content', 'socials' ); // This loads content-single.php
        ;?>
    </div>
</footer>
<?php
wp_footer();
?>
</body>
</html>