<?php
/**
 * Template Name: Page d'accueil
 * Description: Page d'accueil personnalisée pour le portfolio.
 */

get_header(); ?>

<!-- Section principale (Hero Section) -->
<div class="hero-section">
    <?php
    $hero_image = get_theme_mod('hero_background_image');
    $hero_video = get_theme_mod('hero_background_video');
    ?>

    <?php if ($hero_video): ?>
        <!-- Fond Vidéo -->
        <video autoplay muted loop playsinline class="hero-background">
    <source src="<?php echo esc_url($hero_video); ?>" type="video/mp4">
    Votre navigateur ne supporte pas la vidéo.
</video>

    <?php elseif ($hero_image): ?>
        <!-- Fond Image -->
        <div class="hero-background" style="background-image: url('<?php echo esc_url($hero_image); ?>');"></div>
    <?php else: ?>
        <!-- Fond par défaut -->
        <div class="hero-background" style="background-color: #00021C;"></div>
    <?php endif; ?>

    <!-- Logo SVG -->
    <div class="hero-logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/logo-oli.svg" alt="Logo OT">
    </div>

    <!-- Texte animé -->
    <div class="hero-greeting">
        <h1 class="animated-greeting">Salut, c'est Oliventhan !</h1>
    </div>

    <!-- Contenu centré -->
    <div class="hero-content">
        <h2 class="hero-title">Communicant</h2>
        <div class="hero-buttons">
        <a href="<?php echo get_template_directory_uri(); ?>/assets/cv_thamilselvan.pdf" class="btn" download>Voir mon CV</a>
        <a href="<?php echo esc_url(home_url('/qui-suis-je')); ?>" class="btn btn-secondary">Savoir plus</a>
            </div>
    </div>
</div>


<!-- Section Qui suis-je -->
<div class="qui-suis-je">
    <h2>Qui suis-je?</h2>
    <div class="qui-suis-je-icons">
        <!-- Icône BUT MMI -->
        <div class="icon-box">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icon-graduate.svg" alt="Diplôme">
            <p>BUT MMI</p>
        </div>
        <!-- Icône Anniversaire -->
        <div class="icon-box">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icon-cake.svg" alt="Anniversaire">
            <p>20 ans</p>
        </div>
        <!-- Icône Localisation -->
        <div class="icon-box">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/icon-location.svg" alt="Localisation">
            <p>Montbéliard</p>
        </div>
    </div>
</div>

<div class="mes-competences">
    <h2>Mes Compétences</h2>
    <div class="carousel-container">
        <div class="carousel-track">
            <!-- 10 Icônes originales -->
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_ps.svg" alt="Photoshop">
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_ai.svg" alt="Illustrator">
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_id.svg" alt="InDesign">
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_pr.svg" alt="Premiere Pro">
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_lr.svg" alt="Lightroom">
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_ae.svg" alt="After Effects">
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_figma.svg" alt="Figma">
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_davinci.svg" alt="Da Vinci">
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_wordpress.svg" alt="Wordpress">
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_vuejs.svg" alt="VueJS">
            </div>

            <!-- DUPLICATION des 10 icônes -->
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_ps.svg" alt="Photoshop">
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_ai.svg" alt="Illustrator">
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_id.svg" alt="InDesign">
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_pr.svg" alt="Premiere Pro">
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_lr.svg" alt="Lightroom">
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_ae.svg" alt="After Effects">
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_figma.svg" alt="Figma">
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_davinci.svg" alt="Da Vinci">
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_wordpress.svg" alt="Wordpress">
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_vuejs.svg" alt="VueJS">
            </div>
        </div>
    </div>
</div>

<!-- Section des projets avec filtres -->
<div class="section-projets-reduits">
    <h2 class="section-title">Mes Projets</h2>

    <!-- Boutons de filtres -->
    <div class="projet-filters">
        <button class="filter-button active" data-filter="all">Tous</button>
        <?php
        $types = get_terms('type_projet');
        if (!empty($types) && !is_wp_error($types)) {
            foreach ($types as $type) {
                echo '<button class="filter-button" data-filter="' . esc_attr($type->slug) . '">' . esc_html($type->name) . '</button>';
            }
        }
        ?>
    </div>

    <!-- Grille des projets -->
    <div class="small-projets-cards">
        <?php
        $args = array(
            'post_type'      => 'projets',
            'posts_per_page' => -1, // Tous les projets
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                $types = get_the_terms(get_the_ID(), 'type_projet');
                $type_classes = '';
                if ($types && !is_wp_error($types)) {
                    foreach ($types as $type) {
                        $type_classes .= ' ' . esc_attr($type->slug);
                    }
                }
        ?>
            <div class="small-projet-card<?php echo $type_classes; ?>" data-type="<?php echo trim($type_classes); ?>">
                <a href="<?php the_permalink(); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="small-projet-image">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="small-projet-info">
                        <h4><?php the_title(); ?></h4>
                        <p class="projet-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                    </div>
                </a>
            </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
</div>

<!-- Section Intéressé -->
<div class="interesse-section">
    <h2 class="interesse-title">Intéressé?</h2>
    <div class="interesse-buttons">
    <a href="<?php echo get_template_directory_uri(); ?>/assets/cv_thamilselvan.pdf" class="btn" download>Voir mon CV</a>
    <a href="<?php echo esc_url(home_url('/qui-suis-je')); ?>" class="btn btn-secondary">Voir plus</a>
        </div>
</div>


<?php get_footer(); ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.filter-button');
    const cards = document.querySelectorAll('.small-projet-card');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const filter = this.getAttribute('data-filter');

            // Retirer la classe active des autres boutons
            buttons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            // Filtrer les projets
            cards.forEach(card => {
                const cardTypes = card.getAttribute('data-type').split(' ');
                if (filter === 'all' || cardTypes.includes(filter)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>


