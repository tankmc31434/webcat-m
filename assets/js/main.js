$(window).scroll(function () {
    var scroll = $(window).scrollTop();

    if (scroll >= 80) {
        $('.layout-header').addClass('tiny');
    }
    else {
        $('.layout-header').removeClass('tiny');
    }
});

$(document).ready(function () {

    AOS.init();

    $('.dropdown').on('show.bs.dropdown', function (e) {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown(400);
    });
    $('.dropdown').on('hide.bs.dropdown', function (e) {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(300);
    });

    $('.lazy').Lazy({
        effect: "fadeIn",
        effectTime: 500,
        threshold: 0,
        afterLoad: function (element) {
            $(element).addClass('loaded')
        },
    });

    $('.select-control').select2({
        minimumResultsForSearch: -1,
        placeholder: function () {
            $(this).data('placeholder');
        }
        // theme: "",
    });

    // _____HERO BANNER SLIDER_____
    var heroBannerSwiper = new Swiper('.hero-banner .swiper', {
        loop: true,
        lazy: true,
        // If we need pagination
        pagination: {
            el: '.hero-banner .swiper-pagination',
            clickable: true
        },

        // Navigation arrows
        // navigation: {
        //     nextEl: '.swiper-button-next',
        //     prevEl: '.swiper-button-prev',
        // },

        // And if we need scrollbar
        // scrollbar: {
        //     el: '.swiper-scrollbar',
        // },
    });

    var wgHighlightNewsSwiper = new Swiper('.wg-highlight-news .swiper', {
        loop: true,
        lazy: true,
        slidesPerView: "auto",
        spaceBetween: 0,
        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1200: {
                slidesPerView: "auto",
                // spaceBetween: 0,
            },
        }
    });

    var wgBannerSwiper = new Swiper('.wg-banner .swiper', {
        loop: false,
        lazy: true,
        slidesPerView: 1,
        spaceBetween: 10,
        // If we need pagination
        pagination: {
            el: '.wg-banner .swiper-pagination',
            clickable: true
        },
    });

    var wgActivityHighlight = new Swiper('.activity-highlight .swiper', {
        loop: false,
        lazy: true,
        slidesPerView: 1,
        spaceBetween: 0,
        // If we need pagination
        pagination: {
            el: '.activity-highlight .swiper-pagination',
            clickable: true
        },
    });

    var wgActivityList = new Swiper('.activity-list .swiper', {
        loop: false,
        lazy: true,
        slidesPerView: 4,
        spaceBetween: 20,
        // If we need pagination
        pagination: {
            el: '.activity-list .swiper-pagination',
            clickable: true
        },
        breakpoints: {
            0: {
                slidesPerView: 2,
                spaceBetween: 15,
            },
            576: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
            992: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
        }
    });

    var downloadDocSwiper = new Swiper('.download-doc-list .swiper', {
        direction: "vertical",
        slidesPerView: "auto",
        freeMode: true,
        observer: true,
        scrollbar: {
            el: ".swiper-scrollbar",
        },
        mousewheel: true,
    });

    // doc-group
    $('.doc-group .sub-group-doc').click(function () {
        downloadDocSwiper.destroy();

        Swiper('.download-doc-list .swiper', {
            direction: "vertical",
            slidesPerView: "auto",
            freeMode: true,
            observer: true,
            scrollbar: {
                el: ".swiper-scrollbar",
            },
            mousewheel: true,
        });
    });

    var weblinkInternal = new Swiper('.weblink-internal .swiper', {
        loop: false,
        lazy: true,
        slidesPerView: 5,
        spaceBetween: 20,
        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            576: {
                slidesPerView: 4,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
            992: {
                slidesPerView: 5,
                spaceBetween: 20,
            },
            1200: {
                pagination: false,
            }
        }
    });

    var weblinkExternal = new Swiper('.weblink-external .swiper', {
        loop: false,
        lazy: true,
        slidesPerView: 5,
        spaceBetween: 20,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        breakpoints: {
            0: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
            576: {
                slidesPerView: 4,
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
            992: {
                slidesPerView: 5,
                spaceBetween: 20,
            },
            1200: {
                pagination: false,
            }
        }
    });

    var defaultNavSlider = new Swiper('.default-nav .swiper', {
        loop: false,
        lazy: false,
        slidesPerView: 4,
        navigation: {
            nextEl: '.default-nav .swiper-button-next',
            prevEl: '.default-nav .swiper-button-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            992: {
                slidesPerView: 4,
            },
        }
    });
    var defaultTabSlider = new Swiper('.default-tab .swiper', {
        loop: false,
        lazy: false,
        slidesPerView: 4,
        spaceBetween: 20,
        navigation: {
            nextEl: '.default-tab .swiper-button-next',
            prevEl: '.default-tab .swiper-button-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            375: {
                slidesPerView: 2,
                spaceBetween: 8,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            992: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
        }
    });

    // Active Swiper Slide
    var activeIndex = $('.swiper').attr('data-active-index');

    if (typeof activeIndex === 'string') {
        let index = parseInt(activeIndex);
        if (index >= 0) {
            // console.log(index - 1)
            defaultNavSlider.slideTo(index - 1);
            $('.swiper .swiper-wrapper .swiper-slide' + ':nth-child(' + index + ')').addClass('active');
        }
    }

    $('.acept-btn').click(function () {
        $('.cookie-tab').addClass('d-none');
    });
    $('.reject-btn').click(function () {
        $('.cookie-tab').addClass('d-none');
    });

    $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function (event) {
        // console.log('text')
        downloadDocSwiper.destroy(true, true);

        downloadDocSwiper = new Swiper('.download-doc-list .swiper', {
            direction: "vertical",
            slidesPerView: "auto",
            freeMode: true,
            scrollbar: {
                el: ".swiper-scrollbar",
            },
            mousewheel: true,
        });

    });

    var gallerySwiper = new Swiper(".gallery-swiper-", {
        slidesPerView: 6,
        spaceBetween: 10,
        freeMode: true,
        watchSlidesProgress: true,
        breakpoints: {
            0: {
                slidesPerView: 3,
                spaceBetween: 7,
            },
            576: {
                slidesPerView: 4,
                spaceBetween: 10,
            },
            1199: {
                slidesPerView: 6,
                spaceBetween: 10,
            },
        },
    });

    var gallerySwiper2 = new Swiper(".gallery-swiper-2", {
        spaceBetween: 0,
        navigation: {
            nextEl: ".gallery-slide .swiper-button-next",
            prevEl: ".gallery-slide .swiper-button-prev",
        },
        thumbs: {
            swiper: gallerySwiper,
        },
    });

});
