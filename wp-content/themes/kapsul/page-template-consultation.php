<?php /* Template Name: Консультація */ ?>

<?php get_header(); ?>

<main class="tabs-block">
    <?php get_template_part('/template-parts/general/page-content'); ?>
    <section class="section-categories-of-consultation blue-bg">
        <div class="container py-5">
            <div class="row tabs-nav services-list">
                <?php $i = 1;
                while (have_rows('categories-of-consultation')) : the_row(); ?>
                    <div class="col nav-item">
                        <div class="toggle services-list-item<?php if ($i === 1) {
                            echo ' active';
                        } ?>"<?php echo get_sub_field('hash') ? ' data-hash="' . get_sub_field('hash') . '"' : ''; ?>>
                            <?php
                            $image = get_sub_field('image');
                            if ($image) {
                                echo wp_get_attachment_image($image, array('164', '164'), "", array("class" => "img-responsive"));
                            } ?>
                            <h3 class="h5"><?php the_sub_field('title'); ?></h3>
                        </div>
                    </div>
                    <?php $i++; endwhile; ?>
            </div>
        </div>
    </section>
    <?php
    $image = get_field('image');
    $bg = $image ? ' style="background-image:url(' . wp_get_attachment_image_src($image, 'full')[0] . ')"' : '';
    ?>

    <section class="section-universal-content py-5"<?php echo $bg; ?>>
        <div class="container tabs-content pb-5">
            <?php $i = 1;
            while (have_rows('categories-of-consultation')) : the_row(); ?>
                <div class="content py-5"<?php if ($i > 1) { ?> style="display: none;"<?php } ?>>
                    <h2 class="text-center"><?php the_sub_field('title'); ?></h2>
                    <?php the_sub_field('content'); ?>
                </div>
                <?php $i++;
            endwhile; ?>
            <?php the_field('form'); ?>
        </div>
    </section>

    <?php
    $layouts = ['page-content', 'categories-of-consultation', 'universal-content', 'services-and-benefits'];
    wp_enqueue_style('slick', THEME_URI . '/src/vendors/slick/slick.css', array());
    wp_enqueue_script('slick', THEME_URI . '/src/vendors/slick/slick.min.js', array('jquery'));
    enqueue_sections_build($layouts);
    ?>
</main>

<?php get_footer(); ?>
