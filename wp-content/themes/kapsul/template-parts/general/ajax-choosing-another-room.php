<?php
// AJAX CHOOSING ANOTHER ROOM

add_action('wp_ajax_nopriv_choosing_another_room', 'wpex_metadata_choosing_another_room');
add_action('wp_ajax_choosing_another_room', 'wpex_metadata_choosing_another_room');

function wpex_metadata_choosing_another_room()
{
    $post_ID = $_POST['post_ID'];
    get_template_part('/template-parts/general/apartment-components-item', null, array('post_ID' => $post_ID));
}