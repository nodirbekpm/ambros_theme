<?php
/**
 * Template Name: Science
 * Description: Science
 */
get_header();
// CRPS
$crps_title = get_field('crps_title');
$crps_texts = get_field('crps_texts');
$crps_image = get_field('crps_image');
$crps_displayed = get_field('crps_displayed');


// Steps
$steps = get_field('steps');
$steps_displayed = get_field('steps_displayed');

// NERIDRONATE
$neridronate_title = get_field('neridronate_title');
$neridronate_text = get_field('neridronate_text');
$neridronate_image = get_field('neridronate_image');
$neridronate_displayed = get_field('neridronate_displayed');

// Steps2
$steps2 = get_field('steps2');
$steps2_displayed = get_field('steps2_displayed');

?>

<main>
    <div class="about">
        <?php if ($crps_displayed !== "No"): ?>
            <section id="about_crps_1" class="about-crps_1">
                <div class="container">
                    <div class="about_card about_main">
                        <div class="about_left">
                            <div>
                                <div class="badge">ABOUT CRPS-1</div>
                            </div>
                            <h2><?= $crps_title ?></h2>
                            <?php foreach ($crps_texts as $crps_text): ?>
                                <p><?= $crps_text['text'] ?></p>
                            <?php endforeach; ?>

                        </div>
                        <div class="about_right">
                            <img src="<?php echo $crps_image['url'] ?>"
                                 alt="hand">
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ($steps_displayed !== "No"): ?>
            <section class="steps">
                <div class="container">
                    <div class="steps_block science_steps_block">
                        <?php foreach ($steps as $step): ?>
                            <div class="step">
                                <div class="step_header">
                                    <div class="step_number">01</div>

                                    <?php if (!empty($step['image'])): ?>
                                        <div class="step_img">
                                            <img src="<?php echo esc_url($step['image']['url']); ?>"
                                                 alt="<?php echo esc_attr($step['image']['alt']); ?>">
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="step_body">
                                    <?php if (!empty($step['title'])): ?>
                                        <h3 class="step_title"><?php echo esc_html($step['title']); ?></h3>
                                    <?php endif; ?>

                                    <?php if (!empty($step['text'])): ?>
                                        <p class="step_text"><?php echo esc_html($step['text']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ($neridronate_displayed !== "No"): ?>
            <section id="about_neridronate" class="about_neridronate">
                <div class="container">
                    <div class="about_main">
                        <div class="about_left">
                            <div>
                                <div class="badge">ABOUT NERIDRONATE</div>
                            </div>
                            <h2><?= $neridronate_title ?></h2>
                            <p><?= $neridronate_text ?></p>
                        </div>
                        <div class="about_right">
                            <img src="<?php echo $neridronate_image['url'] ?>"
                                 alt="Neridronate">
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php if ($steps2_displayed !== "No"): ?>
            <section class="steps">
                <div class="container">
                    <div class="steps_block science_steps_block">
                        <?php foreach ($steps2 as $step): ?>
                            <div class="step">
                                <div class="step_header">
                                    <div class="step_number">01</div>

                                    <?php if (!empty($step['image'])): ?>
                                        <div class="step_img">
                                            <img src="<?php echo esc_url($step['image']['url']); ?>"
                                                 alt="<?php echo esc_attr($step['image']['alt']); ?>">
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="step_body">
                                    <?php if (!empty($step['title'])): ?>
                                        <h3 class="step_title"><?php echo esc_html($step['title']); ?></h3>
                                    <?php endif; ?>

                                    <?php if (!empty($step['text'])): ?>
                                        <p class="step_text"><?php echo esc_html($step['text']); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </section>
        <?php endif; ?>
    </div>
</main>



<?php get_footer();