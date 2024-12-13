function anchorPoint(selector) {
    const target = jQuery(selector);
    if (target.length) {
        jQuery('html, body').animate(
            {
                scrollTop: target.offset().top - 80,
            },
            600 // duration of the scroll animation in milliseconds
        );
    }
}
document.addEventListener("DOMContentLoaded", function () {
    window.scrollTo(0, 0); // Scroll to the top-left corner of the page
});

document.addEventListener("DOMContentLoaded", function () {
    // Select all elements with the class 'd-opacity'
    const elements = document.querySelectorAll(".d-opacity, .d-ani");
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
    jQuery('.new_blank').attr('target', '_blank');

    // Check active menu item
    if(jQuery('.single-car-model').length) {
        jQuery('.models-menu-item').addClass('current-menu-item');
    }


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

    // INIT ABOVE CLICK


    function initInSlider() {
        let firstElement = $('section.categories-and-models ul.cartype-car li').first();
        const data_key = firstElement.attr('data-key');
        const targetPost = $('.car-'+data_key);
        let link = targetPost.attr('data-link');
        let title = targetPost.attr('data-title');
        $('.describe-group .describe-item h2').text(title);
        $('.describe-group .describe-item a').attr('href', link);
    }

    initInSlider();


});

document.addEventListener("DOMContentLoaded", function () {
    const carGroup = document.querySelector(".changing-over .car-group");
    setTimeout(() => {
        carGroup?.classList?.add("move");
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


// Library

function loadImage(url, callback) {
    var img = new Image(); //鍒涘缓涓€涓狪mage瀵硅薄锛屽疄鐜板浘鐗囩殑棰勪笅杞�    銆�
    img.src = url;
    if (img.complete) {
        // 濡傛灉鍥剧墖宸茬粡瀛樺湪浜庢祻瑙堝櫒缂撳瓨锛岀洿鎺ヨ皟鐢ㄥ洖璋冨嚱鏁�
        callback && callback(img);
        return; // 鐩存帴杩斿洖锛屼笉鐢ㄥ啀澶勭悊onload浜嬩欢
    }
    img.onload = function () {
        //鍥剧墖涓嬭浇瀹屾瘯鏃跺紓姝ヨ皟鐢╟allback鍑芥暟
        callback && callback(img);
    };
    img.onerror = function () {
        callback && callback(img);
    };
}

window.global_popup = (type, src, poster) => {
    let typeName, srcPath, posterPath;

    if (type === "data") {
        typeName = src?.getAttribute("data-type");
        srcPath = src?.getAttribute("data-src");
        posterPath = src?.getAttribute("data-poster");
    } else {
        typeName = type;
        srcPath = src;
    }

    if (!srcPath) {
        alert("Coming soon!");
        return;
    }

    // Simplify the path manipulation
    const resPath = srcPath.split("/").slice(4).join("/");

    if (!resPath) {
        alert("Coming soon!");
        return;
    }

    const defaultVideoSrc = "https://www.hongqi-auto.com/storage/videos/cartype.mp4";
    const html = typeName === "video"
        ? `<video src="${srcPath || defaultVideoSrc}" controls autoplay poster="${poster || posterPath}"></video>`
        : `<img src="${srcPath}" alt="Popup Image" />`;

    const template = `
        <div class="g-mask g-popup">
            <div class="iconfont iconclose1">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <div class="ele-wrap">${html}</div>
        </div>
    `;

    document.body.insertAdjacentHTML("beforeend", template);

    if (typeName !== "video") {
        loadImage(srcPath, () => {
            document.querySelector(".g-popup img")?.classList.add("act");
        });
    }

    setTimeout(() => {
        document.querySelector(".g-popup")?.classList.add("act");
    }, 50);
};


function closePopup() {
    jQuery("body").find(".g-popup").removeClass("act").delay(1000).remove();
}

jQuery(function ($){
    $(".product-row.images").delegate(".iconsearch", "click", function () {
        let pic = $(this)
            .parents(".bottom-mask")
            .children(".mask-icon")
            .find("a")
            .data("src");
        console.log('pic',pic);
        global_popup("pic", pic);
    });

    $(".product-row.videos").delegate(".iconsearch", "click", function () {
        let pic = $(this)
            .parents(".bottom-mask")
            .children(".mask-icon")
            .find("a")
            .data("src");
        console.log('video',pic);
        global_popup("video", pic);
    });

    $(".technology_row").delegate(".iconsearch", "click", function () {
        let pic = $(this)
            .parents(".bottom-mask")
            .children(".mask-icon")
            .find("a")
            .data("src");
        global_popup("pic", pic);
    });

    jQuery("body").delegate(".iconclose1", "click", closePopup);


})

jQuery(document).on('click', 'a.hgq-download', function(event) {
    event.preventDefault(); // Prevent default link behavior

    const src = jQuery(this).attr('data-src'); // Get the data-src attribute
    if (!src) {
        alert('No source found to download!');
        return;
    }

    // Ensure the source has a valid URL format
    const fullSrc = src.startsWith('http') || src.startsWith('//') ? src : `https://${src}`;

    // Create an anchor element to trigger the download
    const downloadLink = document.createElement('a');
    downloadLink.href = fullSrc;
    downloadLink.download = '';

    // Append the anchor to the document, trigger the download, and remove it
    document.body.appendChild(downloadLink);
    downloadLink.click();

    document.body.removeChild(downloadLink);
});

// header sticky effect

jQuery(document).ready(function ($) {
    // Cache the header and logo
    var $header = $("#cti-header");
    var $logo = $header.find(".menu_logo img");
    var $menu = $header.find(".menu");

    // Set a threshold for the scroll effect
    var scrollThreshold = 50;

    // Attach the scroll event
    $(window).on("scroll", function () {
        var scrollTop = $(this).scrollTop();
        var screenWidth = $(window).width(); // Get the current screen width
        var scrollThreshold = 100; // Set your scroll threshold

        if (screenWidth > 800) { // Apply only to desktop screens
            if (scrollTop > scrollThreshold) {
                console.log('header gone effect');

                // When scrolled past the threshold
                $header.css({
                    top: "-50px", // Adjust the reduced height
                    transition: "top 0.3s ease",
                });
                $logo.css({
                    opacity: 0,
                    transition: "opacity 0.3s ease",
                });
                $menu.css({
                    marginTop: "1rem",
                    marginBottom: "0",
                    lineHeight: "2em",
                    transition: "opacity 0.3s ease",
                });
            } else {
                console.log('header reset effect');

                // When scrolled back to the top
                $header.css({
                    top: "0", // Adjust the original height
                    transition: "top 0.3s ease",
                });
                $logo.css({
                    opacity: 1,
                    transition: "opacity 0.3s ease",
                });
                $menu.css({
                    marginTop: "0",
                    marginBottom: "1rem",
                    lineHeight: "4em",
                    transition: "line-height 0.3s ease",
                });
            }
        }
    });

    $(window).on("resize", function () {
        var screenWidth = $(window).width();
        if (screenWidth <= 800) {
            // Reset styles for smaller screens
            $header.css({
                top: "0", // Adjust the original height
                transition: "top 0.3s ease",
            });
            $logo.css({
                opacity: 1,
                transition: "opacity 0.3s ease",
            });
            $menu.css({
                marginTop: "0",
                marginBottom: "1rem",
                lineHeight: "4em",
                transition: "line-height 0.3s ease",
            });
        }
    });

    //mobile
    $('.menu-close-wrapper').on("click", function () {
        jQuery('#menu-main-menu').removeClass('opened');
        jQuery(this).addClass('d-none');
    })

    $('.mobile-burger-wrapper').on("click touchstart", function () {
        jQuery('#menu-main-menu').addClass('opened');
        jQuery('.menu-close-wrapper').removeClass('d-none');
    })


});
