(function () {
    $('.testimonial-group--slider').slick({
        'arrows': false,
        fade: true
    });

    $('.testimonial--slider-prev').on('click', function () {
        $('.testimonial-group--slider').slick('slickPrev');
    });

    $('.testimonial--slider-next').on('click', function () {
        $('.testimonial-group--slider').slick('slickNext');
    });

    $('.case-study-menu--slider').slick({ // some elements set on the element using data-slick
        arrows: false,
        // dots:true,
        slidesToShow: 5,
        slidesToScroll: 1,
        centerMode: true,
        variableWidth: true,
        infinite: true,
        // initialSlide: 0,

        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ],
    });

    $('.case-study-menu--slider-prev').on('click', function () {
        $('.case-study-menu--slider').slick('slickPrev');
    });

    $('.case-study-menu--slider-next').on('click', function () {
        $('.case-study-menu--slider').slick('slickNext');
    });

    $('.practice-card-group--slider').slick({ // some elements set on the element using data-slick
        arrows: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        centerMode: true,
        infinite: true,
        initialSlide: 1,

        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ],
    });

    $('.practice-card-group--slider--prev').on('click', function () {
        $('.practice-card-group--slider').slick('slickPrev');
    });

    $('.practice-card-group--slider--next').on('click', function () {
        $('.practice-card-group--slider').slick('slickNext');
    });

})();