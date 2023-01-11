import "../../scss/sections/section-steps-list.scss";

"use strict";

(function ($) {

    $(document).ready(function () {

        window.matchMedia("(max-width: 979px)").addEventListener("change", event => {
            if (event.matches) {
                initStepsSlider()
            }
        })

        initStepsSlider()

        function initStepsSlider() {
            $(".steps-list").slick({
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
    });

})(jQuery);