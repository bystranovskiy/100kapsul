import "../../scss/sections/section-services-and-benefits.scss";

"use strict";

(function ($) {

    $(document).ready(function () {

        const $slider = $(".services-list");

        // Set active menu item if it matches page link
        const pathname = window.location.pathname.split("/")[1];
        $slider.find(".services-list-item").each(function () {
            const href = $(this).attr("href");
            if (href) {
                if (href.split("/")[1] === pathname) {
                    $(this).addClass("active");
                }
            }
        })

        // Set initialSlide if there is an active menu item
        const activeCategory = $slider.find(".services-list-item.active");
        const initialSlide = activeCategory.length > 0 && $(window).width() <= 1159 ? parseInt(activeCategory.parent(".col").index()) : 0;

        $slider.slick({
            initialSlide,
            arrows: true,
            dots: true,
            infinite: false,
            slidesToShow: 5,
            slidesToScroll: 1,
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
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 719,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 479,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });

    });

})(jQuery);
