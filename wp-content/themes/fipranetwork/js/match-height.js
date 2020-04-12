(function(){
    // Generic
    $('.match-heights').matchHeight();

    // Specific elements
    $('.concept-card-group .concept-card').matchHeight({ byRow: false });

    $('.fipriot-card__info').matchHeight();

    $('.news-story-card').matchHeight();

    $('.case-study-card').matchHeight();

    // $('.practice-card--slider').matchHeight();

    $('.practice-card-group--slider').on('setPosition', function () {
        $('.practice-card-group--slider').find('.slick-slide').matchHeight();
    })

})();