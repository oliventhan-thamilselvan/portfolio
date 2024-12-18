<?php 
  function thememonsite_setup() {
    // Ajout du support pour les images mises en avant
    add_theme_support( 'post-thumbnails' );
    // Ajout du support pour le titre du site
    add_theme_support( 'title-tag' );
    // Ajout du support pour rendre le code valide en HTML 5
    add_theme_support( 
      'html5', 
      array( 
        'comment-list', 
        'comment-form', 
        'search-form', 
        'gallery', 
        'caption',
        'style',
        'script'
      )
    );
    // Ajout du support pour les menus
    register_nav_menus( 
      array(
        'main' => 'Menu Principal',
        'footer' => 'Menu footer'
      )
    );
  }
  add_action( 'after_setup_theme', 'thememonsite_setup' );

function mon_theme_enqueue_styles() {
    wp_enqueue_style('main-style', get_stylesheet_uri(), array(), time()); // Force la mise à jour avec un timestamp
}
add_action('wp_enqueue_scripts', 'mon_theme_enqueue_styles');



// Création du Custom Post Type "Projets"
function register_projet_cpt() {
  $labels = array(
      'name' => 'Projets',
      'singular_name' => 'Projet',
      'add_new' => 'Ajouter un nouveau projet',
      'add_new_item' => 'Ajouter un projet',
      'edit_item' => 'Modifier le projet',
      'new_item' => 'Nouveau projet',
      'view_item' => 'Voir le projet',
      'search_items' => 'Rechercher un projet',
      'not_found' => 'Aucun projet trouvé',
      'not_found_in_trash' => 'Aucun projet trouvé dans la corbeille',
      'all_items' => 'Tous les projets',
  );

  $args = array(
      'labels' => $labels,
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'projets'),
      'menu_icon' => 'dashicons-portfolio',
      'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
  );

  register_post_type('projets', $args);
}
add_action('init', 'register_projet_cpt');

// Création de la Taxonomie "Type de Projets"
function register_projet_taxonomy() {
  $labels = array(
      'name' => 'Types de projets',
      'singular_name' => 'Type de projet',
      'search_items' => 'Rechercher des types de projets',
      'all_items' => 'Tous les types de projets',
      'edit_item' => 'Modifier le type de projet',
      'update_item' => 'Mettre à jour le type de projet',
      'add_new_item' => 'Ajouter un nouveau type de projet',
      'new_item_name' => 'Nom du nouveau type de projet',
      'menu_name' => 'Types de projets',
  );

  $args = array(
      'labels' => $labels,
      'hierarchical' => true,
      'show_admin_column' => true,
      'rewrite' => array('slug' => 'type-projet'),
  );

  register_taxonomy('type_projet', 'projets', $args);
}
add_action('init', 'register_projet_taxonomy');

