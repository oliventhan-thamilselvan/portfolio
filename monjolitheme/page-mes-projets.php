<?php
/**
 * Template Name: Mes Projets
 * Description: Une page personnalisée pour afficher tous les projets sous forme de cartes avec filtres.
 */

get_header(); ?>

<div class="projets-page">

    <!-- Affichage de l'image en haut si une image à la une est définie -->
    <?php if (has_post_thumbnail()) : ?>
        <div class="header-image">
            <?php the_post_thumbnail('full', ['class' => 'header-image-full']); ?>
        </div>
    <?php endif; ?>

    <!-- Titre de la page -->
    <h1 class="page-title">Mes Projets</h1>

    <!-- Boutons de filtres -->
    <div class="projet-filters">
        <!-- Bouton pour afficher tous les projets -->
        <a href="<?php echo esc_url(get_permalink()); ?>" class="filter-button <?php echo empty(get_query_var('type_projet')) ? 'active' : ''; ?>">Tous</a>
        <?php
        // Récupération des types de projets (taxonomie)
        $types = get_terms('type_projet');
        if (!empty($types) && !is_wp_error($types)) {
            foreach ($types as $type) {
                $is_active = (get_query_var('type_projet') == $type->slug) ? 'active' : '';
                echo '<a href="' . esc_url(add_query_arg('type_projet', $type->slug)) . '" class="filter-button ' . $is_active . '">' . esc_html($type->name) . '</a>';
            }
        }
        ?>
    </div>

    <!-- Conteneur des projets -->
    <div class="projets-cards">
        <?php
        // Détermine le type de projet sélectionné
        $type_selected = get_query_var('type_projet');

        // Arguments pour la requête WP_Query
        $args = array(
            'post_type' => 'projets',
            'posts_per_page' => -1,
            'tax_query' => array(),
        );

        if (!empty($type_selected)) {
            $args['tax_query'][] = array(
                'taxonomy' => 'type_projet',
                'field' => 'slug',
                'terms' => $type_selected,
            );
        }

        // Exécute la requête
        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
                <div class="projet-card">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="projet-image">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                        <?php endif; ?>
                        <div class="projet-info">
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        </div>
                    </a>
                </div>
            <?php endwhile;
        else : ?>
            <p>Aucun projet trouvé pour cette catégorie.</p>
        <?php endif;

        wp_reset_postdata(); ?>
    </div>
</div>

<?php get_footer(); ?>
