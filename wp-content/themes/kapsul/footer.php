<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kapsul
 */

?>

<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3 widget-area">
                <?php if (get_field('logo', 'option')) { ?>
                    <img src="<?php the_field('logo', 'option') ?>" class="footer-logo mb-2" alt="footer logo">
                <?php } ?>

                <ul class="footer-contacts font-weight-bolder">
                    <li>
                        <a href="tel:+38<?php the_field('phone', 'option') ?>">+38<?php the_field('phone', 'option') ?></a>
                    </li>
                    <li><a href="mailto:<?php the_field('email', 'option') ?>"><?php the_field('email', 'option') ?></a>
                    </li>
                </ul>

                <ul class="footer-socials">
                    <li>
                        <a href="<?php the_field('facebook', 'option') ?>" target="_blank" rel="nofollow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31"
                                 fill="none">
                                <path d="M20.6625 5.14729H23.4925V0.218292C23.0043 0.151125 21.3251 0 19.3695 0C15.2891 0 12.494 2.56654 12.494 7.28371V11.625H7.99121V17.1353H12.494V31H18.0145V17.1365H22.3352L23.021 11.6263H18.0133V7.83008C18.0145 6.23746 18.4434 5.14729 20.6625 5.14729Z"
                                      fill="white"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="<?php the_field('telegram', 'option') ?>" target="_blank" rel="nofollow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31"
                                 fill="none">
                                <g clip-path="url(#clip0_339_27)">
                                    <path d="M30.5214 3.07938C30.1427 2.61629 29.5755 2.36133 28.9242 2.36133C28.5701 2.36133 28.195 2.43583 27.8095 2.58318L1.56859 12.6001C0.176013 13.1316 -0.0115404 13.9291 0.000521676 14.3572C0.0125837 14.7853 0.245074 15.571 1.66556 16.0229C1.67408 16.0255 1.68259 16.0281 1.6911 16.0305L7.13417 17.5882L10.0778 26.0056C10.4792 27.1532 11.38 27.866 12.4292 27.866C13.0907 27.866 13.7414 27.5888 14.3109 27.0647L17.6776 23.9647L22.5609 27.8967C22.5613 27.8972 22.562 27.8975 22.5625 27.8979L22.6089 27.9353C22.6131 27.9386 22.6176 27.9422 22.6219 27.9455C23.1647 28.3665 23.7571 28.5888 24.3359 28.589H24.3361C25.4669 28.589 26.3673 27.752 26.6296 26.4569L30.9291 5.22666C31.1017 4.37451 30.957 3.612 30.5214 3.07938ZM8.95507 17.2923L19.4564 11.9275L12.9176 18.8755C12.8104 18.9893 12.7345 19.1286 12.6972 19.2802L11.4363 24.3874L8.95507 17.2923ZM13.0803 25.7284C13.0368 25.7684 12.993 25.8041 12.9493 25.837L14.1191 21.0992L16.247 22.8127L13.0803 25.7284ZM29.1489 4.86598L24.8493 26.0964C24.8079 26.2996 24.6757 26.7724 24.3359 26.7724C24.1679 26.7724 23.957 26.6808 23.741 26.5146L18.2076 22.0592C18.2069 22.0585 18.206 22.0578 18.205 22.0573L14.9126 19.406L24.3685 9.35828C24.6712 9.03662 24.6987 8.54397 24.4336 8.19062C24.1682 7.83727 23.6874 7.72611 23.294 7.92715L7.74153 15.8725L2.22444 14.294L28.4573 4.28014C28.6789 4.19547 28.8336 4.17773 28.9242 4.17773C28.9798 4.17773 29.0786 4.18436 29.1153 4.22953C29.1635 4.28842 29.225 4.48922 29.1489 4.86598Z"
                                          fill="white"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_339_27">
                                        <rect width="31" height="31" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="<?php the_field('instagram', 'option') ?>" target="_blank" rel="nofollow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29" viewBox="0 0 29 29"
                                 fill="none">
                                <g clip-path="url(#clip0_339_21)">
                                    <path d="M21.1499 0H7.85002C3.52145 0 0 3.52145 0 7.85002V21.1501C0 25.4785 3.52145 28.9999 7.85002 28.9999H21.1501C25.4785 28.9999 28.9999 25.4785 28.9999 21.1501V7.85002C28.9999 3.52145 25.4785 0 21.1499 0V0ZM27.2998 21.1501C27.2998 24.5411 24.5411 27.2998 21.1499 27.2998H7.85002C4.45889 27.2998 1.7001 24.5411 1.7001 21.1501V7.85002C1.7001 4.45889 4.45889 1.7001 7.85002 1.7001H21.1501C24.5411 1.7001 27.2998 4.45889 27.2998 7.85002V21.1501Z"
                                          fill="white"/>
                                    <path d="M14.4998 6.5705C10.1274 6.5705 6.57031 10.1276 6.57031 14.4999C6.57031 18.8723 10.1274 22.4294 14.4998 22.4294C18.8721 22.4294 22.4292 18.8723 22.4292 14.4999C22.4292 10.1276 18.8721 6.5705 14.4998 6.5705ZM14.4998 20.7293C11.065 20.7293 8.27041 17.9349 8.27041 14.4999C8.27041 11.0652 11.065 8.2706 14.4998 8.2706C17.9347 8.2706 20.7291 11.0652 20.7291 14.4999C20.7291 17.9349 17.9347 20.7293 14.4998 20.7293Z"
                                          fill="white"/>
                                    <path d="M22.6194 3.75391C21.3273 3.75391 20.2764 4.80507 20.2764 6.09697C20.2764 7.38908 21.3273 8.44025 22.6194 8.44025C23.9115 8.44025 24.9627 7.38908 24.9627 6.09697C24.9627 4.80485 23.9115 3.75391 22.6194 3.75391ZM22.6194 6.73992C22.265 6.73992 21.9765 6.45141 21.9765 6.09697C21.9765 5.7423 22.265 5.45401 22.6194 5.45401C22.9741 5.45401 23.2626 5.7423 23.2626 6.09697C23.2626 6.45141 22.9741 6.73992 22.6194 6.73992Z"
                                          fill="white"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_339_21">
                                        <rect width="29" height="29" fill="white"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 widget-area">
                <?php if (is_active_sidebar('footer-2')) {
                    dynamic_sidebar('footer-2');
                } ?>
            </div>
            <div class="col-sm-6 col-lg-3 widget-area">
                <?php if (is_active_sidebar('footer-3')) {
                    dynamic_sidebar('footer-3');
                } ?>
            </div>
            <div class="col-sm-6 col-lg-3 widget-area">
                <?php if (is_active_sidebar('footer-4')) {
                    dynamic_sidebar('footer-4');
                }
                echo do_shortcode('[contact-form-7 id="101" title="???????????????? ??????????????"]');
                ?>
            </div>
        </div>
        <div class="row pb-4 pt-5">
            <div class="col-lg-6">
                <div class="footer-copyright text-center text-lg-left">
                    ??<?php echo date("Y"); ?> 100kapsul. <?php echo __("All rights reserved", "kapsul"); ?>.
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer-copyright text-center text-lg-right">
                    Created by <a href="https://kvikstudio.com/" target="_blank">KVikStudio</a>
                </div>
            </div>
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->


<?php $popup = get_field('popup-consultation', 'option'); ?>
<div class="popup" id="popup-consultation" style="display: none;">
    <div class="container popup-wrapper">
        <div class="container popup-inner">
            <div class="row">
                <div class="col-lg-6 px-5 py-3 d-none d-lg-flex flex-column justify-content-center cover-style-1">
                    <?php
                    $popupImage = $popup["image"];
                    $popupImageSize = 'full'; // (thumbnail, medium, large, full or custom size)
                    if ($popupImage) {
                        echo wp_get_attachment_image($popupImage, $popupImageSize);
                    } ?>

                    <h2 class="h1 mt-4"><?php the_field('popup-title', 'option'); ?></h2>
                </div>
                <div class="col-lg-6 px-lg-4 pt-5 pb-4">
                    <?php echo $popup["form"]; ?>
                </div>
            </div>
            <div class="popup-close"></div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
