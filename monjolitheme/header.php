<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
    <div class="container">
        <!-- Logo -->
        <div class="logo">
    <a href="<?php echo home_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/logo-oli.svg" alt="Logo" class="logo-svg">
    </a>
</div>





        <!-- Menu Hamburger -->
        <div class="hamburger-menu">
            <button id="hamburger-toggle" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <!-- Menu -->
        <nav class="main-menu">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'menu_class' => 'menu-items',
                'container' => false,
            ]);
            ?>
        </nav>
    </div>
</header>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const hamburgerToggle = document.getElementById('hamburger-toggle');
        const mainMenu = document.querySelector('.main-menu');
        hamburgerToggle.addEventListener('click', function () {
            mainMenu.classList.toggle('menu-open');
        });
    });
</script>
