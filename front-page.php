<?php
/**
 * Template Name: Main Page
 * Description: Main Page
 */
get_header();

// Hero
$hero_title = get_field('hero_title');
$hero_subtitle = get_field('hero_subtitle');
$hero_displayed = get_field('hero_displayed');

// About
$about_title = get_field('about_title');
$about_text = get_field('about_text');
$about_link = get_field('about_link');
$about_displayed = get_field('about_displayed');

// Mission
$mission_title = get_field('mission_title');
$mission_texts = get_field('mission_texts');
$mission_displayed = get_field('mission_displayed');

// CRPS
$crps_title = get_field('crps_title');
$crps_texts = get_field('crps_texts');
$crps_image = get_field('crps_image');
$crps_displayed = get_field('crps_displayed');

// NERIDRONATE
$neridronate_title = get_field('neridronate_title');
$neridronate_text = get_field('neridronate_text');
$neridronate_image = get_field('neridronate_image');
$neridronate_displayed = get_field('neridronate_displayed');

// CRPS-RISE
$crps_rise_title = get_field('crps_rise_title');
$crps_rise_img = get_field('crps_rise_img');
$crps_rise_displayed = get_field('crps_rise_displayed');

// Steps
$steps = get_field('steps');
$steps_displayed = get_field('steps_displayed');

// Team
$team_title = get_field('team_title');
$team_displayed = get_field('team_displayed');

// News
$news_title = get_field('news_title');
$news_displayed = get_field('news_displayed');

// Contact
$contact_title = get_field('contact_title');
$contact_text = get_field('contact_text');
$contact_displayed = get_field('contact_displayed');

?>

<?php if ($hero_displayed !== "No"): ?>
    <div class="hero">

        <div class="container">
            <div class="hero_block">
                <div class="header_logo">
                        <span class="logo">
                            <?php if ($logo = get_field('logo', 'option')): ?>
                                <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="close">
                            <?php endif; ?>
                        </span>
                </div>
                <!-- <h1>Ambros Therapeutics</h1> -->
                <h3>
                    <?= $hero_subtitle ?>
                </h3>
                <!-- <a href="#contact" class="btn">Contact us</a> -->
            </div>
            <div class="hero_bg">
                <video src="<?php echo get_template_directory_uri() ?>/assets/video/bg.webm" autoplay muted loop
                       playsinline preload="auto"></video>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ($about_displayed !== "No"): ?>
    <section id="about" class="mission">
        <div class="container">
            <div class="mission_block">
                <div>
                    <div class="badge">About Us</div>
                </div>
                <div class="mission_main">
                    <div class="mission_left">
                        <h2><?= $about_title ?></h2>
                    </div>
                    <div class="mission_right">
                        <div class="mission_text">
                            <p><?= $about_text ?></p>
                        </div>
                        <div>
                            <a href="<?php echo $about_link['url'] ?>" class="btn">Our science</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($mission_displayed !== "No"): ?>
    <section id="mission" class="mission">
        <div class="container">
            <div class="mission_block">
                <div>
                    <div class="badge">Our Mission</div>
                </div>
                <div class="mission_main">
                    <div class="mission_left">
                        <h2><?= $mission_title ?></h2>
                    </div>
                    <div class="mission_right">
                        <div class="mission_text">
                            <?php foreach ($mission_texts as $mission_text): ?>
                                <p><?= $mission_text['text'] ?></p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

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
                            <div>
                                <a href="#about_neridronate" class="btn">Learn more</a>
                            </div>
                        </div>
                        <div class="about_right">
                            <img src="<?php echo $crps_image['url'] ?>"
                                 alt="hand">
                        </div>
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
                            <div>
                                <a href="#" class="btn">Learn more</a>
                            </div>
                        </div>
                        <div class="about_right">
                            <img src="<?php echo $neridronate_image['url'] ?>"
                                 alt="Neridronate">
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </div>

<?php if ($crps_rise_displayed !== "No"): ?>
    <section id="crps_rise" class="crps_rise">
        <div class="container">
            <h2><?= $crps_rise_title ?></h2>
            <div class="img_box">
                <img src="<?php echo $crps_rise_img['url'] ?>" alt="Banner">
            </div>
        </div>
    </section>
