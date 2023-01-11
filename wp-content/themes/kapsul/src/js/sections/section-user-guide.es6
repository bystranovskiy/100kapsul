import "../../scss/sections/section-user-guide.scss";

"use strict";

(function ($) {

    $(document).ready(function () {

        $(".hint-toggle").on("click", function () {
            $(this).parent(".hint-item").toggleClass("active");
            $(this).closest(".user-guide").toggleClass("active");
        })

        $(document).on("click", function (e) {
            const el = ".hint-item";
            if (!$(e.target).closest(el).length) {
                $(".hint-item").removeClass("active");
                $(".user-guide").removeClass("active");
            }

        });
    });

})(jQuery);