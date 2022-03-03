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

    $(' .navbar-toggler ').click(function() {
        if( $('.theminimal-mobile-menu').hasClass('active') ) {
            $('.theminimal-mobile-menu').removeClass('active');
        } else {
            $('.theminimal-mobile-menu').addClass('active');
        }
    });

    $(window).scroll(function(){
        var hTop = $('#theminimal-header').height();
        if($(this).scrollTop() >= hTop){
            $('#theminimal-header').addClass('scrolled');
            $('.navbar-brand').hide();
            $('.navbar-collapse').addClass('scrolled');
        } else {
            $('#theminimal-header').removeClass('scrolled');
            $('.navbar-brand').show();
            $('.navbar-collapse').removeClass('scrolled');
        }
    });
});