// Ajout des Meta Boxes pour les projets
function projets_add_custom_meta_boxes() {
    add_meta_box(
        'projets_details',           // ID de la Meta Box
        'Détails du Projet',         // Titre
        'projets_render_meta_box',   // Fonction de rendu
        'projets',                   // Post Type
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'projets_add_custom_meta_boxes');

// Rendu de la Meta Box avec champs uploadables
function projets_render_meta_box($post) {
    wp_nonce_field('projets_save_meta_box_data', 'projets_meta_box_nonce');
    $texte_principal = get_post_meta($post->ID, '_projets_texte_principal', true);
    $texte_secondaire = get_post_meta($post->ID, '_projets_texte_secondaire', true);
    $image_principale = get_post_meta($post->ID, '_projets_image_principale', true);
    $image_secondaire = get_post_meta($post->ID, '_projets_image_secondaire', true);
    $lien_maquette = get_post_meta($post->ID, '_projets_lien_maquette', true);
    $lien_site = get_post_meta($post->ID, '_projets_lien_site', true);
    ?>
    <p>
        <label for="projets_texte_principal">Texte Principal :</label><br>
        <textarea name="projets_texte_principal" rows="4" style="width: 100%;"><?php echo esc_textarea($texte_principal); ?></textarea>
    </p>

    <p>
        <label for="projets_image_principale">Image Principale :</label><br>
        <input type="hidden" name="projets_image_principale" id="projets_image_principale" value="<?php echo esc_attr($image_principale); ?>">
        <button type="button" class="button upload-image-button" data-target="projets_image_principale">Uploader une Image</button>
        <?php if ($image_principale): ?>
            <br><img src="<?php echo esc_url($image_principale); ?>" style="max-width: 300px;">
        <?php endif; ?>
    </p>

    <p>
        <label for="projets_texte_secondaire">Texte Secondaire :</label><br>
        <textarea name="projets_texte_secondaire" rows="4" style="width: 100%;"><?php echo esc_textarea($texte_secondaire); ?></textarea>
    </p>

    <p>
        <label for="projets_image_secondaire">Image Secondaire :</label><br>
        <input type="hidden" name="projets_image_secondaire" id="projets_image_secondaire" value="<?php echo esc_attr($image_secondaire); ?>">
        <button type="button" class="button upload-image-button" data-target="projets_image_secondaire">Uploader une Image</button>
        <?php if ($image_secondaire): ?>
            <br><img src="<?php echo esc_url($image_secondaire); ?>" style="max-width: 300px;">
        <?php endif; ?>
    </p>

    <p>
        <label for="projets_lien_maquette">Lien Maquette :</label><br>
        <input type="url" name="projets_lien_maquette" id="projets_lien_maquette" style="width: 100%;" value="<?php echo esc_url($lien_maquette); ?>">
    </p>

    <p>
        <label for="projets_lien_site">Lien Site :</label><br>
        <input type="url" name="projets_lien_site" id="projets_lien_site" style="width: 100%;" value="<?php echo esc_url($lien_site); ?>">
    </p>

    <script>
        jQuery(document).ready(function($) {
            $('.upload-image-button').click(function(e) {
                e.preventDefault();
                const button = $(this);
                const targetInput = $('#' + button.data('target'));
                const mediaUploader = wp.media({
                    title: 'Sélectionnez une image',
                    button: { text: 'Utiliser cette image' },
                    multiple: false
                }).on('select', function() {
                    const attachment = mediaUploader.state().get('selection').first().toJSON();
                    targetInput.val(attachment.url);
                    button.siblings('img').remove();
                    button.after('<br><img src="' + attachment.url + '" style="max-width:300px;">');
                }).open();
            });
        });
    </script>
    <?php
}

// Sauvegarde des Meta Boxes
function projets_save_meta_box_data($post_id) {
    if (!isset($_POST['projets_meta_box_nonce']) || !wp_verify_nonce($_POST['projets_meta_box_nonce'], 'projets_save_meta_box_data')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['projets_texte_principal'])) {
        update_post_meta($post_id, '_projets_texte_principal', sanitize_textarea_field($_POST['projets_texte_principal']));
    }

    if (isset($_POST['projets_texte_secondaire'])) {
        update_post_meta($post_id, '_projets_texte_secondaire', sanitize_textarea_field($_POST['projets_texte_secondaire']));
    }

    if (isset($_POST['projets_image_principale'])) {
        update_post_meta($post_id, '_projets_image_principale', esc_url_raw($_POST['projets_image_principale']));
    }

    if (isset($_POST['projets_image_secondaire'])) {
        update_post_meta($post_id, '_projets_image_secondaire', esc_url_raw($_POST['projets_image_secondaire']));
    }

    if (isset($_POST['projets_lien_maquette'])) {
        update_post_meta($post_id, '_projets_lien_maquette', esc_url_raw($_POST['projets_lien_maquette']));
    }

    if (isset($_POST['projets_lien_site'])) {
        update_post_meta($post_id, '_projets_lien_site', esc_url_raw($_POST['projets_lien_site']));
    }
}
add_action('save_post', 'projets_save_meta_box_data');



