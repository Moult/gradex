$("#viewDetails").click(function() {
    $("#details").slideToggle('slow', function() {
        $(".container").customScrollbar("resize", true);
    });
});

$(".container").customScrollbar({
    updateOnWindowResize:true,
    swipeSpeed: 3,
    wheelSpeed: 60
});

$("h2.dropdown").click(function() {
    $("ul.dropdown").slideToggle('slow', function() {
        $(".container").customScrollbar("resize", true);
    });
});

$("a.readmore").click(function() {
    $("p.readmore").slideToggle('slow', function() {
        $(".container").customScrollbar("resize", true);
    });
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
    $(".container").customScrollbar("resize", true);
});

$(".comingsoon").click(function() {
    alert('Archive coming soon.');
})

window.onload = function() {
    $(".container").customScrollbar("resize", true);
}
