<?php wp_footer(); ?>
<!-- footer -->
<footer id="footer" class="footer">
    <div class="container">
        <div class="footer_main">
            <div class="footer_desc">
                <p>
                    © Copyright - Ambros Therapeutics, Inc.
                </p>
            </div>
            <ul class="footer_menus">
                <li>
                    <a href="#">Science</a>
                </li>
                <li>
                    <a href="#">Team</a>
                </li>
                <li>
                    <a href="#">About us</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
            <ul class="footer_icons">
                <li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/images/linkedin.svg" alt="linkedin"></a></li>
                <li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/images/facebook.svg" alt="facebook"></a></li>
            </ul>
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
<script src="<?php echo get_template_directory_uri() ?>/assets/js/modal.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/scripts.js"></script>
</body>

</html>