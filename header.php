<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri() ?>/assets/images/logo.png" />
    <!-- Шрифты -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/fonts/stylesheet.css">
    <!-- swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
    <!-- fontawesome -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/fonts/font.css">
    <!-- Css -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/main.css">
    <title>AMBROS</title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="wrapper">

    <!-- header -->
    <div class="hero">
        <header class="header" id="header">
            <div class="container-fluid">
                <div class="header_block">
                    <ul class="header_menus">
                        <div class="header_contact menu_item">
                            <a href="mailto:info@ambros.com">
                                <span>info@ambros.com</span>
                            </a>
                            <ul class="header_icons">
                                <li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/images/linkedin.svg" alt="linkedin"></a></li>
                                <li><a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/images/facebook.svg" alt="facebook"></a></li>
                                <li>
                                        <span class="header_close header_icon d-lg-none">
                                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/close.svg" alt="">
                                        </span>
                                </li>
                            </ul>
                        </div>
                        <li><a href="#">Science</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    <div class="header_logo">
                        <a href="#" class="logo">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo.svg" alt="">
                        </a>
                    </div>

                    <div class="header_contact">
                        <a class="header_email" href="mailto:info@ambros.com">
                            <span>info@ambros.com</span>
                        </a>
                        <ul class="header_icons">
                            <li class="header_linkedin"><a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/images/linkedin.svg" alt="linkedin"></a></li>
                            <li class="header_facebook"><a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/images/facebook.svg" alt="facebook"></a></li>
                            <li>
                                <!-- hamburger_mobile -->
                                <span class="hamburger_menu active header_icon d-lg-none">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/menu.svg" alt="">
                                    </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>