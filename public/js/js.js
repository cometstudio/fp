$(document).ready(function()
{
    hideMainNavOnScroll();

    fixContentWrapperPosition();
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

function intFullPage()
{
    $('#fullpage').fullpage({
        autoScrolling: false,
        fitToSection: false,
        fitToSectionDelay: 500,
        scrollBar: true,
        //sectionsColor: ['#4BBFC3', '#f2f2f2', '#7BAABE', 'whitesmoke', '#4BBFC3'],
        //Navigation
        lockAnchors: false,
        anchors:['p1', 'p2', 'p3', 'p4'],
        navigation: false,
        navigationPosition: 'right',
        navigationTooltips: ['firstSlide', 'secondSlide'],
        showActiveTooltip: false
    });
}