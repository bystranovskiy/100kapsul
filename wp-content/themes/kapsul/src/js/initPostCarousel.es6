export default function initPostCarousel() {
    "use strict";

    (function ($) {

        $(".featured-posts.posts-carousel").each(function () {
            if (!$(this).hasClass("slick-initialized")) {
                $(this).slick({
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
                                slidesToShow: 2,
                            }
                        },
                        {
                            breakpoint: 719,
                            settings: {
                                slidesToShow: 1,
                            }
                        }
                    ]
                });

            }
        });


    })(jQuery);
}