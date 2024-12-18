<footer class="site-footer">
    <div class="container footer-container">
        <!-- Logo -->
        <div class="footer-logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo-oli.svg" alt="Logo">
            </a>
        </div>

        <!-- Menu -->
        <nav class="footer-menu">
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'menu_class' => 'footer-menu-items',
                'container' => false,
            ]);
            ?>
        </nav>
    </div>

    <!-- Copyright -->
    <div class="footer-copyright">
        <p>&copy; <?php echo date('Y'); ?> Oliventhan Thamilselvan</p>
    </div>
</footer>
