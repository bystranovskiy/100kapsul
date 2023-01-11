<?php /* Template Name: Про нас */ ?>

<?php get_header(); ?>


<?php if (have_rows('about-us-page_builder')):
    $layouts = ['featured-posts']; ?>

    <main>
        <?php
        while (have_rows('about-us-page_builder')) : the_row();
            $row = get_row_layout();
            get_template_part('/template-parts/sections/' . $row);
            if (!in_array($row, $layouts)) {
                $layouts[] = $row;
            }
            endwhile; ?>
    </main>

    <?php
    if (in_array('mini-catalog', $layouts)) {
        wp_enqueue_style('post-item', THEME_URI . '/build/post-item.min.css', array());
    }

    // enqueue slick if needed
    if (in_array_any(['services-and-benefits', 'image-gallery'], $layouts)) {
        wp_enqueue_style('slick', THEME_URI . '/src/vendors/slick/slick.css', array());
        wp_enqueue_script('slick', THEME_URI . '/src/vendors/slick/slick.min.js', array('jquery'));
    }

    // enqueue lightGallery if needed
    if (in_array('image-gallery', $layouts)) {
        wp_enqueue_style('lightGallery', THEME_URI . '/build/lightGallery.min.css', array());
        wp_enqueue_script('lightGallery', THEME_URI . '/src/vendors/lightGallery/lightgallery.js', array('jquery'));
        wp_enqueue_script('lg-thumbnail', THEME_URI . '/src/vendors/lightGallery/lg-thumbnail.js', array('jquery'));
        wp_enqueue_script('lg-autoplay', THEME_URI . '/src/vendors/lightGallery/lg-autoplay.js', array('jquery'));
        wp_enqueue_script('mousewheel', THEME_URI . '/src/vendors/lightGallery/jquery.mousewheel.min.js', array('jquery'));
    }

    // enqueue sections css and js
    enqueue_sections_build($layouts);

endif; ?>
<?php
get_footer();

