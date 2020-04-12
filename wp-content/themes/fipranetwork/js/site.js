(function () {
    // General and site-wide JS

    // Check if is touch device
    var checkIsTouch = function () {

        //Check Device
        var isTouch = ('ontouchstart' in document.documentElement);

        //Check Device //All Touch Devices
        if (isTouch) {
            $('html').addClass('is-touch');
        } else {
            $('html').addClass('no-touch');
        }
        ;
    };

    //Execute Check
    checkIsTouch();

    $('.older-updates__trigger').on('click', function () {
        $('.news-story-card-group--older-updates').show();
        $(this).hide();
    })

})();