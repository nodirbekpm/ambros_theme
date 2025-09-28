<?php
/**
 * Template Name: Privacy Policy
 * Description: Renders only the page content entered in admin (no extra wrappers/titles).
 */

get_header(); ?>
    </div>

    <style>
        h2, h3, p{
            margin-bottom: 20px;
        }
    </style>

    <div class="container mt-5">
        <?php

        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
        ?>
    </div>

<?php get_footer();
