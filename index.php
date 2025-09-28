<?php
/**
 * Universal Index Template
 * - Bootstrap bilan chiroyli ko‘rinish
 * - Hech narsa topilmasa (qidiruv/arxivdan tashqari) bosh sahifaga yo‘naltirish
 * - Yo‘naltirish get_header()dan OLDIN bajariladi (headerlar yuborilishidan oldin)
 */

// Avval asosiy shartlarni tekshiramiz
$has_posts = have_posts();

// Qidiruv/arxiv bo'sh bo'lsa redirect qilmaymiz — xabar ko'rsatamiz.
// Home/front page ham redirect qilinmaydi (loopdan saqlanish).
$should_redirect = ( !$has_posts )
    && !is_home()
    && !is_front_page()
    && !is_search()
    && !is_archive();

// 404 bo'lsa ham (va home/front/search/archive bo'lmasa) redirect qilamiz
if ( $should_redirect || ( is_404() && !is_home() && !is_front_page() ) ) {
    wp_safe_redirect( home_url('/') , 302 );
    exit;
}

get_header();
?>
</div>
<main id="primary" class="site-main py-5">
    <div class="container">
        <?php if ( $has_posts ) : ?>
            <div class="row g-4">
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="col-md-6 col-lg-4">
                        <article id="post-<?php the_ID(); ?>" <?php post_class('card h-100 shadow-sm'); ?>>
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>" class="ratio ratio-16x9">
                                    <?php the_post_thumbnail('medium_large', ['class' => 'card-img-top object-fit-cover']); ?>
                                </a>
                            <?php endif; ?>

                            <div class="card-body d-flex flex-column">
                                <h2 class="h5 card-title">
                                    <a class="text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <p class="card-text text-muted small mb-3">
                                    <?php echo get_the_date(); ?> · <?php the_author(); ?>
                                </p>
                                <div class="card-text mb-3">
                                    <?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 22, '…' ) ); ?>
                                </div>
                                <div class="mt-auto">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary btn-sm">
                                        <?php esc_html_e('Batafsil', 'your-textdomain'); ?>
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php endwhile; ?>
            </div>

            <?php
            // Paginatsiya
            $pagination = get_the_posts_pagination([
                'mid_size'  => 2,
                'prev_text' => __('&laquo; Oldingi', 'your-textdomain'),
                'next_text' => __('Keyingi &raquo;', 'your-textdomain'),
            ]);
            if ( $pagination ) :
                ?>
                <div class="mt-5">
                    <?php echo $pagination; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                </div>
            <?php endif; ?>

        <?php else : ?>
            <?php
            // Qidiruv yoki arxiv bo'sh bo'lsa — xabar ko'rsatamiz (redirect emas)
            if ( is_search() || is_archive() || is_home() || is_front_page() ) : ?>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center">
                            <h1 class="h3 mb-3"><?php esc_html_e('Hech narsa topilmadi', 'your-textdomain'); ?></h1>
                            <p class="mb-4"><?php esc_html_e('Qidiruv so‘zingizni o‘zgartirib ko‘ring yoki bosh sahifaga qayting.', 'your-textdomain'); ?></p>
                            <a class="btn btn-primary" href="<?php echo esc_url( home_url('/') ); ?>">
                                <?php esc_html_e('Bosh sahifaga qaytish', 'your-textdomain'); ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
