<?php
$queried_object = get_queried_object();
$term_id = $queried_object->term_id;

$taxonomies = get_terms(array(
    'taxonomy' => 'category',
    'hide_empty' => false
));

if (!empty($taxonomies)) :?>
    <section class="section-blog-categories blue-bg py-5">
        <div class="container">
            <div class="row services-list">
                <?php foreach ($taxonomies as $term) : ?>
                    <div class="col">
                        <a href="<?php echo get_term_link($term); ?>"
                           class="services-list-item<?php if ($term_id && $term_id === $term->term_id) {
                               echo ' active';
                           } ?>">
                            <?php
                            $image = get_field('image', $term->taxonomy . '_' . $term->term_id);
                            if ($image) {
                                echo wp_get_attachment_image($image, array('164', '164'), "", array("class" => "img-responsive"));
                            } ?>
                            <h3 class="h5"><?php echo $term->name; ?></h3>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
