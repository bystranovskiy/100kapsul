<?php
$post_ID = $args['post_ID'] ?: get_the_ID();
?>

<section class="section-page-content text-center py-5">
    <div class="container narrow">
        <h1><?php echo get_the_title($post_ID) ;?></h1>
    </div>
</section>