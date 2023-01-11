import "../../scss/sections/section-image-gallery.scss";

"use strict";

(function ($) {

    $(document).ready(function () {

        const $imageGallery = $(".image-galley");

        $imageGallery.lightGallery({
            download: false,
            selector: ".image-gallery-item",
            hideBarsDelay: 2500
        });

        $imageGallery.slick({
            arrows: true,
            dots: true,
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1159,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 979,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 719,
                    settings: {
                        slidesToShow: 2
                    }
                }
            ]
        });

    });

})(jQuery);