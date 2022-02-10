jQuery(function($) {
    //Rendo cliccabile il dropdown bootstrap
    $('.nav-item.dropdown').hover(function() {
        $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideDown(300);
        }, function() {
        $(this).find('.dropdown-menu').first().stop(true, true).delay(50).slideUp(250);
        });

        $('.navbar .dropdown > a').click(function(){
        location.href = this.href;
    });

    $('.dropdown-menu').mouseenter(function() {
        $(this).siblings('.nav-link').addClass('dropdown-hover');
    });

    $('.dropdown-menu').mouseleave(function() {
        $(this).siblings('.nav-link').removeClass('dropdown-hover');
    });
});