<?php endif; ?>

    <section style="display: none" id="pipeline" class="pipeline">
        <div class="container">
            <div class="pipeline_block">
                    <span class="ContentPaneDiv3">
                        <div id="_ctrl0_ctl57_divModuleContainer"
                             class="module module-html module-robust-pipeline module--no-padding-top">
                            <div class="module_container module_container--outer">

                                <div class="module_container module_container--inner">
                                    <h2>Focused Pipeline on a rare metabolic bone disease</h2>
                                        <div class="module-robust-pipeline_item module-robust-pipeline_item--program">
                                            <div class="module-robust-pipeline_header">
                                                <div class="grid grid--flex grid--flex_align-middle">
                                                    <div class="grid_col grid_col--1-of-6 desktop--only">
                                                        <div class="grid_col-inner grid_col-inner--icon">
                                                            <p>
                                                                <strong>Program<!--<sup>*</sup>--></strong>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="grid_col grid_col--1-of-6 desktop--only">
                                                        <div class="grid_col-inner">
                                                            <p>Indication</p>
                                                        </div>
                                                    </div>
                                                    <div class="grid_col grid_col--1-of-6 desktop--only">
                                                        <div class="grid_col-inner background--grey">
                                                            <!-- <p>Genotype</p> -->
                                                            <p>US Annual Incidence</p>
                                                        </div>
                                                    </div>
                                                    <div
                                                            class="grid_col grid_col--3-of-6 grid_col--lc-1-of-1 grid_col--md-1-of-1 grid_col--lc-1-of-1 grid_col--md-1-of-1">
                                                        <div class="grid_col-inner">
                                                            <div class="module-robust-pipeline_labels-wrap">
                                                                <div
                                                                        class="module-robust-pipeline_labels grid--no-gutter grid--flex">
                                                                    <div
                                                                            class="background--green1 grid_col grid_col--1-of-4 grid_col--sm-1-of-4">
                                                                        Discovery
                                                                    </div>
                                                                    <!-- <div class="background--green2 dark grid_col grid_col--1-of-4 grid_col--sm-1-of-4">Candidate <br>selection</div> -->
                                                                    <div
                                                                            class="background--green3 dark grid_col grid_col--1-of-4 grid_col--sm-1-of-4">
                                                                        Pre-clinical</div>
                                                                    <div
                                                                            class="background--green4 dark grid_col grid_col--1-of-4 grid_col--sm-1-of-4">
                                                                        Phase 1/2
                                                                    </div>
                                                                    <div
                                                                            class="background--green5 dark grid_col grid_col--1-of-4 grid_col--sm-1-of-4">
                                                                        Pivotal
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="module-robust-pipeline_wrap" data-accordion="container">
                                            <!-- <span class="module-robust-pipeline_category module-robust-pipeline_category--pediatric">PEDIATRIC</span> -->
                                            <div class="module-robust-pipeline_item module-robust-pipeline_item--accordion"
                                                 data-accordion="item">
                                                <div class="module-robust-pipeline_header tab-firsttab" tabindex="0"
                                                     id="tab11" role="button" aria-expanded="false"
                                                     aria-controls="panel11" data-accordion="toggle">
                                                    <div class="grid grid--flex grid--flex_align-middle">
                                                        <div data-bs-toggle="collapse" aria-expanded="false"
                                                             aria-controls="collapseExample" href="#collapseExample"
                                                             class="grid_col grid_col--1-of-6 grid_col--lc-1-of-1 grid_col--md-1-of-1">
                                                            <div class="grid_col-inner grid_col-inner--icon">
                                                                <p>
                                                                    <!-- <i class="q4-icon_plus"></i> -->
                                                                    <i class="fa-solid fa-plus pipeline_icon"></i>
                                                                    <strong
                                                                            class="mobile--only">Program
                                                                        <!--<sup>*</sup>--><br></strong>
                                                                    <strong>Neridronate</strong>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div
                                                                class="grid_col grid_col--1-of-6 grid_col--lc-1-of-1 grid_col--md-1-of-1">
                                                            <div class="grid_col-inner">
                                                                <p><span class="mobile--only">Indication:
                                                                    </span>CRSP-1</p>
                                                            </div>
                                                        </div>
                                                        <div
                                                                class="grid_col grid_col--1-of-6 grid_col--lc-1-of-1 grid_col--md-1-of-1">
                                                            <div class="grid_col-inner background--grey">
                                                                <p><span class="mobile--only">US/EU prevalence:
                                                                    </span><em>50,000-<br>70,000
                                                                        <!--<sup>1-3</sup>--></em>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div
                                                                class="grid_col grid_col--3-of-6 grid_col--lc-1-of-1 grid_col--md-1-of-1">
                                                            <div class="grid_col-inner">
                                                                <div
                                                                        class="module-robust-pipeline_label grid--no-gutter grid--flex">
                                                                    <div
                                                                            class="background--green4 grid_col grid_col--1-of-4 grid_col--sm-1-of-4">
                                                                    </div>
                                                                    <!-- <div class="background--green4 grid_col grid_col--1-of-4 grid_col--sm-1-of-4"></div> -->
                                                                    <div
                                                                            class="background--green4 grid_col grid_col--1-of-4 grid_col--sm-1-of-4">
                                                                    </div>
                                                                    <div
                                                                            class="background--green4 grid_col grid_col--1-of-4 grid_col--sm-1-of-4">
                                                                    </div>
                                                                    <div
                                                                            class="background--grey1 background--green4-half grid_col grid_col--1-of-4 grid_col--sm-1-of-4">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="collapse px-5" id="collapseExample">
                                                        <div class="grid">
                                                            <div class="grid_col">
                                                                <p class="no--margin"><strong>Details</strong></p>
                                                                <p class="mb-3">Our lead product candidate, neridronate,
                                                                    is a differentiated, third-generation bisphosphonate
                                                                    is a potential disease modifying therapy for
                                                                    patients with warm CRPS-1. </p>
                                                                <p class="mb-3">The FDA has awarded neridronate, a
                                                                    unique bisphosphonate, Breakthrough Therapy, Fast
                                                                    Track, and Orphan Drug designations reflecting the
                                                                    high unmet need for a CRPS-1 treatment. </p>
                                                                <p class="mb-3">CRPS-RISE is our single, Phase 3,
                                                                    pivotal study to evaluate neridronate in patients
                                                                    with CPRS-1. Neridronate will be administered
                                                                    intravenously (IV) in a single cycle of 4 infusions
                                                                    during a consecutive 10-day period. The goal is to
                                                                    demonstrate neridronate’s ability to safely reduce
                                                                    pain and improve quality of life. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                </div>
                            </div>
                        </div>
                    </span>
            </div>
        </div>
    </section>

