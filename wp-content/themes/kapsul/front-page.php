<?php get_header(); ?>


<?php if (have_rows('front-page_builder')):
    $layouts = []; ?>

    <main>
        <?php
        while (have_rows('front-page_builder')) : the_row();
            $row = get_row_layout();
            get_template_part('/template-parts/sections/' . $row);
            if (!in_array($row, $layouts)) {
                $layouts[] = $row;
            }
            endwhile; ?>
    </main>

    <?php
    // enqueue post-item styles
    if (in_array_any(['catalog', 'featured-posts'], $layouts)) {
        wp_enqueue_style('post-item', THEME_URI . '/build/post-item.min.css', array());
    }

    // enqueue slick if needed
    if (in_array('featured-posts', $layouts)) {
        wp_enqueue_style('slick', THEME_URI . '/src/vendors/slick/slick.css', array());
        wp_enqueue_script('slick', THEME_URI . '/src/vendors/slick/slick.min.js', array('jquery'));
    }
    // enqueue select2 and Isotope if needed
    if (in_array('catalog', $layouts)) {
        wp_enqueue_style('select2', THEME_URI . '/src/vendors/select2/select2.min.css', array());
        wp_enqueue_script('select2', THEME_URI . '/src/vendors/select2/select2.min.js', array('jquery'));
        wp_enqueue_script('isotope', THEME_URI . '/src/vendors/isotope.pkgd.min.js', array('jquery'));
    }
    // enqueue sections css and js
    enqueue_sections_build($layouts);

endif; ?>
<?php
get_footer();
