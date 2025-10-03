<?php wp_footer(); ?>
<!-- footer -->
<footer id="footer" class="footer">
    <div class="container">
        <div class="footer_main">
            <div class="footer_desc">
                <!-- Copyright -->
                <?php if ($copyright = get_field('copyright', 'option')): ?>
                    <?php echo esc_html($copyright); ?>
                <?php endif; ?>
            </div>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer_menu',
                'container'      => false,
                'menu_class'     => 'footer_menus',
                'depth'          => 1, // footerda dropdown kerak emas
            ]);
            ?>
            <!-- Socials -->
            <?php if (have_rows('socials', 'option')): ?>
                <ul class="footer_icons">
                    <?php while (have_rows('socials', 'option')): the_row();
                        $icon = get_sub_field('icon');
                        $link = get_sub_field('link');
                        ?>
                        <?php if ($link && $icon): ?>
                            <li>
                                <a href="<?php echo esc_url($link['url']); ?>"
                                   target="<?php echo esc_attr($link['target'] ?: '_self'); ?>">
                                    <img src="<?php echo esc_url($icon['url']); ?>"
                                         alt="<?php echo esc_attr($icon['alt'] ?: $link['title']); ?>">
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</footer>

<!-- PAGE LOADER -->
<div id="page_loader" class="page_loader" aria-hidden="false">
    <div class="loader_backdrop"></div>
    <div class="loader_dialog" role="status" aria-live="polite" aria-busy="true">
        <div class="loader_spinner" aria-label="Yuklanmoqda"></div>
        <p class="loader_text">Loading...</p>
    </div>
</div>
</div>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>
<!-- Juqery -->
<script src="<?php echo get_template_directory_uri() ?>/assets/libs/jquery-3.6.0.min.js"></script>
<!-- swiper -->
<script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
<!-- JS -->
<noscript>
    <style>
        /* JS o'chirilgan bo'lsa loader qolib ketmasin */
        #page_loader {
            display: none !important;
        }
    </style>
</noscript>
<script>
    (function () {
        var loader = document.getElementById('page_loader');

        // scrollni bloklash: yuklanishda
        document.addEventListener('DOMContentLoaded', function () {
            document.body.classList.add('no_scroll');
        });

        function hideLoader() {
            if (!loader) return;
            loader.classList.add('is_hidden');
            document.body.classList.remove('no_scroll');
        }

        // Sahifa to'liq (rasmlar, CSS) yuklanganda yopamiz
        window.addEventListener('load', function () {
            setTimeout(hideLoader, 150); // biroz yumshoqlik uchun
        });

        // Fallback: juda sekin tarmoqlarda ham qolib ketmasin
        setTimeout(hideLoader, 8000);
    })();
</script>

<!--Header-->
<script>
    (function () {
        const header = document.getElementById('header');
        if (!header) return;

        function getScrollY() {
            // Brauzerlar orasida moslashuvchan scroll olish
            return window.pageYOffset
                ?? document.documentElement.scrollTop
                ?? document.body.scrollTop
                ?? 0;
        }

        function onScroll() {
            header.classList.toggle('is-sticky', getScrollY() > 1);
        }

        // Dastlabki holat va listner
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', onScroll, { once: true });
        } else {
            onScroll();
        }
        window.addEventListener('scroll', onScroll, { passive: true });
    })();
</script>

<script src="<?php echo get_template_directory_uri() ?>/assets/js/modal.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/scripts.js"></script>
</body>

</html>