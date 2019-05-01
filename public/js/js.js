$(document).ready(function()
{
    $(window).scrollTop() >= 100 ?
        $('.top-bar').addClass('scrolled') :
        $('.top-bar').removeClass('scrolled');

    $(window).scroll(function()
    {
        $(this).scrollTop() >= 100 ?
            $('.top-bar').addClass('scrolled') :
            $('.top-bar').removeClass('scrolled');
    });

    var bLazy = new Blazy();
});

