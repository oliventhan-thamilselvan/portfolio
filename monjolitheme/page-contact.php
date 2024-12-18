<?php
/**
 * Template Name: Page Contact
 * Description: Une page personnalisée pour le formulaire de contact.
 */

get_header(); ?>

<!-- Section principale de la page Contact -->
<div class="contact-page">
    <h1 class="contact-title">Contact</h1>
    <p class="contact-intro">
        N'hésitez pas à me joindre, que ce soit pour une question ou une proposition. Je m'engage à vous répondre au mieux ! 
        Vous pouvez également me contacter par téléphone au numéro suivant : <strong>07 67 96 16 33</strong>.
    </p>

    <!-- Liens Réseaux sociaux -->
    <div class="qui-suis-je-socials">
        <a href="https://www.linkedin.com/in/oliventhan-thamilselvan-a90167258/" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/linkedin.svg" alt="LinkedIn">
        </a>
        <a href="https://www.instagram.com/olixdesigns/" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/insta.svg" alt="Instagram">
        </a>
    </div>

    <!-- Messages de confirmation ou d'erreur -->
    <?php if (isset($_GET['success']) && $_GET['success'] == 1) : ?>
        <div class="success-message" style="color: green; font-weight: bold; margin: 20px 0;">
            Votre message a été envoyé avec succès. Merci de m'avoir contacté.
        </div>
    <?php elseif (isset($_GET['error']) && $_GET['error'] == 1) : ?>
        <div class="error-message" style="color: red; font-weight: bold; margin: 20px 0;">
            Une erreur s'est produite. Veuillez réessayer plus tard.
        </div>
    <?php endif; ?>

    <!-- Formulaire de contact -->
    <div class="contact-form">
        <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
            <?php wp_nonce_field('contact_form_action', 'contact_form_nonce'); ?>
            <input type="hidden" name="action" value="send_contact_form"> <!-- Correct action -->

            <!-- Champ Nom -->
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" placeholder="Votre nom" required>

            <!-- Champ Email -->
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="Votre e-mail" required>

            <!-- Champ Objet -->
            <label for="subject">Objet</label>
            <input type="text" id="subject" name="subject" placeholder="Objet du message" required>

            <!-- Champ Message -->
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" placeholder="Votre message" required></textarea>

            <!-- Bouton Envoyer -->
            <button type="submit" class="btn-send">ENVOYER</button>
        </form>
    </div>
</div>

<?php get_footer(); ?>
