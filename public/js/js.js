$(document).ready(function() {

    fixContentWrapperPosition();

});

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