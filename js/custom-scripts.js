function toggleTabs(e) {
    var typeDiv = document.querySelector('.type-div');
    typeDiv.style.display = (typeDiv.style.display === 'none' || typeDiv.style.display === '') ? 'block' : 'none';
}

function selectOption(option) {
    var button = document.querySelector('.select-1-col button');
    var typeDiv = document.querySelector('.type-div');

    // Update button text with the selected option
    button.textContent = option;
    jQuery(button).prev().val(option);

    // Close type-div
    typeDiv.style.display = 'none';
}

document.body.addEventListener('click', function (event) {
    var select1Col = document.querySelector('.select-1-col');
    var typeDiv = document.querySelector('.type-div');

    if (!select1Col.contains(event.target) && !typeDiv.contains(event.target)) {
        // Clicked outside select-1-col and type-div
        typeDiv.style.display = 'none';
    }
});


function toggleTabs2(e) {
    var typeDiv = document.querySelector('.type-div-2');
    typeDiv.style.display = (typeDiv.style.display === 'none' || typeDiv.style.display === '') ? 'block' : 'none';
}

function selectOption2(option, imagePath) {
    var button = document.querySelector('.select-2-col button');
    var typeDiv = document.querySelector('.type-div-2');

    // Update button HTML with the selected option and image
    button.innerHTML = option + '<img src="' + imagePath + '">';
    jQuery(button).prev().val(option);

    // Close type-div
    typeDiv.style.display = 'none';
}

document.body.addEventListener('click', function (event) {
    var select2Col = document.querySelector('.select-2-col');
    var typeDiv = document.querySelector('.type-div-2');

    if (!select2Col.contains(event.target) && !typeDiv.contains(event.target)) {
        // Clicked outside select-2-col and type-div
        typeDiv.style.display = 'none';
    }
});


function toggleTabs3(e) {
    var typeDiv3 = document.querySelector('.type-div-3');
    typeDiv3.style.display = (typeDiv3.style.display === 'none' || typeDiv3.style.display === '') ? 'block' : 'none';
}

function selectOption3(option, imagePath) {
    var button3 = document.querySelector('.select-3-col button');
    var typeDiv3 = document.querySelector('.type-div-3');

    // Update button text with the selected option
    button3.innerHTML = option + '<img src="' + imagePath + '">';
    console.log({option})
    jQuery(button3).prev().val(option);
    // Close type-div
    typeDiv3.style.display = 'none';
    // jQuery('.type-div-3').css('display', 'none');
}

document.body.addEventListener('click', function (event) {
    var select3Col = document.querySelector('.select-3-col');
    var typeDiv3 = document.querySelector('.type-div-3');

    if (!select3Col.contains(event.target) && !typeDiv3.contains(event.target)) {
        // Clicked outside select-3-col and type-div
        typeDiv3.style.display = 'none';
    }
});


function submitForm() {
    var typeName = document.querySelector('.select-1-col button').textContent;
    var finishName = document.querySelector('.select-2-col button').textContent;
    var finishNameIMG = document.querySelector('.select-2-col button img').getAttribute("src");
    var typeName3 = document.querySelector('.select-3-col button').innerHTML;
    var typeNameIMG = document.querySelector('.select-3-col button img').getAttribute("src");

    var name = document.querySelector('input[placeholder="Name*"]').value;
    var email = document.querySelector('input[placeholder="Email*"]').value;
    var phone = document.querySelector('input[placeholder="Phone*"]').value;
    var zipCode = document.querySelector('input[placeholder="Zip code*"]').value;
	var dimensions = document.querySelector('input[placeholder="Dimensions/ W x H*"]').value;
    var description = document.querySelector('textarea').value;

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var imagePath = custom_ajax_object.directory_uri;
    var selecticon = imagePath + '/images/select-icon.svg';
    if (name === "" || email === "" || phone === "" || zipCode === "" || dimensions === "" || typeName.trim().toLowerCase() === 'type*' || finishName.trim().toLowerCase() === 'finish*' || typeName3.trim().toLowerCase() === 'Pull handle style*<img src="' + selecticon + '" >') {
        document.getElementById('error-message').style.display = 'block';

    } else {
        document.getElementById('error-message').style.display = 'none';

        jQuery(document).ready(function ($) {

            // Corrected method to get value from input fields

            console.log("Form submitted successfully");
            $.ajax({
                url: custom_ajax_object.ajax_url,
                type: 'POST',
                data: {
                    action: 'handle_custom_form',
                    name: name,
                    email: email,
                    phone: phone,
                    zipCode: zipCode,
                    dimensions: dimensions,
                    description: description,
                    type: typeName,
                    finishName: finishName,
                    finishNameImage: finishNameIMG,
                    handleStyle: typeNameIMG
                },

                success: function (response) {
                    $('#formResponse').html(response);
                }
            });
        });
    }
}



