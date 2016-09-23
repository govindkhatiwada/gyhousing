$(document).ready(function () {

    $("#owl-demo").owlCarousel({

        autoPlay: true, //Set AutoPlay to 3 seconds
        items: 3,
        itemsDesktop: [1199, 2],
        itemsDesktopSmall: [979, 1]

    });


    $("#owl-testi").owlCarousel({

        navigation: false, // Show next and prev buttons
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        autoPlay: true


        // "singleItem:true" is a shortcut for:
        // items : 1, 
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false

    });
    $(".rslides").responsiveSlides();
});
$(function () {
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [100, 300],
        slide: function (event, ui) {
            $("#amount").html("$" + ui.values[0] + " - $" + ui.values[1]);
            $("#amount1").val(ui.values[0]);
            $("#amount2").val(ui.values[1]);
        }
    });
    $("#amount").html("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));
});
$(function () {
    SyntaxHighlighter.all();
});
$(window).load(function () {
    $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 210,
        itemMargin: 5,
        asNavFor: '#slider'
    });

    $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function (slider) {
            $('body').removeClass('loading');
        }
    });
});