// Shortcode pour afficher les projets en version réduite
function display_small_projects_shortcode($atts) {
  ob_start(); // Démarre la capture du contenu

  // Arguments pour la requête WP_Query
  $args = array(
      'post_type'      => 'projets',
      'posts_per_page' => 6, // Affiche 6 projets (modifie si nécessaire)
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) : ?>
      <div class="small-projets-cards">
          <?php while ($query->have_posts()) : $query->the_post(); ?>
              <div class="small-projet-card">
                  <a href="<?php the_permalink(); ?>">
                      <?php if (has_post_thumbnail()) : ?>
                          <div class="small-projet-image">
                              <?php the_post_thumbnail('thumbnail'); ?>
                          </div>
                      <?php endif; ?>
                      <div class="small-projet-info">
                          <h4><?php the_title(); ?></h4>
                      </div>
                  </a>
              </div>
          <?php endwhile; ?>
      </div>
  <?php else : ?>
      <p>Aucun projet trouvé.</p>
  <?php endif;

  wp_reset_postdata(); // Réinitialise la requête WP

  return ob_get_clean(); // Renvoie le contenu capturé
}
add_shortcode('small_projects', 'display_small_projects_shortcode');

function hero_section_customizer($wp_customize) {
  // Section Hero Section
  $wp_customize->add_section('hero_section_options', array(
      'title'       => 'Hero Section',
      'description' => 'Personnalisez le fond de la Hero Section',
      'priority'    => 30,
  ));

  // Champ pour l'image de fond
  $wp_customize->add_setting('hero_background_image', array(
      'default'           => '',
      'sanitize_callback' => 'esc_url_raw',
  ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_image', array(
      'label'       => 'Image de Fond',
      'section'     => 'hero_section_options',
      'settings'    => 'hero_background_image',
      'description' => 'Téléchargez une image pour le fond de la Hero Section.',
  )));

  // Champ pour la vidéo de fond (upload)
  $wp_customize->add_setting('hero_background_video', array(
      'default'           => '',
      'sanitize_callback' => 'esc_url_raw',
  ));

  $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'hero_background_video', array(
      'label'       => 'Vidéo de Fond',
      'section'     => 'hero_section_options',
      'settings'    => 'hero_background_video',
      'description' => 'Téléchargez une vidéo MP4 pour le fond. La vidéo aura priorité sur l\'image.',
  )));
}
add_action('customize_register', 'hero_section_customizer');

// Gestion de l'envoi du formulaire de contact
function handle_contact_form_submission() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérification du nonce pour la sécurité
        if (!isset($_POST['contact_form_nonce']) || !wp_verify_nonce($_POST['contact_form_nonce'], 'contact_form_action')) {
            wp_redirect(home_url('/contact/?error=1'));
            exit;
        }

        // Récupération et sécurisation des champs
        $name    = sanitize_text_field($_POST['name']);
        $email   = sanitize_email($_POST['email']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);

        // Validation des champs obligatoires
        if (empty($name) || empty($email) || empty($subject) || empty($message)) {
            wp_redirect(home_url('/contact/?error=1'));
            exit;
        }

        // Adresse de destination et headers
        $to = 'tsoliventhan@gmail.com'; // Adresse où tu souhaites recevoir le message
        $mail_subject = "Nouveau message de $name via le formulaire de contact";
        $mail_body = "Nom : $name\nEmail : $email\n\nMessage :\n$message";

        // Configuration de l'en-tête "From" avec une adresse valide sur ton domaine
        $headers = array(
            'Content-Type: text/plain; charset=UTF-8',
            "From: $name <oliventhan.thamilselvan@edu.univ-fcomte.fr>", // Adresse expéditeur valide
            "Reply-To: $email" // L'adresse de réponse de l'utilisateur
        );

        // Envoi de l'e-mail
        if (wp_mail($to, $mail_subject, $mail_body, $headers)) {
            wp_redirect(home_url('/contact/?success=1'));
            exit;
        } else {
            wp_redirect(home_url('/contact/?error=1'));
            exit;
        }
    }
}

// Actions pour les utilisateurs connectés et non connectés
add_action('admin_post_nopriv_send_contact_form', 'handle_contact_form_submission'); // Utilisateurs non connectés
add_action('admin_post_send_contact_form', 'handle_contact_form_submission');       // Utilisateurs connectés
