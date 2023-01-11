import "../../scss/sections/section-logos-carousel.scss";

"use strict";

(function ($) {

    $(document).ready(function () {

        $(".logos-carousel").slick({
            arrows: true,
            dots: true,
            infinite: false,
            slidesToShow: 6,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1159,
                    settings: {
                        slidesToShow: 5,
                    }
                },
                {
                    breakpoint: 979,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 719,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 479,
                    settings: {
                        slidesToShow: 2,
                    }
                }
            ]
        })

    })

})(jQuery);