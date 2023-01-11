<?php get_header();

$queried_object = get_queried_object();
$name = $queried_object->name;
$description = $queried_object->description;
$term_id = $queried_object->term_id;

?>

    <main>
        <section class="section-page-content text-center py-5">
            <div class="container narrow">
                <h1><?php echo $name ?></h1>
                <p><?php echo $description ?></p>
            </div>
        </section>
        <?php get_template_part('/template-parts/sections/blog-categories'); ?>
        <?php if (function_exists('yoast_breadcrumb')) { ?>
            <section class="section-breadcrumb py-2">
                <div class="container">
                    <?php yoast_breadcrumb('<p id="breadcrumbs">', '</p>'); ?>
                </div>
            </section>
        <?php } ?>
        <section class="section-blog-posts pb-5">
            <div class="container py-5">
                <?php
                $post_type = 'post';
                $count_posts = count(get_posts(array('numberposts' => -1, 'post_type' => $post_type, 'category__in' => $term_id)));
                $numberposts = 8;
                $count_next = 4;

                $args = array(
                    'numberposts' => $numberposts,
                    'post_type' => $post_type,
                    'category__in' => $term_id
                );
                $posts = get_posts($args);
                if ($posts) { ?>
                    <div class="row featured-posts">
                        <?php get_template_part('/template-parts/general/post-items', null, array('posts' => $posts)); ?>
                    </div>
                    <?php if ($count_posts > $numberposts) { ?>
                        <div class="text-center">
                            <div data-count-next="<?php echo $count_next; ?>"
                                 data-count-posts="<?php echo $count_posts; ?>"
                                 data-term-id="<?php echo $term_id; ?>"
                                 class="btn btn-secondary-outline mt-4 load-more-posts"><?php echo __('Завантажити ще', 'kapsul'); ?></div>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <p class="text-center"><?php echo __('В даній категорії немає записів', 'kapsul'); ?></p>
                <?php } ?>
        </section>
    </main>

<?php
$layouts = ['page-content', 'blog-posts', 'services-and-benefits', 'featured-posts'];

wp_enqueue_style('post-item', THEME_URI . '/build/post-item.min.css', array());
wp_enqueue_style('slick', THEME_URI . '/src/vendors/slick/slick.css', array());
wp_enqueue_script('slick', THEME_URI . '/src/vendors/slick/slick.min.js', array('jquery'));
wp_enqueue_script('ajax-load-more-posts', THEME_URI . '/build/ajax-load-more-posts.min.js', array('jquery'));

// enqueue sections css and js
enqueue_sections_build($layouts); ?>

<?php get_footer(); ?>