<?php if ($steps_displayed !== "No"): ?>
    <section class="steps">
        <div class="container">
            <div class="steps_block">
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
                                <h3 class="step_title">
                                    <a href="/science">
                                        <?php echo esc_html($step['title']); ?>
                                    </a>
                                </h3>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
<?php endif; ?>

<?php if ($team_displayed !== "No"): ?>
    <section id="team" class="team">
        <div class="container">
            <div class="team_block">
                <div class="team_top">
                    <h2><?= $team_title ?></h2>
                    <div class="team_buttons">
                        <div class="team_prev swiper_btn prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path d="M9 18L15 12L9 6" stroke="#0F161D" stroke-width="1.4" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="team_next swiper_btn next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path d="M9 18L15 12L9 6" stroke="#0F161D" stroke-width="1.4" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper teamSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card_header">
                                <div class="card_img">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/team1.png"
                                         alt="team1">
                                </div>
                            </div>
                            <div class="card_body">
                                <h3 class="card_title">Keith Katkin</h3>
                                <div class="card_caption">Executive Chairman</div>
                                <ul>
                                    <li>
                                        <div class="card_list_style">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                 viewBox="0 0 10 10" fill="none">
                                                <path d="M0 10H10L0 0V10Z" fill="url(#paint0_linear_4001_34)"/>
                                                <defs>
                                                    <linearGradient id="paint0_linear_4001_34" x1="0" y1="9.96794"
                                                                    x2="10" y2="9.96794" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#47A3C7"/>
                                                        <stop offset="1" stop-color="#A3DBEB"/>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </div>
                                        <span>CEO of Urovant through $584 million acquisition by Sumitomo
                                                Dainippon Pharma</span>
                                    </li>
                                    <li>
                                        <div class="card_list_style">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                 viewBox="0 0 10 10" fill="none">
                                                <path d="M0 10H10L0 0V10Z" fill="url(#paint0_linear_4001_34)"/>
                                                <defs>
                                                    <linearGradient id="paint0_linear_4001_34" x1="0" y1="9.96794"
                                                                    x2="10" y2="9.96794" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#47A3C7"/>
                                                        <stop offset="1" stop-color="#A3DBEB"/>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </div>
                                        <span>CEO of Avanir Pharmaceuticals through $3.5 billion acquisition by
                                                Otsuka</span>
                                    </li>
                                    <li>
                                        <div class="card_list_style">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                 viewBox="0 0 10 10" fill="none">
                                                <path d="M0 10H10L0 0V10Z" fill="url(#paint0_linear_4001_34)"/>
                                                <defs>
                                                    <linearGradient id="paint0_linear_4001_34" x1="0" y1="9.96794"
                                                                    x2="10" y2="9.96794" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#47A3C7"/>
                                                        <stop offset="1" stop-color="#A3DBEB"/>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </div>
                                        <span>Head of Corp Dev of Peninsula Pharmaceuticals through $245 million
                                                acquisition by J&J</span>
                                    </li>
                                    <li>
                                        <div class="card_list_style">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                 viewBox="0 0 10 10" fill="none">
                                                <path d="M0 10H10L0 0V10Z" fill="url(#paint0_linear_4001_34)"/>
                                                <defs>
                                                    <linearGradient id="paint0_linear_4001_34" x1="0" y1="9.96794"
                                                                    x2="10" y2="9.96794" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#47A3C7"/>
                                                        <stop offset="1" stop-color="#A3DBEB"/>
                                                    </linearGradient>
                                                </defs>
                                            </svg>
                                        </div>
                                        <span>Board of Directors at Eledon Pharmaceuticals (chairman), Emergent
                                                BioSolutions, and Syndax Pharmaceuticals</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card_footer">
                                <ul class="card_logos">
                                    <li class="card_logo">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/logos/urovant.png"
                                             alt="">
                                    </li>
                                    <li class="card_logo">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/logos/avanir.png"
                                             alt="">
                                    </li>
                                    <li class="card_logo">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/logos/peninsula.png"
                                             alt="">
                                    </li>
                                    <li class="card_logo">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/logos/eledon.png"
                                             alt="">
                                    </li>
                                    <li class="card_logo">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/logos/emergent.png"
                                             alt="">
                                    </li>
                                    <li class="card_logo">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/logos/syndax.png"
                                             alt="">
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <?php
                    $team_query = new WP_Query([
                        'post_type' => 'team',
                        'posts_per_page' => -1,
                    ]);

                    if ($team_query->have_posts()): ?>
                        <?php while ($team_query->have_posts()): $team_query->the_post(); ?>
                            <div class="swiper-slide">
                                <div class="card">
                                    <div class="card_header">
                                        <div class="card_img">
                                            <?php if (has_post_thumbnail()): ?>
                                                <?php the_post_thumbnail('medium'); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="card_body">
                                        <h3 class="card_title"><?php the_title(); ?></h3>

                                        <?php if ($position = get_field('position')): ?>
                                            <div class="card_caption"><?php echo esc_html($position); ?></div>
                                        <?php endif; ?>

                                        <?php if (have_rows('facilities')): ?>
                                            <ul>
                                                <?php while (have_rows('facilities')): the_row(); ?>
                                                    <?php if ($text = get_sub_field('text')): ?>
                                                        <li>
                                                            <div class="card_list_style">
                                                                <!-- SVG icon -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                                                     viewBox="0 0 10 10" fill="none">
                                                                    <path d="M0 10H10L0 0V10Z" fill="url(#paint0_linear_4001_34)"/>
                                                                    <defs>
                                                                        <linearGradient id="paint0_linear_4001_34" x1="0" y1="9.96794"
                                                                                        x2="10" y2="9.96794" gradientUnits="userSpaceOnUse">
                                                                            <stop stop-color="#47A3C7"/>
                                                                            <stop offset="1" stop-color="#A3DBEB"/>
                                                                        </linearGradient>
                                                                    </defs>
                                                                </svg>
                                                            </div>
                                                            <span><?php echo esc_html($text); ?></span>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endwhile; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>

                                    <?php if ($companies = get_field('companies')): ?>
                                        <div class="card_footer">
                                            <ul class="card_logos">
                                                <?php foreach ($companies as $company): ?>
                                                    <li class="card_logo">
                                                        <?php echo get_the_post_thumbnail($company->ID, 'thumbnail'); ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    </section>
