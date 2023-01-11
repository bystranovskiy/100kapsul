<section class="section-reviews py-5"<?php $anchor = get_sub_field("anchor");
if ($anchor) {
    echo " data-anchor='" . $anchor . "'";
} ?>>
    <div class="container">
        <?php if (get_sub_field('title')) { ?>
            <h2 class="text-center"><?php the_sub_field('title'); ?></h2>
        <?php } ?>
        <?php
        $reviews = get_sub_field('reviews');
        if ($reviews):
            $half = round(count($reviews) / 2);
            ?>
            <div class="row">
                <div class="col-lg-6 reviews-list px-5 px-lg-0">
                    <?php $i = 1;
                    foreach ($reviews

                    as $review) { ?>
                    <div class="review-item">
                        <?php echo wp_get_attachment_image($review["image"], array('126', '126'), "", array("class" => "review-image")); ?>
                        <h3 class="review-title"><?php echo $review["title"]; ?></h3>
                        <div class="review-rating" data-rating="<?php echo $review["rating"]; ?>">
                            <?php for ($j = 0; $j < 5; $j++) { ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13"
                                     fill="none">
                                    <path d="M6.04894 0.927052C6.3483 0.0057416 7.6517 0.00574088 7.95106 0.927052L8.79611 3.52786C8.92999 3.93989 9.31394 4.21885 9.74717 4.21885H12.4818C13.4505 4.21885 13.8533 5.45846 13.0696 6.02786L10.8572 7.63525C10.5067 7.8899 10.3601 8.34127 10.494 8.75329L11.339 11.3541C11.6384 12.2754 10.5839 13.0415 9.80017 12.4721L7.58779 10.8647C7.2373 10.6101 6.7627 10.6101 6.41222 10.8647L4.19983 12.4721C3.41612 13.0415 2.36164 12.2754 2.66099 11.3541L3.50604 8.75329C3.63992 8.34127 3.49326 7.8899 3.14277 7.63525L0.930391 6.02787C0.146677 5.45846 0.549452 4.21885 1.51818 4.21885H4.25283C4.68606 4.21885 5.07001 3.93989 5.20389 3.52786L6.04894 0.927052Z"
                                          fill="#D9D9D9"/>
                                </svg>
                            <?php } ?>
                        </div>
                        <div class="review-content"><?php echo $review["content"]; ?></div>
                    </div>
                    <?php if ($i == $half) { ?>
                </div>
                <div class="col-lg-6 reviews-list">
                    <?php }
                    $i++;
                    } ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>