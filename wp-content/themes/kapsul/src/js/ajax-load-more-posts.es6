"use strict";

(function ($) {

    $(document).ready(function () {
        const ajaxurl = ajaxMeta.ajaxurl;

        $(".load-more-posts").each(function () {
            const
                $load_more_btn = $(this),
                $container = $load_more_btn.closest(".section-blog-posts").find(".featured-posts"),
                count_posts = $load_more_btn.data("count-posts"),
                count_next = $load_more_btn.data("count-next"),
                term_id = $load_more_btn.data("term-id") || null;
            let offset = $container.find(".post-item").length;

            $load_more_btn.on("click", function (e) {
                e.preventDefault();
                $load_more_btn.addClass("loading");

                $.ajax({
                    url: ajaxurl,
                    type: "post",
                    data: {
                        action: "load_more_posts",
                        "offset": offset,
                        "count_next": count_next,
                        "term_id": term_id
                    },
                    success: function (data) {
                        const $data = $(data);
                        if ($data.length) {
                            $data.css("display", "none");
                            $container.append($data);
                            $data.fadeIn();
                            offset = $container.find(".post-item").length;
                            if (offset === count_posts) {
                                $load_more_btn.parent("div").fadeOut().remove();
                            } else {
                                $load_more_btn.removeClass("loading");
                            }
                        } else {
                            console.log("error");
                        }
                    }
                })

            })

        })

    });

})(jQuery);