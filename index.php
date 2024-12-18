<?php
get_header();
$post_id = get_the_ID();
//var_dump(4444);
?>
<style>

    /*    classes   */

    .iconfont {
        font-size: 16px;
        font-style: normal;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .iconshijian:before {
        content: "\e607";
    }

    /* --- */


    .single-post {
        margin-top: 130px;
        font-size: 1.5vw;
    }

    .container {
        max-width: 800px;
        width: calc(100% - 40px);
        margin: 0 auto;
    }

    .detail-title {
        width: 90%;
        padding-top: 4%;
        font-size: 1.3vw;
        font-weight: 700;
        box-sizing: border-box;
        line-height: 2;
    }

    .detail-record {
        width: 100%;
        padding: 1% 0 2%;
        border-bottom: 1px solid #d2d2d2;
        box-sizing: border-box;
        margin-top: 3%;
        display: flex;
        margin-bottom: 2%;
    }

    .detail-record .detail-date .iconshijian {
        color: #747474;
        margin-right: .5vw;
    }

    .post-footer {
        width: 100%;
        margin-top: 5%;
        margin-bottom: 6%;
        border-top: 1px solid #d2d2d2;
        padding-top: 2%;
        display: flex;
        box-sizing: border-box;
    }

    .fa-brands {
        color: #747474; /* Twitter blue */
        font-size: 1.8vw;
        margin-right: 0.8vw;
    }

    .fa-brands:hover {
        color: #0d6efd; /* A different shade of blue on hover */
        transform: scale(1.1); /* Slight zoom effect */
        transition: all 0.3s ease-in-out;
    }

    .post-navigation {
        display: flex;
        gap: 14px;
        color: #747474;
    }

    .post-navigation strong {
        font-size: .9vw;
    }

    .post-navigation .previous-post strong {
        margin-left: -1.5vw;
    }

    .post-navigation .fa ,
    .post-navigation a {
        color: #747474;
    }

    .post-navigation a {
        display: flex;
        flex-direction: column;
    }

    .post-navigation .fa:hover {
        color: #0d6efd; /* A different shade of blue on hover */
    }

    .single-post-container {
        width: 60%;
        margin: 0 auto;
    }

    .fa-clock-o {
        font-size: 2vw;
    }

    @media screen and (max-width: 800px) {
        .single-post-container {
            width: 80%;
            margin: 0 auto;
        }

        .detail-title {
            font-size: 2.3vw;
        }

        .detail-date {
            font-size: 2vw;
        }

        .post-content {
            font-size: 1.8vw;
        }

        .fa-chevron-circle-right,
        .fa-chevron-circle-left,
        .fa-brands {
            font-size: 2.8vw;
        }
    }

    @media screen and (max-width: 640px) {
        .single-post-container {
            width: 90%;
            margin: 0 auto;
        }

        .single-post {
            margin-top: 100px;
            font-size: 1.5vw;
        }

        .detail-title {
            font-size: calc(2.3vw * 1.5); /* Increased by 1.5 times */
        }

        .detail-date {
            font-size: calc(2vw * 1.5); /* Increased by 1.5 times */
        }

        .post-content {
            font-size: calc(1.8vw * 1.5); /* Increased by 1.5 times */
        }

        .fa-chevron-circle-right,
        .fa-chevron-circle-left,
        .fa-brands {
            font-size: calc(2.8vw * 1.5); /* Increased by 1.5 times */
        }

        .post-navigation strong {
            font-size: 1.2vw;
        }
    }

    @media screen and (max-width: 475px) {
        .single-post {
            margin-top: 60px;
        }
    }

</style>
<section class="max-container single-post-container single-post">
    <h1 class="txt-uppercase detail-title"><?php the_title(); ?></h1>
    <div class="detail-record">
        <div class="detail-date"><i class="fa fa-clock-o"></i>
            <?php
            $post_date = get_the_date('Y-m-d');
            echo $post_date;
            ?>
        </div>
    </div>
    <div class="post-content">
        <?php the_content();?>
    </div>
    <div class="post-footer d-flex justify-content-between">
        <div class="share-icons">
            <a href="https://www.facebook.com/HongqiInternational/" target="_blank" rel="noopenner noreferrer">
                <i class="fa-brands fa-facebook"></i>
            </a>
            <a href="https://twitter.com/HongqiGlobal" target="_blank" rel="noopenner noreferrer">
                <i class="fa-brands fa-twitter"></i>
            </a>
        </div>
    </div>
</section>
<?php get_footer(); ?>

