/*global $, window, WOW*/

$(function () {
    
    "use strict";
    
    var win = $(window),
        htmlBody = $("html, body"),
        scrollToTop = $(".scroll-top"),
        navBar = $(".navbar"),
        progressCheck = false,
        factsCheck = false;
        
    
    /*========== Loading  ==========*/
    $('.preloader').delay(200).fadeOut(700, function () {
        $(this).remove();
    });
    
    /*========== Navbar Animation On Scroll  ==========*/
    function activeNavbar() {
        
        if (win.scrollTop() > 100) {
            navBar.addClass("active-nav fadeInDown animated");
        } else {
            navBar.removeClass("active-nav fadeInDown animated");
        }
        
    }
    
    activeNavbar();
    
    win.on("scroll", function () {
        activeNavbar();
    });
    
    /*========== Mobile Menu  ==========*/
    $(".navbar .menu-toggle").on("click", function () {
        navBar.toggleClass("menu-active");
    });
    
    /*========== Vertical Menu  ==========*/
    $(".vertical-nav .toggle-menu").on("click", function () {
        $(this).parent().toggleClass("open");
    });
    
    /*========== Typed  ==========*/
    $(".home p span").typed({
        strings: [" والاختراق الأخلاقي والهكر .", "وتعلم الامن السيبراني."],
        cursorChar: "",
        typeSpeed: 90,
        loop: true,
        backSpeed: 30
    });
    
    /*========== Start Scroll For Link To Go Section  ==========*/
    $(".home .arrow a, .skills .skills-left .main-btn").on("click", function (e) {
        e.preventDefault();
        var selector = $(this);
        htmlBody.animate({
            scrollTop: $(selector.attr("href")).offset().top
        }, 800);
    });
    
    /*========== Smooth Scroll  ==========*/
  
    
    /*========== Add Class Active to Menu Links on Scrolling  ==========*/
    win.on("scroll", function () {
        $("section").each(function () {
            if (win.scrollTop() >= $(this).offset().top - 1) {
                $(".navbar .navbar-nav > li > a[data-value='#" + $(this).attr("id") + "']").addClass("active").parent().siblings().find("a").removeClass("active");
            }
        });
    });
    
    /*========== Add Class Active to Vertical Menu Links on Scrolling  ==========*/
    $("section").each(function () {
        if (win.scrollTop() >= $(this).offset().top - 1) {
            $(".vertical-nav .mini-menu li a[data-value='#" + $(this).attr("id") + "']").addClass("active").parent().siblings().find("a").removeClass("active");
        }
    });
    win.on("scroll", function () {
        $("section").each(function () {
            if (win.scrollTop() >= $(this).offset().top - 1) {
                $(".vertical-nav .mini-menu li a[data-value='#" + $(this).attr("id") + "']").addClass("active").parent().siblings().find("a").removeClass("active");
            }
        });
    });
    
    /*========== Skills List  ==========*/
    $(".skills .skills-list h3 a").on("click", function (e) {
        e.preventDefault();
        $(".skills .skills-list h3 a").parent().removeClass("active");
        $(this).parent().addClass("active");
        $(".skills-content > div").hide();
        $($(this).attr('href')).show();
    });
    
    /*========== Skills Progress  ==========*/
    function skillsPogress() {
        $(".progress-container").each(function () {
            var progressBar = $(this).find(".progress-bar");
            progressBar.css("width", progressBar.attr("aria-valuenow") + "%");
        });
    }
    
    if (!progressCheck && $(this).scrollTop() >= $(".skills").offset().top - 300) {
        skillsPogress();
        progressCheck = true;
    }
    
    win.on("scroll", function () {
        
        if (!progressCheck && $(this).scrollTop() >= $(".skills").offset().top - 300) {
            skillsPogress();
            progressCheck = true;
        }
        
    });
    
    /*========== Start Portfolio Trigger Filterizr Js  ==========*/
    $("#control li").on('click', function () {
        $(this).addClass('active').siblings("li").removeClass('active');
    });
    // The Filterizr
    $('#filtr-container').filterizr({
        animationDuration: 0.4
    });
    
    /*========== Start Magnigic Popup Js ==========*/
    if ($('.portfolio-content .item')[0]) {

        $('.portfolio-content .item').magnificPopup({
            delegate: '.icon-img',
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    }
    
    /*========== Facts Counter  ==========*/
    if (!factsCheck && $(this).scrollTop() >= $(".facts").offset().top - 400) {
        $(".facts .fact-number").countTo();
        factsCheck = true;
    }
    
    win.on("scroll", function () {
        if (!factsCheck && $(this).scrollTop() >= $(".facts").offset().top - 400) {
            $(".facts .fact-number").countTo();
            factsCheck = true;
        }
    });
    
    /*========== Owl Carousel Js Testimonial  ==========*/
    $(".testimonials .owl-carousel").owlCarousel({
        items: 1,
        autoplay: true,
        smartSpeed: 500,
        margin: 10,
        loop: true,
        autoplayHoverPause: true,
        responsiveClass: true
    });
    
    /*========== Scroll To Top  ==========*/
    function scrollUp() {
        if (win.scrollTop() >= 1200) {
            scrollToTop.addClass("active");
        } else {
            scrollToTop.removeClass("active");
        }
    }
    
    scrollUp();
    
    win.on("scroll", function () {
        scrollUp();
    });
    
    scrollToTop.on("click", function (e) {
        e.preventDefault();
        htmlBody.animate({
            scrollTop: 0
        }, 800);
    });
    
    /*========== Fire wow js Plugin  ==========*/
    new WOW().init();
    
});