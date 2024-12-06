jQuery(document).ready(function ($) {
    //SINGLE CAR MODEL POST

    //color change functionality
    $('.color-box').on('click', function () {
        // Toggle rotation of the icon
        const index = $(this).attr('data-index');
        $('.color-box').removeClass('active-color');
        $(this).addClass('active-color');
        $('.color-car-image').removeClass('active');
        $('.color-car-image.car-'+index).addClass('active');
    });
})

jQuery(document).ready(function ($) {
    //SINGLE CAR MODEL POST
    $('#car-params').on('click', function () {
        // Toggle rotation of the icon
        const icon = $(this).find('i');
        const pdfWrapper = $('.pdf-embed-wrapper');

        if (pdfWrapper.is(':visible')) {
            // Fade out and rotate back
            pdfWrapper.fadeOut(500); // Adjust fade-out duration if needed
            icon.css({ transform: 'rotate(0deg)', transition: 'transform 0.5s ease' });
        } else {
            // Fade in and rotate icon
            pdfWrapper.fadeIn(500); // Adjust fade-in duration if needed
            icon.css({ transform: 'rotate(180deg)', transition: 'transform 0.5s ease' });
        }
    });
})
// jQuery(document).ready(function ($) {
//     // SINGLE CAR MODEL POST
//
//     // Color change functionality
//     $('.color-box').on('click', function () {
//         // Toggle rotation of the icon
//         const index = $(this).attr('data-index');
//         $('.color-box').removeClass('active-color');
//         $(this).addClass('active-color');
//
//         // Fade out the currently active car image
//         $('.color-car-image.active').fadeOut(100, function () {
//             // Remove 'active' class after fading out
//             $(this).removeClass('active');
//
//             // Fade in the selected car image and add 'active' class
//             $('.color-car-image.car-' + index).fadeIn(100).addClass('active');
//         });
//     });
// });