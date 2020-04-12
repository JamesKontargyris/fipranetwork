(function () {
    // init controller
    var controller = new ScrollMagic.Controller();

    // Make element visible on scroll
    $('.visible-on-scroll').each(function () {

        var currentElement = this,
            scene = new ScrollMagic.Scene({
                triggerElement: currentElement,
                triggerHook: 0.9,
                offset: 0, // move trigger to center of element
                reverse: true // do the reverse on scroll up
            })
                .setClassToggle(currentElement, "is-visible") // add class toggle
                // .addIndicators() // add indicators (requires plugin)
                .addTo(controller);
    });

    // Make feature quote stretch in on scroll
    // $('.feature-quote').each(function () {
    //
    //     var currentElement = this,
    //         scene = new ScrollMagic.Scene({
    //             triggerElement: currentElement,
    //             triggerHook: 0.9,
    //             offset: 100,
    //             reverse: false // stay visible once unfurled
    //         })
    //             .setClassToggle(currentElement, "is-visible") // add class toggle
    //             // .addIndicators() // add indicators (requires plugin)
    //             .addTo(controller);
    // });

    // Float-down element on scroll and stay visible
    $('.float-down-on-scroll').each(function () {

        var currentElement = this,
            scene = new ScrollMagic.Scene({
                triggerElement: currentElement,
                triggerHook: 0.9,
                offset: 50, // move trigger to center of element
                reverse: false // stay visible
            })
                .setClassToggle(currentElement, "is-visible") // add class toggle
                // .addIndicators() // add indicators (requires plugin)
                .addTo(controller);
    });

    // parallax
    $('.large-feature').each(function () {

        var trigger = this,
            image = $(this).find('.large-feature__image'),
            tween = new TimelineMax()
            .add([
                TweenMax.fromTo(image, 1, {scale: 1, top:'70%' }, {
                    top: '20%',
                    ease: Linear.easeNone
                }),
            ]);

        // build scene
        var scene = new ScrollMagic.Scene({triggerElement: trigger, duration: $(window).width()})
            .setTween(tween)
            // .addIndicators() // add indicators (requires plugin)
            .addTo(controller);

    });

    $('.parallax--foreground-up').each(function () {

        var tween = new TimelineMax()
            .add([
                TweenMax.fromTo($(this), 1, {scale: 1}, {
                    top: -200,
                    ease: Linear.easeOut
                }),
            ]);

        // build scene
        var scene = new ScrollMagic.Scene({triggerElement: $(this), duration: $(window).width()})
            .setTween(tween)
            // .addIndicators() // add indicators (requires plugin)
            .addTo(controller);

    });

    $('.parallax--foreground-down').each(function () {

        var tween = new TimelineMax()
            .add([
                TweenMax.fromTo($(this), 1, {scale: 1}, {
                    bottom: -200,
                    ease: Linear.easeInOut
                }),
            ]);

        // build scene
        var scene = new ScrollMagic.Scene({triggerElement: $(this), duration: $(window).width()})
            .setTween(tween)
            // .addIndicators() // add indicators (requires plugin)
            .addTo(controller);

    });

    $('.parallax--foreground-left').each(function () {

        var tween = new TimelineMax()
            .add([
                TweenMax.fromTo($(this), 1, {scale: 1}, {
                    left: -350,
                    ease: Linear.easeInOut
                }),
            ]);

        // build scene
        var scene = new ScrollMagic.Scene({triggerElement: $(this), duration: $(window).width()})
            .setTween(tween)
            // .addIndicators() // add indicators (requires plugin)
            .addTo(controller);

    });

    $('.parallax--foreground-right').each(function () {

        var tween = new TimelineMax()
            .add([
                TweenMax.fromTo($(this), 1, {scale: 1}, {
                    right: -250,
                    ease: Linear.easeInOut
                }),
            ]);

        // build scene
        var scene = new ScrollMagic.Scene({triggerElement: $(this), duration: $(window).width()})
            .setTween(tween)
            // .addIndicators() // add indicators (requires plugin)
            .addTo(controller);

    });

})();