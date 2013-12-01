$("#viewDetails").click(function() {
    if ($("#viewDetails").hasClass("visible")) {
        $("#viewDetails").removeClass("visible");
    } else {
        $("#details").slideToggle('slow');
        $("#viewDetails").addClass("visible");
    }
});


$("body").mCustomScrollbar({
    theme: "light",
    scrollInertia: 100,
    advanced:{
        updateOnContentResize: true
    }
});

$("h2.dropdown").click(function() {
    if ($("ul.dropdown").hasClass("visible")) {
        $("ul.dropdown").removeClass("visible");
    } else {
        $("ul.dropdown").slideToggle();
        $("ul.dropdown").addClass("visible");
    }
});

$("a.readmore").click(function() {
    if ($("p.readmore").hasClass("visible")) {
        $("p.readmore").removeClass("visible");
    } else {
        $("p.readmore").slideToggle();
        $("p.readmore").addClass("visible");
    }
});

$("section#browse ul li").click(function() {
    window.location = $(this).data('url');
})

$('*[data-resize="true"]').each(function() {
    var ratio = $(window).width() / $(this).data('width');
    var height = $(this).data('height') * ratio;
    $(this).css('height', height);
    if (height / $(window).height() > 0.8) {
        $(this).css('background-attachment', 'scroll');
    }
});
