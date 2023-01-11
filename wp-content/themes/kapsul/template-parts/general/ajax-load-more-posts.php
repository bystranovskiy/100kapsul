<?php
// AJAX LOAD MORE POSTS

add_action('wp_ajax_nopriv_load_more_posts', 'wpex_metadata_load_more_posts');
add_action('wp_ajax_load_more_posts', 'wpex_metadata_load_more_posts');

function wpex_metadata_load_more_posts()
{
    $offset = $_POST['offset'];
    $count_next = $_POST['count_next'];
    $post_type = 'post';
    $term_id = $_POST['term_id'] || null;

    $args = array(
        'numberposts' => $count_next,
        'post_type' => $post_type,
        'offset' => $offset,
        'category__in' => $term_id
    );
    $posts = get_posts($args);
    if ($posts):
        get_template_part('/template-parts/general/post-items', null, array('posts' => $posts));
    endif;

}