<?php endif; ?>

<?php if ($news_displayed !== "No"): ?>
    <section id="news" class="team">
        <div class="container">
            <div class="team_block">
                <div class="team_top">
                    <h2><?= $news_title ?></h2>
                    <div class="team_buttons">
                        <div class="news_prev swiper_btn prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path d="M9 18L15 12L9 6" stroke="#0F161D" stroke-width="1.4" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="news_next swiper_btn next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none">
                                <path d="M9 18L15 12L9 6" stroke="#0F161D" stroke-width="1.4" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper newsSwiper">
                <div class="swiper-wrapper">
                    <?php
                    $news_query = new WP_Query([
                        'post_type'      => 'post',
                        'posts_per_page' => 6, // nechta chiqishini o'zingiz belgilang
                    ]);

                    if ($news_query->have_posts()): ?>
                        <?php while ($news_query->have_posts()): $news_query->the_post(); ?>
                            <div class="swiper-slide">
                                <div class="card">
                                    <div class="card_header">
                                        <div class="card_img">
                                            <?php if (has_post_thumbnail()): ?>
                                                <?php the_post_thumbnail('medium'); ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="card_body">
                                        <h3 class="card_title"><?php the_title(); ?></h3>

                                        <?php if ($short = get_field('short_description')): ?>
                                            <div class="card_caption"><?php echo esc_html($short); ?></div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="card_footer">
                                        <div class="d-flex justify-content-between">
                                            <div class="card_date">
                                                <!-- calendar svg -->
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none">
                                                    <path d="M19 4H5C3.89543 4 3 4.89543 3 6V20C3 21.1046 3.89543 22 5 22H19C20.1046 22 21 21.1046 21 20V6C21 4.89543 20.1046 4 19 4Z"
                                                          stroke="#0F161D" stroke-width="1.4" stroke-linecap="round"
                                                          stroke-linejoin="round"/>
                                                    <path d="M16 2V6" stroke="#0F161D" stroke-width="1.4"
                                                          stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M8 2V6" stroke="#0F161D" stroke-width="1.4"
                                                          stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M3 10H21" stroke="#0F161D" stroke-width="1.4"
                                                          stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                <?php if ($date = get_field('date')): ?>
                                                    <span><?php echo esc_html($date); ?></span>
                                                <?php endif; ?>
                                            </div>

                                            <a href="<?php the_permalink(); ?>" class="card_more">
                                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/arrow-down-right.svg" alt="arrow">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_postdata(); ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    </section>
<?php endif; ?>


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

    <!-- ==== TRIGGER ==== -->
    <!-- <button class="btn_open_modal" data_modal_target="#success_modal">Open modal</button> -->

    <!-- ==== MODAL ==== -->
    <div id="success_modal" class="modal_container" role="dialog" aria-modal="true" aria-hidden="true">
        <div class="modal_backdrop"></div>

        <div class="modal_dialog" role="document" aria-labelledby="demo_modal_title">
            <button type="button" class="close" aria-label="Close" title="Close">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.svg" alt="close">
            </button>


            <div class="modal_body">
                <div class="modal_message success">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/check.svg" alt="success">
                </div>
                <div class="modal_title">Thank you for your request!</div>
                <p class="modal_text">We will contact you shortly</p>
            </div>
        </div>
    </div>


<?php get_footer();