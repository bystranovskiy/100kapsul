import "../../scss/sections/section-reviews.scss";

"use strict";

(function ($) {

    $(document).ready(function () {

        const $firstCol = $(".reviews-list:first-child");
        const $lastCol = $(".reviews-list:last-child");
        const $lastItems = $lastCol.find(".review-item");

        if ($(window).width() < 979) {
            $lastItems.detach().appendTo($firstCol);
        }

        initReviewSlider()

        window.matchMedia("(max-width: 979px)").addEventListener("change", event => {
            if (event.matches) {
                $lastItems.detach().appendTo($firstCol);
                initReviewSlider()
            } else {
                setTimeout(function () {
                    $firstCol.find(".review-item:nth-last-child(-n+" + $lastItems.length + ")").detach().appendTo($lastCol);
                }, 400);
            }
        })

        function initReviewSlider() {
            $firstCol.slick({
                responsive: [
                    {
                        breakpoint: 9999,
                        settings: "unslick"
                    },
                    {
                        breakpoint: 979,
                        settings: {
                            arrows: true,
                            dots: true,
                            infinite: false,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            adaptiveHeight: true
                        }
                    }
                ]
            })
        }
    })

})(jQuery);