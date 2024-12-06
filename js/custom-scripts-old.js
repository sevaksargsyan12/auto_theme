document.addEventListener("DOMContentLoaded", function () {
    window.scrollTo(0, 0); // Scroll to the top-left corner of the page
});

document.addEventListener("DOMContentLoaded", function () {
    // Select all elements with the class 'd-opacity'
    const elements = document.querySelectorAll(".d-opacity");
    console.log('elements',elements);
    // Create an IntersectionObserver
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    // Add the 'd-enter' class when the element enters the viewport
                    entry.target.classList.add("d-enter");
                }
            });
        },
        {
            threshold: 0.1, // Trigger when 10% of the element is visible
        }
    );

    // Observe each element
    elements.forEach((el) => observer.observe(el));
});

// car models by category in home page
jQuery(document).ready(function ($) {
    // Handle category click
    $('.categories-tabs li.category-tab').on('click', function () {
        // Remove 'active' class from all categories
        // setTimeout(() => {
        //     $('.categories-tabs li.category-tab').removeClass('active');

        // },200);
        // Add 'active' class to the clicked category
        $('.categories-tabs li.category-tab').removeClass('active');
        $(this).addClass('active');

        // Get the clicked category's car type
        const carType = $(this).data('car-type');
        $('.cartype-car-group').removeClass('d-enter');
        // Hide all car model groups
        $('.cartype-car-group .cartype-car').removeClass('act');
        $('.cartype-car-group .cartype-car').removeClass('d-enter');
        // Show the relevant car models
        $(`.cartype-car[data-car-type="${carType}"]`).addClass('act');
        $(`.cartype-car[data-car-type="${carType}"]`).addClass('d-enter');
        setTimeout(() => {
            $('.cartype-car-group').addClass('d-enter');
        },200);

    });

    //handle click on item of car

    $('section.categories-and-models ul.cartype-car li').on('click', function () {
        $(this).siblings().removeClass('act');
        $(this).addClass('act');
        const data_key = $(this).attr('data-key');
        $('.car-item-wrap.posts').removeClass('act');
        $('.car-item-wrap.post').removeClass('act');

        const targetPost = $('.car-'+data_key);
        $('.car-'+data_key).addClass('act');
        $('.car-'+data_key).parent().addClass('act');

        $('.color-btn').removeClass('act');
        $('.color-btn-item').removeClass('act');
        $('.color-btn.data-for-post'+data_key).parent().addClass('act');
        $('.color-btn.data-for-post'+data_key).addClass('act');

        let link = targetPost.attr('data-link');
        let title = targetPost.attr('data-title');
        $('.describe-group .describe-item h2').text(title);
        $('.describe-group .describe-item a').attr('href', link);
    });


});

document.addEventListener("DOMContentLoaded", function () {
    const carGroup = document.querySelector(".changing-over .car-group");
    setTimeout(() => {
        carGroup.classList.add("move");
    }, 0); // Wait 1 second before starting the transition
});

// COLOR CHANGE FUNCTIONALITY

jQuery(document).ready(function ($) {
    //SINGLE CAR MODEL POST

    //color change functionality
    $('.color-box').on('click', function () {
        // Toggle rotation of the icon
        const index = $(this).attr('data-index');
        $('.color-box').siblings().removeClass('act');
        $(this).addClass('act');
        $('.car-item-wrap.act .color-car-image').removeClass('active');
        $('.car-item-wrap.act .color-car-image.car-'+index).addClass('active');
    });


    //mountain section slider

    $('.changing-over .changing_arrow1').on("click", function () {
        // if (timer) return;
        var dir = $(this).hasClass("prev") ? "prev" : "next";
        console.log(dir, "dir");
        let currentPostsWrapper = $('.car-group .car-item-wrap.posts.act');
        let nextPostWrapper =  currentPostsWrapper.next().length ? currentPostsWrapper.next() : currentPostsWrapper.prev();

        if(!nextPostWrapper.length) {
            nextPostWrapper = currentPostsWrapper;
        }
        let currentPost = $('.car-group .car-item-wrap.posts.act .car-item-wrap.post.act');
        const postCount = currentPostsWrapper.attr('data-post-count');
        const currentIndex = currentPost.index();
        let nextPost = currentPost.next();
        console.log('nextPost',postCount - currentIndex);

        if(postCount - currentIndex <= 1) {
            console.log(123456, nextPostWrapper);
            let catName = nextPostWrapper.attr('data-cat-name');
            $('.categories-tabs li.category-tab[data-car-type='+catName+']').trigger('click')
            nextPost = nextPostWrapper.find('.car-item-wrap.post').first();
            currentPostsWrapper.removeClass('act');
            nextPostWrapper.addClass('act');
        }

        let link =  nextPost.attr('data-link');
        let title =  nextPost.attr('data-title');
        $('.describe-group .describe-item h2').text(title);
        $('.describe-group .describe-item a').attr('href',link);
        currentPost.removeClass('act fadeOutLeft');
        nextPost.addClass('act fadeInRight');
    });

    $('.changing-over .changing_arrow').on("click", function () {
        var dir = $(this).hasClass("prev") ? "prev" : "next"; // Determine direction
        console.log(dir, "dir");

        let currentPostsWrapper = $('.car-group .car-item-wrap.posts.act');
        let targetPostWrapper = dir === "next"
            ? (currentPostsWrapper.next().length ? currentPostsWrapper.next() : currentPostsWrapper.prev())
            : (currentPostsWrapper.prev().length ? currentPostsWrapper.prev() : currentPostsWrapper.next());

        if (!targetPostWrapper.length) {
            targetPostWrapper = currentPostsWrapper; // Fallback to the current wrapper
        }

        let currentPost = $('.car-group .car-item-wrap.posts.act .car-item-wrap.post.act');
        const postCount = parseInt(currentPostsWrapper.attr('data-post-count'), 10);
        const currentIndex = currentPost.index();
        let targetPost = dir === "next" ? currentPost.next() : currentPost.prev();

        // Check if we need to switch wrappers
        if ((dir === "next" && postCount - currentIndex <= 1) || (dir === "prev" && currentIndex === 0)) {
            console.log("Switching Wrapper", targetPostWrapper);
            let catName = targetPostWrapper.attr('data-cat-name');
            $('.categories-tabs li.category-tab[data-car-type=' + catName + ']').trigger('click');
            targetPost = dir === "next"
                ? targetPostWrapper.find('.car-item-wrap.post').first()
                : targetPostWrapper.find('.car-item-wrap.post').last();
            currentPostsWrapper.removeClass('act');
            targetPostWrapper.addClass('act');
        }

        // Update slider details
        let link = targetPost.attr('data-link');
        let title = targetPost.attr('data-title');
        $('.describe-group .describe-item h2').text(title);
        $('.describe-group .describe-item a').attr('href', link);

        // Update classes for animation
        currentPost.removeClass('act fadeInRight fadeInLeft fadeOutRight fadeOutLeft');
        targetPost.addClass('act ' + (dir === "next" ? 'fadeInRight' : 'fadeInLeft'));
        let data_key = targetPost.attr('data-key');
        $('.color-btn').removeClass('act');
        $('.color-btn-item').removeClass('act');
        $('.color-btn.data-for-post'+data_key).parent().addClass('act');
        $('.color-btn.data-for-post'+data_key).addClass('act');


        console.log('data_key',data_key);
        $('.profile-post-image[data-key="'+data_key+'"]').trigger('click');
    });

})

