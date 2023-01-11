<?php get_header();
$page_ID = get_option('page_for_posts');
?>

    <main>
        <?php
        get_template_part('/template-parts/general/page-content', null, array('post_ID' => $page_ID));
        $layouts = ['page-content', 'featured-posts', 'services-and-benefits'];
        if (have_rows('blog-page_builder',$page_ID)):
            while (have_rows('blog-page_builder',$page_ID)) : the_row();
                $row = get_row_layout();
                get_template_part('/template-parts/sections/' . $row);
                if (!in_array($row, $layouts)) {
                    $layouts[] = $row;
                }
            endwhile;
        endif;
        // enqueue post-item styles
        if (in_array('blog-posts', $layouts)) {
            wp_enqueue_style('post-item', THEME_URI . '/build/post-item.min.css', array());
            wp_enqueue_script('ajax-load-more-posts', THEME_URI . '/build/ajax-load-more-posts.min.js', array('jquery'));
        }
        // enqueue slick if needed
        if ( in_array('blog-categories', $layouts) ) {
            wp_enqueue_style('slick', THEME_URI . '/src/vendors/slick/slick.css', array());
            wp_enqueue_script('slick', THEME_URI . '/src/vendors/slick/slick.min.js', array('jquery'));
        }
        // enqueue sections css and js
        enqueue_sections_build($layouts); ?>
    </main>

<?php get_footer(); ?>