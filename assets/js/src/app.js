jQuery(function ($) {
    var serviceContent, serviceTitle;
    $('#press').sidr({
        name: 'sidr',
        side: 'right'
    });
    $('.close-sidr').click(function () {
        return $.sidr('close', 'sidr');
    });
    $('a#press').bind("click touchstart", function () {
        return $(this).toggleClass('open');
    });
    $('ul.sldr').bxSlider({
        speed: 1000,
        pause: 10000,
        auto: false,
        touchEnabled: false,
        pagerCustom: '.feature-pager',
        controls: true,
        nextText: 'Previous',
        prevText: 'Next'
    });
    serviceTitle = $('.service-title-hldr');
    serviceContent = $('.service-content');
    return serviceTitle.hoverIntent(function () {
        return $(this).parent().find(serviceContent).slideToggle();
    });
});