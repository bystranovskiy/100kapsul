import "../../scss/sections/section-room-description.scss";
import initPostCarousel from "../initPostCarousel.es6";

"use strict";

(function ($) {

    $(document).ready(function () {

        lightGalleryInit();

        $(".section-apartment-components").on("click", ".featured-posts .post-item .inner-wrap", function (e) {
            e.preventDefault();
            const $container = $(this).closest(".apartment-components-item");
            $container.find(".section-room-description").attr("disabled", true);
            const $post_ID = $(this).data("post-id");
            choosing_another_room($post_ID, $container);
        }).on("change", ".toggle-room input", function (e) {
            $(this).closest(".apartment-components-item").find(".section-room-description").attr("disabled", !e.target.checked);
        })

        const ajaxurl = ajaxMeta.ajaxurl;

        function choosing_another_room($post_ID, $container) {
            $.ajax({
                url: ajaxurl,
                type: "post",
                data: {
                    action: "choosing_another_room",
                    "post_ID": $post_ID
                },
                success: function (data) {
                    const $data = $(data);
                    if ($data.length) {
                        $data.css("display", "none");
                        if ($container.length === 0) {
                            $data.insertBefore($(".add-another-room")).fadeIn();
                            const selected_rooms = $(".apartment-components-item .section-room-description:not([disabled])");
                            if (selected_rooms.length === 10) {
                                $(".add-another-room, .add-another-room + .container").fadeOut().remove();
                            }
                        } else {
                            $data.insertBefore($container).fadeIn();
                            $container.remove();
                        }
                        lightGalleryInit();
                        initPostCarousel();

                    } else {
                        console.log("error");
                    }
                }
            });
            return false;
        }

        function lightGalleryInit() {
            $(".col-post-gallery").lightGallery({
                download: false,
                selector: ".post-gallery-image",
                hideBarsDelay: 2500
            });
        }


        // get parent object info
        const
            $parent_object = $("#parent-object"),
            $title = $parent_object.find(".object-title").text(),
            $url = $parent_object.data("permalink"),
            $type = $parent_object.data("type");

        // Add parent object
        $("label[for='form-parent-object']").text($type + ":");
        $("#form-parent-object").append("<a class='btn btn-secondary' href='" + $url + "' target='_blank'><span>" + $title + "</span></a>");
        $("input[name='parent-type']").val($type);
        $("input[name='parent-title']").val($title);
        $("input[name='parent-url']").val($url);


        // On popup "Calculate interior" open
        $("[href='#popup-calculate-interior']").on("click", function () {

            // Refresh selection
            $("#form-selected-rooms").empty();
            $("[data-wpcf7-group-id='rooms'] .wpcf7-field-group:not(:first-child) .wpcf7-field-group-remove").click();
            $("input[name='room-title__1'], input[name='room-url__1']").val(null);

            // Get selected rooms
            const selected_rooms = $(".apartment-components-item .section-room-description:not([disabled])");

            if (selected_rooms.length > 0) {
                // Fill data
                $("label[for='form-selected-rooms'], #form-selected-rooms").show();
                let $i = 1;
                selected_rooms.each(function () {
                    if ($i > 1) {
                        $(".wpcf7-field-group-add")[0].click();
                    }
                    const
                        $room = $(this),
                        $room_title = $room.find(".object-title").text(),
                        $room_url = $room.data("permalink");
                    $("#form-selected-rooms").append("<div class='col-auto p-1'><a class='btn btn-secondary' href='" + $room_url + "' target='_blank'><span>" + $room_title + "</span></a></div>");
                    $("input[name='room-title__" + $i + "']").val($room_title);
                    $("input[name='room-url__" + $i + "']").val($room_url);
                    $i++;
                });
            } else {
                $("label[for='form-selected-rooms'], #form-selected-rooms").hide();
            }

        })

    });

})(jQuery);