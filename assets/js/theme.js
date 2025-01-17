
let menu_icon = $('.hamburger-menu'); //hamburger menu icon
let menu = $(".menu-container"); //mobile menu
let close_icon = $(".mobile-nav-header .close-nav"); //mobile and tablet close menu button

menu.click(function (e) {
    e.stopPropagation();
});

$('.menu-container .canvas-overlay').click(function (e) {
    console.log('.menu-container .canvas-overlay')
    if ($(window).width() < 992) {
        if (menu.css('display') == 'block') {
            menu.toggle('slide' , 300); //closes mobile nav when user clicks outside menu
            $('.menu-container .canvas-overlay').animate({opacity: 0}, 300);
        }
    }
});
menu_icon.click(function (e) {
    menu.toggle('slide' , 300); //opens mobile menu after click on hamburger menu icon
    $('.menu-container .canvas-overlay').animate({opacity: 1}, 300);
    e.stopPropagation();
});

close_icon.click(function (e) {
    menu.toggle('slide' , 300); //closes mobile nav after click on "x" icon
    $('.menu-container .canvas-overlay').animate({opacity: 0}, 300);
});
/*----------------------------------
* Mobile Menu Dropdown JS Codes
*----------------------------------- */
let submenu_item = $('.item-with-submenu a');
submenu_item.click(function (e) {
    if ($(window).width() < 992) {
        $(this).next("ul").slideToggle('fast');
    }
});
/*----------------------------------*
side cart
*----------------------------------- */
let cart = $('#cart-icon');
let side_cart = $('.side-cart');
let close_cart = $('.close-cart');
side_cart.click(function (e) {
    e.stopPropagation();
});
cart.click(function (e) {
    side_cart.toggle('slide', 300 , function () {
        $(this).css('display', 'flex');
    });
    $('.side-cart .canvas-overlay').animate({opacity: 1}, 300);
    e.stopPropagation();
});
close_cart.click(function (e) {
    side_cart.toggle('slide' , 300);
    $('.side-cart .canvas-overlay').animate({opacity: 0}, 300);
    e.stopPropagation();
});
$('.side-cart .canvas-overlay').click(function () {
    if (side_cart.css('display') == 'flex') {
        side_cart.toggle('slide' , 300); //closes side cart when user clicks outside the widget
        $('.side-cart .canvas-overlay').animate({opacity: 0}, 300);
    }
});

/*----------------------------------*
side wishlist
*----------------------------------- */
let wishlist = $('#wishlist-icon');
let side_wishlist = $('.side-wishlist');
let close_wishlist = $('.close-wishlist');
side_wishlist.click(function (e) {
    e.stopPropagation();
});
wishlist.click(function (e) {
    side_wishlist.toggle('slide', {direction: "right"}, 300, function () {
        $(this).css('display', 'flex');
    });
    $('.side-wishlist .canvas-overlay').animate({opacity: 1}, 300);
    e.stopPropagation();
});
close_wishlist.click(function (e) {
    side_wishlist.toggle('slide', {direction: "right"}, 300);
    $('.side-wishlist .canvas-overlay').animate({opacity: 0}, 300);
    e.stopPropagation();
});
$('.canvas-overlay').click(function () {
    if (side_wishlist.css('display') == 'flex') {
        side_wishlist.toggle('slide', {direction: "right"}, 300); //closes side cart when user clicks outside the widget
        $('.side-wishlist .canvas-overlay').animate({opacity: 0}, 300);
    }
});

/*----------------------------------*
bootstrap tooltips
*----------------------------------- */
let tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
let tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
});

/*----------------------------------*
customize owl carousel
*----------------------------------- */
$(document).ready(function () {
    var carousel = $('[data-owl-options]');
    if (carousel.length) {
        carousel.each(function (index, el) {
            $(this).owlCarousel($(this).data('owl-options'));
        });
    }
});


