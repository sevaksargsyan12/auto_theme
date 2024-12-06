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
    font-size: 24px;
    margin-right: 10px;
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
    font-size: .7vw;
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

</style>
<section class="container max-container single-post">
    <h1 class="txt-uppercase detail-title"><?php the_title(); ?></h1>
    <div class="detail-record">
        <div class="detail-date"><i class="fa fa-clock-o" style="font-size:24px"></i>
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
        <div class="pagination">
            <div class="post-navigation">
                <div class="previous-post">
                    <?php
                    $current_language = pll_current_language();
                    $previous = 'Previous';
                    $next = 'Next';

                    if($current_language == 'hy') {
                        $previous = 'Նախորդ';
                        $next = 'Հաջորդ';
                    }
                    // Display the previous post link with an icon
                    $prev_post = get_previous_post_link('%link', '<i class="fa fa-chevron-circle-left"></i>
<strong>'.$previous.'</strong>');
                    if ($prev_post) {
                        echo $prev_post;
                    }
//                    else {
//                        echo '<span>No Previous Post</span>';
//                    }
                    ?>
                </div>

                <div class="next-post">
                    <?php
                    // Display the next post link with an icon
                    $next_post = get_next_post_link('%link', '<i class="fa fa-chevron-circle-right"></i>
<strong>'.$next.'</strong>');
                    if ($next_post) {
                        echo $next_post;
                    }
//                    else {
//                        echo '<span>No Next Post</span>';
//                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>

