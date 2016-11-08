$(document).ready(function() {
    $('#fullpage').fullpage({
        autoScrolling: false,
        fitToSection: false,
        fitToSectionDelay: 500,
        scrollBar: true,
        sectionsColor: ['#f2f2f2', '#4BBFC3', '#7BAABE', 'whitesmoke', '#4BBFC3'],
        //Navigation
        lockAnchors: false,
        anchors:['p1', 'p2', 'p3', 'p4'],
        navigation: true,
        navigationPosition: 'right',
        navigationTooltips: ['firstSlide', 'secondSlide'],
        showActiveTooltip: false
    });
});