(function () {
    var screenWidth = $(window).width();

    $('.parallax--background-down').paroller({
        factor: 0.2,            // multiplier for scrolling speed and offset
        factorXs: 0.1,           // multiplier for scrolling speed and offset
        type: 'background',     // background, foreground
        direction: 'vertical', // vertical, horizontal
        transition: 'transform 0.2s ease-out' // CSS transition
    });

    $('.parallax--background-up').paroller({
        factor: -0.2,            // multiplier for scrolling speed and offset
        factorXs: 0.1,           // multiplier for scrolling speed and offset
        type: 'background',     // background, foreground
        direction: 'vertical', // vertical, horizontal
        transition: 'transform 0.2s ease-out' // CSS transition
    });

    $('.parallax--background-left').paroller({
        factor: -0.1,            // multiplier for scrolling speed and offset
        factorXs: 0.1,           // multiplier for scrolling speed and offset
        type: 'background',     // background, foreground
        direction: 'horizontal', // vertical, horizontal
        transition: 'transform 0.2s ease-out' // CSS transition
    });

    $('.parallax--background-right').paroller({
        factor: 0.1,            // multiplier for scrolling speed and offset
        factorXs: 0.1,           // multiplier for scrolling speed and offset
        type: 'background',     // background, foreground
        direction: 'horizontal', // vertical, horizontal
        transition: 'transform 0.2s ease-out' // CSS transition
    });

})();