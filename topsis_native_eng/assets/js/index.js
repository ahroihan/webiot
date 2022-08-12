$('input[type="submit"]').mousedown(function(){
  $(this).css('background', '#121731');
});
$('input[type="submit"]').mouseup(function(){
  $(this).css('background', '#121731');
});

$('#loginform').click(function(){
  $('.login').fadeToggle('slow');
  $(this).toggleClass('green');
});



$(document).mouseup(function (e)
{
    var container = $(".login");

    if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
        container.hide();
        $('#loginform').removeClass('green');
    }
});

$(document).ready(function() {
    var height = Math.max($(".right-half").height(), $(".left-half").height());
    $(".left-half").height(height);
    $(".right-half").height(height);
});

(function(jQuery){"use strict";jQuery(document).ready(function(){

jQuery('.owl-carousel').each(function(){let jQuerycarousel=jQuery(this);jQuerycarousel.owlCarousel({items:jQuerycarousel.data("items"),loop:jQuerycarousel.data("loop"),margin:jQuerycarousel.data("margin"),nav:jQuerycarousel.data("nav"),dots:jQuerycarousel.data("dots"),autoplay:jQuerycarousel.data("autoplay"),autoplayTimeout:jQuerycarousel.data("autoplay-timeout"),navText:["<i class='fa fa-angle-left fa-2x'></i>","<i class='fa fa-angle-right fa-2x'></i>"],responsiveClass:true,responsive:{0:{items:jQuerycarousel.data("items-mobile-sm"),nav:false,dots:true},480:{items:jQuerycarousel.data("items-mobile"),nav:false,dots:true},786:{items:jQuerycarousel.data("items-tab")},1023:{items:jQuerycarousel.data("items-laptop")},1199:{items:jQuerycarousel.data("items")}}});});
})})(jQuery);