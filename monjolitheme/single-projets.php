<?php get_header(); ?>

<div class="single-projet">
    <?php if (have_posts()) : while (have_posts()) : the_post();
        // Récupération des champs personnalisés
        $image_principale = get_post_meta(get_the_ID(), '_projets_image_principale', true);
        $image_secondaire = get_post_meta(get_the_ID(), '_projets_image_secondaire', true);
        $texte_principal = get_post_meta(get_the_ID(), '_projets_texte_principal', true);
        $texte_secondaire = get_post_meta(get_the_ID(), '_projets_texte_secondaire', true);
        $lien_maquette = get_post_meta(get_the_ID(), '_projets_lien_maquette', true);
        $lien_site = get_post_meta(get_the_ID(), '_projets_lien_site', true);
    ?>

        <!-- Ajout du Post Thumbnail en pleine largeur -->
        <?php if (has_post_thumbnail()) : ?>
            <div class="projet-thumbnail-fullwidth">
                <?php the_post_thumbnail('full', ['class' => 'projet-thumbnail-img']); ?>
            </div>
        <?php endif; ?>

        <!-- Titre du projet -->
        <h1><?php the_title(); ?></h1>

        <!-- Ajout de l'extrait -->
        <div class="projet-excerpt">
            <p><?php echo wp_trim_words(get_the_excerpt(), 2000); ?></p>
        </div>

        <!-- Boutons pour les liens -->
        <div class="projet-links">
            <?php if (!empty($lien_maquette)) : ?>
                <a href="<?php echo esc_url($lien_maquette); ?>" class="projet-button" target="_blank">Voir la Maquette</a>
            <?php endif; ?>
            <?php if (!empty($lien_site)) : ?>
                <a href="<?php echo esc_url($lien_site); ?>" class="projet-button" target="_blank">Visiter le Site</a>
            <?php endif; ?>
        </div>

        <!-- Contenu principal -->
        <div class="projet-content">
            <!-- Première section : Image + Texte -->
            <div class="projet-section">
                <?php if ($image_principale) : ?>
                    <div class="projet-image">
                        <img src="<?php echo esc_url($image_principale); ?>" alt="Image principale">
                    </div>
                <?php endif; ?>
                <div class="projet-text">
                    <p><?php echo nl2br(esc_html($texte_principal)); ?></p>
                </div>
            </div>

            <!-- Deuxième section : Texte + Image -->
            <div class="projet-section inverse">
                <?php if ($image_secondaire) : ?>
                    <div class="projet-image">
                        <img src="<?php echo esc_url($image_secondaire); ?>" alt="Image secondaire">
                    </div>
                <?php endif; ?>
                <div class="projet-text">
                    <p><?php echo nl2br(esc_html($texte_secondaire)); ?></p>
                </div>
            </div>
        </div>
    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>
