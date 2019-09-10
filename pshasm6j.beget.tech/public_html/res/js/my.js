"use strict";

jQuery('a').click(function(){
    jQuery('html, body').animate({
        scrollTop: jQuery( jQuery.attr(this, 'href') ).offset().top
	}, 800);
    return false;
});	

function show_form(str)
{
	jQuery('.hidden-form').fadeIn();
	jQuery('#change_p').html(str);
}

// jQuery(document).ready(function(){
//     jQuery('.owl-carousel').owlCarousel({
//         loop:true,
//         items:1,
//         autoHeight: true,
//         lazyLoad: true,
//         nav: true,
//         navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
//     })
// });

jQuery('.main-content .owl-carousel').owlCarousel({
    stagePadding: 50,
    loop: true,
    margin: 10,
    nav: true,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    navContainer: '.main-content .custom-nav',
    responsive:{
        0:{
            items: 1
        },
    }
});