<?php get_header();

$category = get_the_category();
$firstCategory = $category[0]->term_id;

?>

    <main>
        <?php if (function_exists('yoast_breadcrumb')) { ?>
            <section class="section-breadcrumb">
                <div class="container">
                    <?php yoast_breadcrumb('<p id="breadcrumbs">', '</p>'); ?>
                </div>
            </section>
        <?php } ?>

        <section class="section-terms-list">
            <div class="container">
                <div class="terms-list">
                    <strong><?php the_field('title', 'category_' . $firstCategory); ?></strong>
                </div>
            </div>
        </section>

        <section class="section-page-content py-5">
            <div class="container narrow">
                <article>
                    <h1 class="text-center"><?php the_title() ?></h1>
                    <?php the_content() ?>
                </article>
                <div class="row justify-content-end pt-3">
                    <div class="col-auto d-flex align-items-center">
                        <img src="<?php echo THEME_URI . '/src/img/ico-like.png'; ?>" width="30" height="30" alt="like"
                             class="mr-2"> 8 вбодобань
                    </div>
                    <div class="col-auto d-flex align-items-center">
                        <img src="<?php echo THEME_URI . '/src/img/ico-comment.png'; ?>" width="30" height="30"
                             alt="like" class="mr-2"> 3 коментарі
                    </div>
                </div>
            </div>
        </section>

        <?php $args = array(
            'numberposts' => 4,
            'post_type' => 'post',
            'category__in' => $firstCategory,
            'post__not_in' => array(get_the_ID())
        );
        $posts = get_posts($args);
        if ($posts): ?>
            <section class="section-featured-posts blue-bg py-5">
                <div class="container">
                    <h2><?php echo __('Рекомендовані статті', 'kapsul'); ?></h2>
                    <div class="row featured-posts posts-carousel px-4">
                        <?php get_template_part('/template-parts/general/post-items', null, array('posts' => $posts));?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

    </main>

<?php
$layouts = ['page-content', 'blog-posts', 'featured-posts'];

wp_enqueue_style('post-item', THEME_URI . '/build/post-item.min.css', array());

wp_enqueue_style('slick', THEME_URI . '/src/vendors/slick/slick.css', array());
wp_enqueue_script('slick', THEME_URI . '/src/vendors/slick/slick.min.js', array('jquery'));

// enqueue sections css and js
enqueue_sections_build($layouts); ?>

<?php get_footer(); ?>
