<?php
$room = $args['post_ID'];
$category = get_the_terms($room, 'rooms_type')[0];
$declension = get_field('correct-declension', $category->taxonomy . '_' . $category->term_id);
?>
<div class="apartment-components-item">
    <h2 class="h3 toggle-room text-center mt-4 mb-3"><label><?php echo $category->name; ?><input type="checkbox" checked></label></h2>
    <?php
    get_template_part('/template-parts/general/room-description', null, array('post_ID' => $room)); ?>

    <?php $args = array(
        'numberposts' => -1,
        'post_type' => 'rooms',
        'post__not_in' => array($room),
        'tax_query' => array(
            array(
                'taxonomy' => 'rooms_type',
                'terms' => array($category->term_id)
            )
        )
    );
    $posts = get_posts($args);
    if ($posts):?>
        <section class="section-featured-posts blue-bg pt-3 pb-5">
            <div class="container">
                <h3 class="text-center"><?php echo $declension; ?></h3>
                <?php
                get_template_part('/template-parts/general/rooms-list', null, array('carousel' => true)); ?>
            </div>
        </section>
    <?php endif; ?>
</div>