function fixDiv() {
    var $div = $("#header");
    if ($(window).scrollTop() > $div.data("top")) { 
        $('#header').css({'position': 'fixed', 'top': '0', 'width': '100%'}); 
    }
    else {
        $('#header').css({'position': 'static', 'top': 'auto', 'width': '100%'});
    }
}

$("#header").data("top", $("#header").offset().top); // set original position on load
$(window).scroll(fixDiv);