/*----------------------------------*
Shop Page Js Codes
*----------------------------------- */
let filter_btn = $('.shop-filter-btn');
let filter_wrapper = $('.shop-nav-filters');
let sidebar_filter_wrapper = $('.shop-sidebar');
let side_bar_overlay = $('.shop .canvas-overlay');
filter_btn.click(function () {
    filter_wrapper.slideToggle('slow'); // Open and close Filters
});
filter_btn.click(function (e) {
    e.stopPropagation();
});
filter_btn.click(function (e) {
    sidebar_filter_wrapper.slideToggle('slow'); // opens Sidebar in shop page - mobile
    side_bar_overlay.animate({opacity: 1}, 300); // animate the opacity
    side_bar_overlay.css('visibility' , 'visible');
    e.stopPropagation();
});
side_bar_overlay.click(function (e) {
    sidebar_filter_wrapper.slideToggle('slow');
    $(this).animate({opacity: 0}, 300); // animate the opacity
    $(this).css('visibility' , 'hidden');
    e.stopPropagation();
});


/*----------------------------------*
Collapsible Widgets
*----------------------------------- */

let widgetTitle = $('.widget-title');
widgetTitle.click(function () {
    $(this).next('.widget-content').slideToggle('fast');
    $(this).toggleClass('collapsed');
});

/*----------------------------------*
Sticky bottom navigation
*----------------------------------- */

var didScroll;
var lastScrollTop = 0;
var delta = 5;
var bottomNavbarHeight = $('.Sticky-nav-wrapper').outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    var st = $(this).scrollTop();

    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;

    if (st > lastScrollTop && st > bottomNavbarHeight){
        // Scroll Down
        $('.Sticky-nav-wrapper').css('display' , 'block');
        $('.float-btn').addClass('bottom-6')

    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('.Sticky-nav-wrapper').css('display' , 'none');
            var sc = $(window).scrollTop();
            $('.float-btn').removeClass('bottom-6')
        }
    }

    lastScrollTop = st;
}
/*----------------------------------*
Sticky Top navigation
*----------------------------------- */
var navigation = $("nav");
stickyNav = "fixed";
header = $('.header').height();
categoriesMenu = $('.categories-menu');
if($('header').hasClass('ts-fixed')) {
    $(window).scroll(function() {
        if( $(this).scrollTop() > header ) {
            if (!categoriesMenu.hasClass('d-block')) {
                navigation.addClass(stickyNav);
            }
        } else {
            navigation.removeClass(stickyNav);
        }
    });
}

if ($('header').hasClass('ts-el-fixed')) {
    $(window).scroll(function() {
        if( $(this).scrollTop() > $('header').height() ) {
            $('header').addClass('el-fixed');
        } else {
            $('header').removeClass('el-fixed');
        }
    });
}




/*------------------------------------
Thumbnails Carousel
* ------------------------------------*/
var mainProductImage = $(".single-product-carousel");
var thumbImage = $(".owl-thumb");

var thumbnailItemClass = '.owl-item';

var slides = mainProductImage.owlCarousel({
    video: true,
    startPosition: 12,
    items: 1,
    loop: true,
    margin: 10,
    autoplay: false,
    rtl: true,
    nav: true,
    dots: false
}).on('changed.owl.carousel', syncPosition);

function syncPosition(el) {
    $owl_slider = $(this).data('owl.carousel');
    var loop = $owl_slider.options.loop;

    if (loop) {
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - (el.item.count / 2) - .5);
        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }
    } else {
        var current = el.item.index;
    }

    var owl_thumbnail = thumbImage.data('owl.carousel');
    var itemClass = "." + owl_thumbnail.options.itemClass;


    var thumbnailCurrentItem = thumbImage
        .find(itemClass)
        .removeClass("synced")
        .eq(current);

    thumbnailCurrentItem.addClass('synced');

    if (!thumbnailCurrentItem.hasClass('active')) {
        var duration = 300;
        thumbImage.trigger('to.owl.carousel', [current, duration, true]);
    }
}

