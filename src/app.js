require('bootstrap');

jQuery('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:true,
    items: 4,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:5
        }
    }
});

jQuery('#brandCarousel').owlCarousel({
    margin:10,
    nav: false,
    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
    autoplay:true,
    items: 4,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:5
        }
    }
});