(function ($) {
    $(document).ready(function () {
        $('.no-submit').click(function (e) {
            e.preventDefault();
            console.log('oko')
          //  submitForm() // Adjust the argument as needed
        });
        var imagePath = custom_ajax_object.directory_uri;

// Concatenate to create the full path for the image
        var leftArrowSrc = imagePath + '/images/left.svg';
        var rightArrowSrc = imagePath + '/images/right.svg';

// Use the concatenated path in your slider configuration

        $('.customers-slider').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            prevArrow: '<button class="slick-prev"><img src="' + leftArrowSrc + '" alt="Previous"/></button>',
            nextArrow: '<button class="slick-next"><img src="' + rightArrowSrc + '" alt="Next"/></button>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 585,
                    settings: {
                        slidesToShow: 1,
                        arrows: false
                    }
                },
            ]
        });

        $('.customers-slider-showers-testimonials').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<button class="slick-prev"><img src="' + leftArrowSrc + '" alt="Previous"/></button>',
            nextArrow: '<button class="slick-next"><img src="' + rightArrowSrc + '" alt="Next"/></button>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 585,
                    settings: {
                        slidesToShow: 1,
                        arrows: false
                    }
                },
            ]
        });
        // $('.customers-slider-home-testimonials').slick({
        //     slidesToShow: 2,
        //     slidesToScroll: 1,
        //     prevArrow: '<button class="slick-prev"><img src="' + leftArrowSrc + '" alt="Previous"/></button>',
        //     nextArrow: '<button class="slick-next"><img src="' + rightArrowSrc + '" alt="Next"/></button>',
        //     responsive: [
        //         {
        //             breakpoint: 992,
        //             settings: {
        //                 slidesToShow: 1
        //             }
        //         },
        //         {
        //             breakpoint: 585,
        //             settings: {
        //                 slidesToShow: 1,
        //                 arrows: false
        //             }
        //         },
        //     ]
        // });

        $('.customers-slider-testimonials-mirrors').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            prevArrow: '<button class="slick-prev"><img src="' + leftArrowSrc + '" alt="Previous"/></button>',
            nextArrow: '<button class="slick-next"><img src="' + rightArrowSrc + '" alt="Next"/></button>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 585,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                        dots: true
                    }
                },
            ]
        });

        $('.customers-slider-testimonials-2').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            prevArrow: '<button class="slick-prev"><img src="' + leftArrowSrc + '" alt="Previous"/></button>',
            nextArrow: '<button class="slick-next"><img src="' + rightArrowSrc + '" alt="Next"/></button>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        dots: true,
                        slidesToShow: 1,
                        arrows: false
                    }
                },
            ]
        });
        $('.customers-slider-hardware-and-finishes-testimonials').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<button class="slick-prev"><img src="' + leftArrowSrc + '" alt="Previous"/></button>',
            nextArrow: '<button class="slick-next"><img src="' + rightArrowSrc + '" alt="Next"/></button>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 585,
                    settings: {
                        slidesToShow: 1,
                        arrows: false
                    }
                },
            ]
        });

        $('.customers-slider-showers').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            prevArrow: '<button class="slick-prev"><img src="' + leftArrowSrc + '" alt="Previous"/></button>',
            nextArrow: '<button class="slick-next"><img src="' + rightArrowSrc + '" alt="Next"/></button>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 585,
                    settings: {
                        slidesToShow: 3,
                        dots: true,
                        arrows: false
                    }
                },
            ]
        });

        $('.customers-slider-glasses').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            prevArrow: '<button class="slick-prev"><img src="' + leftArrowSrc + '" alt="Previous"/></button>',
            nextArrow: '<button class="slick-next"><img src="' + rightArrowSrc + '" alt="Next"/></button>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 585,
                    settings: {
                        dots: true,
                        slidesToShow: 3,
                        arrows: false
                    }
                },
            ]
        });

        $('.custom-glass-mobile-slider').slick({
            dots: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            buttons: false,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 585,
                    settings: {
                        slidesToShow: 1,
                        arrows: false
                    }
                },
            ]
        });

        $('.why-choose-mobile-slider').slick({
            dots: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            buttons: false,
            margin: 15
        });

        $('.info-items-row-slider.mobile-small').slick({
            dots: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            buttons: false,
            margin: 15
        });

        $('.customers-slider-showers-2').slick({
            dots: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            buttons: false,
            margin: 2
        });

        $('.what-we-offer-slider').slick({
            dots: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            buttons: false,
            margin: 2
        });

        $('.shape-space-items-slider.mobile-small').slick({
            dots: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            buttons: false,
            margin: 2
        });

        $('.post-slider.mobile-small').slick({
            dots: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            buttons: false,
            margin: 2
        });


        jQuery('.sidebar-gallery a').on('click',function (e) {
            e.preventDefault();
            const toShow = jQuery(this).attr('data-cat');
            jQuery('.gallery-content').removeClass('active');
            jQuery('.gallery-content.gallery-'+toShow).addClass('active');
            jQuery('.sidebar-gallery li').removeClass('active');
            const img = jQuery('.sidebar-gallery li .arrow-side');
            jQuery(this).parent().addClass('active').prepend(img);
            jQuery('.sidebar-gallery li:not(.active) .arrow-side').remove();
        })

        jQuery('.sidebar-faq a').on('click',function (e) {
            e.preventDefault();
            const toShow = jQuery(this).attr('data-cat');
            jQuery('.faq-content').removeClass('active');
            jQuery('.faq-content.faq-'+toShow).addClass('active');
            jQuery('.sidebar-faq  li').removeClass('active');
            const img = jQuery('.sidebar-faq li .arrow-side');
            jQuery(this).parent().addClass('active').prepend(img);
            jQuery('.sidebar-faq li:not(.active) .arrow-side').remove();
        })

        jQuery('.btn-faq').on('click', function (e) {
            jQuery(this).parents('.faq-item').toggleClass('active')
        })

        jQuery('.view-all-gallery').on('click', function (e) {
            e.preventDefault();
            jQuery(this).parents('.gallery-content').find(('.view_more_default')).removeClass('view_more_default');
            jQuery(this).addClass('d-none');
        })

        //View more
        jQuery('.view-more.cat').on('click', function (e) {
            e.preventDefault();
            const total = jQuery(this).attr('data-count');
            const activePostCount = jQuery('.posts-by-category-wrapper .cat-post.active').length;
            for(let i = activePostCount + 1; i < Number(activePostCount + 4);i++) {
                jQuery('.posts-by-category-wrapper .cat-post.item-'+i).addClass('active').removeClass('d-none');
                if(i >= total) {
                    jQuery(this).addClass('d-none');
                }
            }
                $('html, body').animate({
                    scrollTop: $('.new-added').offset().top - 600
                }, 200);
        })
    });
})(jQuery);


function smoothScroll(targetElement) {
    // Scroll options with behavior set to 'smooth'
    const scrollOptions = {
        behavior: 'smooth'
    };

    // Scroll the target element into view
    targetElement.scrollIntoView(scrollOptions);
}
