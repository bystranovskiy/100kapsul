import "../../scss/sections/section-catalog.scss";

"use strict";

(function ($) {

    $(document).ready(function () {

        // Init default filter args
        const filterArgs = {
            rooms_type: "apartments",
            texture: null,
            color: null,
            accent: null
        }


        // Init pagination params
        let
            initial_items = 6,
            next_items = 3;


        // Init MediaQueryLists
        const $SM = window.matchMedia("(max-width: 979px)");
        const $LG = window.matchMedia("(min-width: 980px) and (max-width: 1159px)");
        const $XL = window.matchMedia("(min-width: 1160px)");


        // Show more button
        const $showMore = $("#showMore");


        // Init Isotope grid
        const $grid = $(".section-catalog .posts-list").isotope({
            itemSelector: ".post-item",
            layoutMode: "masonry",
            stamp: ".element-item--static"
        });


        // Filter Isotope by default
        $grid.isotope({
            filter: filterFns
        });
        setPaginationParams()


        // Catalog menu filters on click
        $(".catalog-menu-item").on("click", function () {
            $(".catalog-menu-item").removeClass("active");
            $(this).addClass("active");
            $(".current-rooms-type").text($(this).find(".title").text());
            filterArgs.rooms_type = $(this).data("rooms_type");
            $grid.isotope({
                filter: filterFns
            });
            updateFilterCounts();
        });


        // Show More pagination on click
        $showMore.on("click", function (e) {
            e.preventDefault();
            $(this).addClass("loading");
            setTimeout(function () {
                showNextItems(next_items);
            }, 300);
        });


        // Update pagination onchange MediaQueryLists
        $SM.addEventListener("change", event => {
            setPaginationParams()
        })
        $LG.addEventListener("change", event => {
            setPaginationParams()
        })
        $XL.addEventListener("change", event => {
            setPaginationParams()
        })


        // Set pagination params
        function setPaginationParams() {
            if ($SM.matches) {
                initial_items = 2;
                next_items = 2;
            } else if ($LG.matches) {
                initial_items = 4;
                next_items = 2;
            } else if ($XL.matches) {
                initial_items = 6;
                next_items = 3;
            }
            updateFilterCounts()
        }


        // Update filter counts
        function updateFilterCounts() {
            const itemElems = $grid.isotope("getFilteredItemElements");
            const count_items = $(itemElems).length;
            if (count_items > initial_items) {
                $showMore.fadeIn();
            } else {
                $showMore.fadeOut();
            }
            $(".post-item.d-none").removeClass("d-none");
            let index = 0;
            $(itemElems).each(function () {
                if (index >= initial_items) {
                    $(this).addClass("d-none");
                }
                index++;
            });
            $grid.isotope("layout");
        }


        // Show next items - pagination
        function showNextItems(pagination) {
            const $hiddenPosts = $(".post-item.d-none");
            const itemsMax = $hiddenPosts.length;
            let itemsCount = 0;
            $hiddenPosts.each(function () {
                if (itemsCount < pagination) {
                    $(this).removeClass("d-none");
                    itemsCount++;
                }
            });
            $grid.isotope("layout");
            $showMore.removeClass("loading");
            if (itemsCount >= itemsMax) {
                $showMore.fadeOut();
            }
        }


        // Filter by selected args
        function filterFns() {
            let result = true;
            ["rooms_type", "texture", "color", "accent"].forEach((item) => {
                if (filterArgs[item]) {
                    const dataAttr = $(this).data(item);
                    if (dataAttr) {
                        if (!dataAttr.split(", ").includes(filterArgs[item])) {
                            result = false;
                        }
                    }
                }
            });
            return result;
        }


        // Init select2 for filter selects
        const $select2 = $(".js-select2");
        $select2.select2({
            minimumResultsForSearch: -1,
            dropdownAutoWidth: "auto",
            //multiple: true,
            allowClear: true
        });


        // Filter selects actions
        $select2.on("select2:select select2:clear", function (e) {
            const filter = $(this).data("filter")
            filterArgs[filter] = e.params._type === "select" ? e.params.data.id : null;
            $grid.isotope({
                filter: filterFns
            });
            updateFilterCounts();
        })

    });

})(jQuery);