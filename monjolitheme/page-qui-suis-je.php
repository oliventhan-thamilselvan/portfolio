<?php
/**
 * Template Name: Page Qui Suis-Je
 * Description: Une page personnalisée pour la section "Qui suis-je ?".
 */

get_header(); ?>

<!-- Contenu principal de la page -->
<div class="qui-suis-je-page">
    <!-- Titre de la section -->
    <h1 class="title">Qui suis-je?</h1>

    <!-- Contenu principal -->
    <div class="qui-suis-je-container">
        <!-- Image SVG -->
        <div class="qui-suis-je-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/oliphoto.svg" alt="Photo de profil">
        </div>

        <!-- Texte de présentation -->
        <div class="qui-suis-je-text">
            <p>Bienvenue sur mon portfolio !</p>
            <p>Je m'appelle <strong>Oliventhan Thamilselvan</strong>, étudiant en BUT Métiers du Multimédia et de l'Internet (MMI), spécialisé en stratégie de communication et design d'expérience.</p>
            <p>Cette formation m'a permis d'acquérir des compétences diversifiées dans le domaine du web, qu'il s'agisse de développement de sites web avec des outils comme <strong>VueJS</strong> ou des CMS comme <strong>WordPress</strong>, d'élaboration de stratégies de communication, ou encore de création de contenu pour le web.</p>
            <p>N'hésitez pas à me contacter via mon <strong>LinkedIn</strong>, par mail ou en utilisant directement le formulaire ci-dessous !</p>
            <p>Merci d'avoir visité mon portfolio et j'espère avoir l'occasion de collaborer avec vous très bientôt !</p>
        </div>
    </div>

    <!-- Liens Réseaux sociaux -->
    <div class="qui-suis-je-socials">
        <a href="https://www.linkedin.com/in/oliventhan-thamilselvan-a90167258/" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/linkedin.svg" alt="LinkedIn">
        </a>
        <a href="https://www.instagram.com/olixdesigns/" target="_blank">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/insta.svg" alt="Instagram">
        </a>
    </div>

    <!-- Section Expériences et Formations -->
<div class="experiences-formations">
<!-- Expériences Professionnelles -->
<div class="experience">
    <h2>Expériences professionnelles</h2>

    <!-- Première expérience -->
    <div class="experience-item">
        <!-- Icône SVG Expérience -->
        <div class="experience-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/u.svg" alt="Logo Super U">
        </div>
        <!-- Contenu Expérience -->
        <div class="experience-content">
            <h3>Employé polyvalent</h3>
            <p>Été 2022 / Été 2023</p>
            <ul>
                <li>Gestion et organisation du travail quotidien</li>
                <li>Réponse efficace aux objectifs fixés</li>
                <li>Acquisition rapide de nouvelles connaissances</li>
            </ul>
        </div>
    </div>

    <!-- Deuxième expérience -->
    <div class="experience-item">
        <!-- Icône SVG Expérience -->
        <div class="experience-icon">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/mjc.svg" alt="Logo MJC">
        </div>
        <!-- Contenu Expérience -->
        <div class="experience-content">
            <h3>Chargé de communication</h3>
            <p>2024 - Présent</p>
            <ul>
                <li>Élaboration de stratégies de communication efficaces</li>
                <li>Création et gestion de contenu pour les réseaux sociaux</li>
                <li>Organisation et promotion des événements locaux</li>
            </ul>
        </div>
    </div>
</div>


    <!-- Formations -->
    <div class="formation">
        <h2>Formations</h2>
        <div class="formation-item">
            <!-- Icône SVG Formation -->
            <div class="formation-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/diplome.svg" alt="Diplôme">
            </div>
            <!-- Contenu Formation 1 -->
            <div class="formation-content">
                <h3>Baccalauréat Générale</h3>
                <p>2022</p>
                <p>Spécialités Mathématiques et Anglais LLCE<br>Maths Expertes</p>
            </div>
        </div>

        <div class="formation-item">
            <!-- Icône SVG Formation -->
            <div class="formation-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/diplome.svg" alt="Diplôme">
            </div>
            <!-- Contenu Formation 2 -->
            <div class="formation-content">
                <h3>BUT : Métiers du multimédia et de l'internet</h3>
                <p>2022 - En cours</p>
                <p>Spécialisé en stratégie de communication et design d'expérience.</p>
            </div>
        </div>
    </div>
</div>

</div>

<?php get_footer(); ?>
