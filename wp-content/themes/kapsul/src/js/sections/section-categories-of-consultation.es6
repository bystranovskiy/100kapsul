"use strict";

(function ($) {

    $(document).ready(function () {

        const $slider = $(".section-categories-of-consultation .box-menu");
        let initialSlide = 0;

        const $hash = window.location.hash;
        if ($hash.length > 0) {
            const activeCategory = $("[data-hash='" + $hash.split("#")[1] + "']");
            if (activeCategory.length > 0) {
                activeCategory.trigger("click");
                initialSlide = activeCategory.length > 0 && $(window).width() <= 979 ? parseInt(activeCategory.parent(".col").index()) : 0;
            }
        }


        $slider.slick({
            arrows: true,
            dots: false,
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            initialSlide,
            responsive: [
                {
                    breakpoint: 1159,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 979,
                    settings: {
                        slidesToShow: 3,
                        dots: true
                    }
                },
                {
                    breakpoint: 719,
                    settings: {
                        slidesToShow: 2,
                        dots: true
                    }
                },
                {
                    breakpoint: 479,
                    settings: {
                        slidesToShow: 1,
                        dots: true
                    }
                }
            ]
        });


    })

})(jQuery);
