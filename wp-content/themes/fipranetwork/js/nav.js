(function () {

    // Go to homepage when header logo is clicked
    $('.site__header__logo').on('click', function () {
        window.location.href = '/';
    })

    // Toggle primary menu on click / tap
    $('.toggle--primary-nav').on('click', function () {
        $(this).toggleClass('is-active');
        $('.site__header').removeClass('is-fixed'); // make sure the header isn't fixed when opening/closing nav to avoid jumping

        $('.nav--primary').fadeToggle(function () {
            $(this).toggleClass('is-open');

            if ($(this).hasClass('is-open')) // .nav--primary is open so fix the header in place - avoids a visual jump
            {
                $('.site__header').toggleClass('is-fixed'); // fix header when nav is open
            }
        }); // primary nav is in open state

        $('.nav--primary__menu__container').toggleClass('nav--primary__menu__container--is-open'); // show/hide the primary nav
        $('ul.sub-menu').slideUp(); // hide all sub-menus for the next time the nav is used
        $('.site__header__logo').toggleClass('site__header__logo--nav-is-open');
        $('.site__header__search--open').toggleClass('site__header__search--open--nav-is-open');
    });

    // Dynamically add a navigation arrow and title to all primary nav sub-menus
    $('.nav--primary__menu ul.sub-menu').each(function () {
        var subMenu = $(this), // sub-menu itself
            label = subMenu.siblings('a').text(), // top-level menu item name
            href = subMenu.siblings('a').attr('href'); // top-level menu item link

        // Add a back button and sub-menu title, taken from the top-level menu item that was clicked
        // The sub-menu title is linked to the top-level menu item's href, so users can still get to that page
        subMenu.prepend('<button class="button--sub-menu-back-arrow"></button><h3 class="nav--primary__sub-menu-heading"><a href="' + href + '" class="text--dark-blue">' + label + '</a></h3>');
    });

    // Touch device triggering of primary nav sub-menus
    $('ul.nav--primary__menu > .menu-item a').on('click', function (event) {

        var screenWidth = $(window).width();

        if ($('html').hasClass('is-touch') || ($('html').hasClass('no-touch') && screenWidth < 1025)) { // this is a touch device

            var menuItemAnchor = $(this);

            // Use jQuery to show sub-menu, if available
            var subMenu = menuItemAnchor.siblings('ul.sub-menu'); // look for a sub-menu

            if (subMenu.length > 0) { // sub-menu exists
                // show the sub-menu
                subMenu.slideDown();
                event.preventDefault(); // stop the original href from loading
            }

        }
    });

    // Hide primary nav sub-menu on mobile / tablet when back arrow is tapped
    $('.button--sub-menu-back-arrow').on('click', function () {
        $(this).closest('ul.sub-menu').slideUp();
    });

    // Show search form
    $('.site__header__search--open').on('click', function () {
        $(this).fadeToggle(function () {
            $('.nav--primary').toggleClass('search-is-open');
            $('.site__header__links__search-box-container').fadeToggle();
            $('.search-field').focus();
        });
    });

    // Hide search form
    $('.site__header__search--close').on('click', function () {
        $('.site__header__links__search-box-container').fadeToggle(function () {
            $('.nav--primary').toggleClass('search-is-open');
            $('.site__header__search--open').fadeToggle();
        });
    });

    // Scroll to target
    $(".scroll-to-target").click(function (event) {
        event.preventDefault();
        var id = $(this).attr("href");
        $('html,body').animate({scrollTop: $(id).offset().top}, 'slow');
    });

    // Page nav tabs with sub menus
    $('.page-nav-bar__tab-menu__link').on('click', function (event) {
        var currentLink = $(this),
            subMenu = currentLink.data('sub-menu');

        if ($('.network-map').length) { // if the network map exists...

            $('.network-map').addClass('is-interactive'); // make now-zoomed map interactive, so countries can be clicked

            // Zoom map to region area
            var mapObj = $('.network-map').vectorMap('get', 'mapObject'), // the map DIV
                zoomToRegions = currentLink.attr('data-regions').split(' '); // create array of ISO codes from data-regions on a link clicked
            mapObj.setFocus({regions: zoomToRegions, scale: 30, animate: true, x: 0.5, y: 0.5}); // zoom the map in on the regions in zoomToRegions
            mapObj.clearSelectedRegions();
            mapObj.setSelectedRegions(zoomToRegions);

        }

        $('.page-nav-bar--sub').slideUp(function () {
            $('.page-nav-bar__tab-menu__link').closest('.page-nav-bar__tab-menu__item').removeClass('is-active'); // remove is-active class from all links
            currentLink.closest('.page-nav-bar__tab-menu__item').addClass('is-active');
            $('.page-nav-bar--sub').slideDown();
            $('.page-nav-bar--sub__menu').hide();
            $(subMenu).show();
        });

        event.preventDefault();
    });

    // Initialise tooltips
    $('.tooltip').tooltipster({
        delay: 0
    });

    // Prevent broken links from doing anything
    $('.broken-link, a[href="#"], a[href="http://#"], a[href="https://#"]').on('click', function (event) {
        event.preventDefault();
    })

    // Filter list
    $('.filter-list__trigger').on('click', function () {
        if($(this).hasClass('filter-list__trigger--down-arrow') || $(this).hasClass('filter-list__trigger--up-arrow')) { // an arrow is displayed so toggle between up and down arrow
            $(this).toggleClass('filter-list__trigger--up-arrow filter-list__trigger--down-arrow');
        }
        $('.filter-list__reveal').slideToggle();
    })

    // Hide the scroll-down-indicator component when the user scrolls, or if user is down the page on page load
    if ($(window).scrollTop() != 0) {
        $('.scroll-down-indicator').hide();
    }
    ;

    $(window).scroll(function () {
        $('.scroll-down-indicator').hide();
    });


})();