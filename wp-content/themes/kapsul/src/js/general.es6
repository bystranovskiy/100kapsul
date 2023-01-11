"use strict";

(function ($) {

    $(window).on("load", function (e) {
        // Remove preloader
        $(".preloader").fadeOut().remove();

        // Scroll to anchor on load
        scrollToAnchor(window.location.hash);

    });

    $(document).ready(function () {

        // Scroll to anchor on link click
        $("a[href*='#']").on("click", function (e) {
            // e.preventDefault();
            scrollToAnchor(this.href);
        })

        // Wrap secondary buttons
        $(".btn.btn-secondary, .btn.btn-secondary-outline").wrapInner("<span>");
        // Add loader to .load-more-posts and wpcf7 submit buttons
        $(".btn.load-more-posts>span, .btn[type='submit']>span").append("<svg x='0px' y='0px' width='26.349px' height='26.35px' viewBox='0 0 26.349 26.35'><g><g><circle cx='13.792' cy='3.082' r='3.082'></circle><circle cx='13.792' cy='24.501' r='1.849'></circle><circle cx='6.219' cy='6.218' r='2.774'></circle><circle cx='21.365' cy='21.363' r='1.541'></circle><circle cx='3.082' cy='13.792' r='2.465'></circle><circle cx='24.501' cy='13.791' r='1.232'></circle><path d='M4.694,19.84c-0.843,0.843-0.843,2.207,0,3.05c0.842,0.843,2.208,0.843,3.05,0c0.843-0.843,0.843-2.207,0-3.05 C6.902,18.996,5.537,18.988,4.694,19.84z'></path><circle cx='21.364' cy='6.218' r='0.924'></circle></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>")


        // Toggle mobile menu
        $(".mobile-menu-toggle").on("click", function (e) {
            $(this).toggleClass("active");
            $(".main-navigation").toggleClass("active");
            $("html").toggleClass("fixed");
        })


        // Tabs toggle
        $(".tabs-block").each(function () {
            const self = $(this);
            const $toggles = self.find(".tabs-nav .nav-item .toggle");
            $toggles.on("click", function (e) {
                const $hash = $(this).data("hash");
                if ($hash) {
                    window.location.hash = $hash;
                }
                $toggles.removeClass("active");
                $(this).addClass("active");
                self.find(".tabs-content .content").hide();
                self.find(".tabs-content .content:eq(" + $(this).parent(".nav-item").index() + ")").fadeIn();
            })
        });

        // Popups
        $("[href^='#popup-']").each(function () {
            $(this).on("click", function (e) {
                e.preventDefault();
                const $popup = $($(this).attr("href"));
                if ($popup.length > 0) {
                    $("html").addClass("fixed");
                    $popup.fadeIn();
                    $(".mobile-menu-toggle").removeClass("active");
                    $(".main-navigation").removeClass("active");
                }
            })
        });
        $(".popup-close").on("click", function (e) {
            $(".popup").fadeOut();
            $("html").removeClass("fixed");
        })
        $(".popup").click(function (e) {
            const el = ".popup-inner";
            if (!$(e.target).closest(el).length) {
                $(".popup").fadeOut();
                $("html").removeClass("fixed");
            }
        });


        // post share

        $(document).on("mouseenter", ".post-item", function () {
            $(this).find(".post-share").hide();
            $(this).find(".post-actions").css("display", "flex").hide().fadeIn();
        });
        $(document).on("mouseleave", ".post-item", function () {
            $(this).find(".post-share, .post-actions").fadeOut();
        });


        $(document).on("click", ".post-item [class*='share-']", function (event) {
            //$(".post-item [class*="share-"]").on("click", function () {
            const permalink = $(this).closest(".post-thumbnail-wrap").find("a").attr("href");
            let navUrl = false;
            if ($(this).hasClass("share-facebook")) {
                navUrl = "https://www.facebook.com/sharer/sharer.php?u=";
            } else if ($(this).hasClass("share-twitter")) {
                navUrl = "https://twitter.com/intent/tweet?text=";
            } else if ($(this).hasClass("share-whatsapp")) {
                navUrl = "whatsapp://send?text=";
            } else if ($(this).hasClass("share-instagram")) {
                navUrl = "";
            } else if ($(this).hasClass("share-telegram")) {
                navUrl = "https://t.me/share/url?url=";
            } else if ($(this).hasClass("share-viber")) {
                navUrl = "viber://forward?text=";
            } else if ($(this).hasClass("share-pinterest")) {
                navUrl = "http://pinterest.com/pin/create/button/?url=";
            }
            if (navUrl) {
                window.open(navUrl + permalink, "_blank");
            }
        })

        $(document).on("click", ".post-item .action-share", function (event) {
            const $postItem = $(this).closest(".post-item");
            $postItem.find(".post-actions").hide();
            $postItem.find(".post-share").css("display", "flex").hide().fadeIn();
        })


    })


    $(window).on("load scroll", function (e) {

        // Fixed header on page scroll
        if ($(window).scrollTop() >= 100) {
            $("header").addClass("fixed-header");
        } else {
            $("header").removeClass("fixed-header");
        }
    });


    function scrollToAnchor(href) {
        const anchor = href.split("#")[1];
        const $target = $("[data-anchor='" + anchor + "']");
        if ($target.length > 0) {
            $("html,body").animate({scrollTop: $target.offset().top - ($(window).width() < 980 ? 66 : 80)});
        }
    }


})(jQuery);