var thumbs = thumbImage.owlCarousel({
    startPosition: 12,
    items: 4,
    loop: false,
    margin: 10,
    autoplay: false,
    rtl:true,
    nav: true,
    dots: false,
    onInitialized: function (e) {
        var thumbnailCurrentItem = $(e.target).find(thumbnailItemClass).eq(this._current);
        thumbnailCurrentItem.addClass('synced');
    },
})
    .on('click', thumbnailItemClass, function (e) {
        e.preventDefault();
        var duration = 300;
        var itemIndex = $(e.target).parents(thumbnailItemClass).index();
        mainProductImage.trigger('to.owl.carousel', [itemIndex, duration, true]);
    }).on("changed.owl.carousel", function (el) {
        var number = el.item.index;
        $owl_slider = mainProductImage.data('owl.carousel');
        $owl_slider.to(number, 100, true);
    });

/*------------------------------------
Input Number stepUp and step down
* ------------------------------------*/
var plusButton = $('.quantity-plus');
var minusButton = $('.quantity-minus');
var quantityInput = document.querySelector('.quantity');
plusButton.click(function (e) {
    quantityInput.stepUp();
});
minusButton.click(function (e) {
    quantityInput.stepDown();
});


$(document).ready(function() {
    var bigimage = $("#big");
    var thumbs = $("#thumbs");
    //var totalslides = 10;
    var syncedSecondary = true;

    bigimage
        .owlCarousel({
            items: 1,
            slideSpeed: 2000,
            nav: true,
            autoplay: true,
            dots: false,
            loop: true,
            responsiveRefreshRate: 200,
            navText: [
                '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
                '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
            ]
        })
        .on("changed.owl.carousel", syncPosition);

    thumbs
        .on("initialized.owl.carousel", function() {
            thumbs
                .find(".owl-item")
                .eq(0)
                .addClass("current");
        })
        .owlCarousel({
            items: 4,
            dots: true,
            nav: true,
            navText: [
                '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
                '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
            ],
            smartSpeed: 200,
            slideSpeed: 500,
            slideBy: 4,
            responsiveRefreshRate: 100
        })
        .on("changed.owl.carousel", syncPosition2);

    function syncPosition(el) {
        //if loop is set to false, then you have to uncomment the next line
        //var current = el.item.index;

        //to disable loop, comment this block
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }
        //to this
        thumbs
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
        var onscreen = thumbs.find(".owl-item.active").length - 1;
        var start = thumbs
            .find(".owl-item.active")
            .first()
            .index();
        var end = thumbs
            .find(".owl-item.active")
            .last()
            .index();

        if (current > end) {
            thumbs.data("owl.carousel").to(current, 100, true);
        }
        if (current < start) {
            thumbs.data("owl.carousel").to(current - onscreen, 100, true);
        }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
            var number = el.item.index;
            bigimage.data("owl.carousel").to(number, 100, true);
        }
    }

    thumbs.on("click", ".owl-item", function(e) {
        e.preventDefault();
        var number = $(this).index();
        bigimage.data("owl.carousel").to(number, 300, true);
    });
});

$('#ts-2-columns').on('click' , function (e) {
    $('.ts-card').each(function (item , element) {
        $(element).parent().removeClass();
        $(element).parent().addClass('col-6');
    });
    $(this).addClass('active');
    $('#ts-3-columns').removeClass('active');
    $('#ts-4-columns').removeClass('active');
});
$('#ts-3-columns').on('click' , function (e) {
    $('.ts-card').each(function (item , element) {
        $(element).parent().removeClass();
        $(element).parent().addClass('col-6 col-md-4 col-lg-4');
    })
    $(this).addClass('active');
    $('#ts-2-columns').removeClass('active');
    $('#ts-4-columns').removeClass('active');
});
$('#ts-4-columns').on('click' , function (e) {
    $('.ts-card').each(function (item , element) {
        $(element).parent().removeClass();
        $(element).parent().addClass('col-6 col-md-4 col-lg-3');
    });
    $(this).addClass('active');
    $('#ts-3-columns').removeClass('active');
    $('#ts-2-columns').removeClass('active');
});

//ajax search
// jQuery(document).ready(function($){
//     $('#ts-search').submit(function(event){
//         event.preventDefault();
//         var searchQuery = $('#search').val();
//         $.ajax({
//             type: 'POST',
//             url: '/search-results/',
//             data: {
//                 s: searchQuery
//             },
//             success: function(results){
//                 $('.ajax-search-wrapper .result').html(results);
//             }
//         });
//         return false;
//     });
// });


