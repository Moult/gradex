$("section#showcase img").hide();
function switchShowcase() {
    $("section#showcase img").first().appendTo("section#showcase").fadeOut(3000);
    $("section#showcase img").first().fadeIn(3000);
    setTimeout(switchShowcase, 10000);
}
switchShowcase();
