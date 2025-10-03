<?php
/**
 * Template Name: Contact
 * Description: Contact
 */
get_header();


// Contact
$contact_title = get_field('contact_title');
$contact_text = get_field('contact_text');
$contact_displayed = get_field('contact_displayed');

?>

    <main>
        <?php if ($contact_displayed !== "No"): ?>
            <section class="contact">
                <div class="container">
                    <div class="contact_card">
                        <div class="contact_card_left">
                            <h2><?= $contact_title ?></h2>
                            <p><?= $contact_text ?></p>
                            <div class="contact_card_arrow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="138" height="12" viewBox="0 0 138 12"
                                     fill="none">
                                    <path
                                        d="M1 1L7.1875 6C10.7969 8.9167 15.9531 8.9167 19.5625 6C23.1719 3.0833 28.3281 3.0833 31.9375 6C35.5469 8.9167 40.7031 8.9167 44.3125 6C47.9219 3.0833 53.0781 3.0833 56.6875 6C60.2969 8.9167 65.4531 8.9167 69.0625 6C72.6719 3.0833 77.8281 3.0833 81.4375 6C85.0469 8.9167 90.2031 8.9167 93.8125 6C97.4219 3.0833 102.578 3.0833 106.188 6C109.797 8.9167 114.953 8.9167 118.562 6C122.172 3.0833 127.328 3.0833 130.938 6L137.125 11"
                                        stroke="url(#paint0_linear_126_576)" stroke-width="2"/>
                                    <defs>
                                        <linearGradient id="paint0_linear_126_576" x1="1" y1="10.9679" x2="199" y2="10.9679"
                                                        gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#47A3C7"/>
                                            <stop offset="1" stop-color="#A3DBEB"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>
                            <ul class="contact_card_infos">
                                <li>
                                    <div class="contact_card_icon">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/mail.svg" alt="">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <?php if ($email = get_field('email', 'option')): ?>
                                            <a href="mailto:<?php echo esc_attr($email); ?>">
                                                <?php echo esc_html($email); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </li>
                                <li>
                                    <div class="contact_card_icon">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/phone.svg" alt="">
                                    </div>
                                    <?php if (have_rows('phones', 'option')): ?>
                                        <div class="d-flex flex-column">
                                            <?php while (have_rows('phones', 'option')): the_row();
                                                $phone = get_sub_field('phone');
                                                if ($phone):
                                                    // faqat raqamlarni ajratib olish (tel: uchun)
                                                    $tel = preg_replace('/[^0-9+]/', '', $phone);
                                                    ?>
                                                    <a href="tel:<?php echo esc_attr($tel); ?>">
                                                        <?php echo esc_html($phone); ?>
                                                    </a>
                                                <?php endif; endwhile; ?>
                                        </div>
                                    <?php endif; ?>

                                </li>
                            </ul>
                        </div>
                        <div class="contact_card_right">
                            <style>
                                .wpcf7-response-output {
                                    display: none;
                                }
                            </style>
                            <?php
                            echo do_shortcode('[contact-form-7 id="47667f0" title="Contact Us"]');
                            ?>
                        </div>
                        <div class="contact_card_bg">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/contact_card_bg.png" alt="bg">
                        </div>
                        <div class="contact_card_bg_mobile">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/ai-generated-3d-water.png"
                                 alt="bg">
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </main>



<?php get_footer();