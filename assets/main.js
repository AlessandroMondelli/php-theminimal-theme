jQuery(function($) {
    //Rendo cliccabile il dropdown bootstrap
    $('.navbar .dropdown').hover(function() {
    $(this).find('.dropdown-menu').first().stop(true, true).delay(150).slideDown();
    }, function() {
    $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();
    });

    $('.navbar .dropdown > a').click(function(){
    location.href = this.href;
    });
});