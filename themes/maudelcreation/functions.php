

<?php
include 'config_acf.php';
include 'config_cptui.php';

add_theme_support('title-tag');
add_theme_support('custom-logo');
add_theme_support('menus');
// Activer les images à la une
add_theme_support('post-thumbnails');
// Ajouter une taille d'image personnalisée pour les images à la une
add_image_size('custom-thumb', 300, 200, true); // Largeur : 300px, Hauteur : 200px, Crop : true

register_nav_menus([
    'main-menu' => 'Main navigation',
    'footer-menu' => 'Footer navigation'
]);

function my_theme_enqueue_styles() {
    // Enregistrer le style CSS compilé
    wp_enqueue_style( 'compiled-style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all' );
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css');
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function truncate_text($text, $length = 150) {
    if (strlen($text) <= $length) {
        return $text;
    }
    return substr($text, 0, $length) . '...';
}