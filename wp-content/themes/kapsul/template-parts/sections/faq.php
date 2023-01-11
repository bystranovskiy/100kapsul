<section class="section-faq py-5"<?php $anchor = get_sub_field("anchor");
    if ($anchor) {
        echo " data-anchor='" . $anchor . "'";
    } ?>>
    <div class="container">
        <?php if (get_sub_field('title')) { ?>
            <h2><?php the_sub_field('title'); ?></h2>
        <?php } ?>
        <div class="row">
            <div class="col-lg-7">
                <?php
                if (have_rows('items-list')) { ?>
                    <ul class="faq-list-items">
                        <?php $i = 1; while (have_rows('items-list')) {
                            the_row(); ?>
                            <input type="checkbox" id="descr-<?php echo $i;?>" class="d-none">
                            <li>
                                <label for="descr-<?php echo $i;?>" class="item-title">
                                    <h3 class="h4"><?php the_sub_field('item-title'); ?></h3>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="18" viewBox="0 0 31 18" fill="none">
                                        <line x1="15.3657" y1="15.2444" x2="28.6101" y2="2" stroke="#7B18F9" stroke-width="3" stroke-linecap="round"/>
                                        <line x1="1.5" y1="-1.5" x2="20.2304" y2="-1.5" transform="matrix(-0.707107 -0.707107 -0.707107 0.707107 15.3657 17.3657)" stroke="#7B18F9" stroke-width="3" stroke-linecap="round"/>
                                    </svg>
                                </label>
                                <div class="item-description">
                                    <p><?php the_sub_field('item-description'); ?></p>
                                </div>
                            </li>
                        <?php $i++;} ?>
                    </ul>
                <?php } ?>
            </div>
            <div class="col-lg-5">
                <?php the_sub_field('content'); ?>
            </div>
        </div>
    </div>
</section>