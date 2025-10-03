<?php
/**
 * Template Name: About
 * Description: About
 */
get_header();


// About
$about_title = get_field('about_title');
$about_text = get_field('about_text');
$about_link = get_field('about_link');
$about_displayed = get_field('about_displayed');

// Mission
$mission_title = get_field('mission_title');
$mission_texts = get_field('mission_texts');
$mission_displayed = get_field('mission_displayed');



?>

<main>
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
</main>



<?php get_footer();