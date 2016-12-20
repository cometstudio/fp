$(document).ready(function()
{
    hideMainNavOnScroll();

    fixContentWrapperPosition();

    initDatepicker();
});

function hideMainNavOnScroll()
{
    var lastTop = 0;
    var top = 0;
    var mainNavHeight = $('.main-nav').outerHeight();

    $(window).on('scroll', function(){

        top = $(window).scrollTop();

        if((top > mainNavHeight) && (lastTop < top)){
            $('.main-nav').css('top', -1 * mainNavHeight);
        }else{
            $('.main-nav').css('top', 0);
        }

        lastTop = top;
    });
}

function fixContentWrapperPosition()
{
    $('.content-wrapper').css('padding-top', $('.main-nav').outerHeight()).show();
}

function initDatepicker()
{
    $( ".datepicker" ).datepicker({
        dateFormat: "dd.mm.yy",
        beforeShow: function ( input, inst ) {
            //console.log(this);
        }
    });
}