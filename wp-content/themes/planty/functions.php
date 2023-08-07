<?php
/**
 * Planty Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Planty
 * @since 1.0.0
 */

 // Inclure le fichier custom-menu.php

/**
 * Define Constants
 */
define( 'CHILD_THEME_PLANTY_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'planty-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_PLANTY_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

//********************************************************************** */ FONCTION ADMIN 




function ajouter_lien_admin_dans_menu( $items, $args ) {
    // Vérifier si l'utilisateur est connecté     spécifie l'emplacement du menu que l'on souhaite personnalise

    if ( is_user_logged_in() && $args->theme_location == 'primary' ) {
        // Récupérer le lien de l'interface d'administration WordPress  
        $admin_link = admin_url();
        // Ajouter le lien "Admin" dans le menu
        $items .= '<li id="menu-item-913"><a class="menu-link-admin" href="' . $admin_link . '">Admin</a></li>';
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'ajouter_lien_admin_dans_menu', 10, 2 );

















// Fonction pour masquer le lien "Admin" aux utilisateurs non connectés

// function masquer_lien_admin($items) {
//     if (is_user_logged_in()) {
//         return $items;
//     }

//     $admin_url = admin_url();
    
//     foreach ($items as $key => $item) {
//         if ($item->url === $admin_url) {
//             unset($items[$key]);
//             break;
//         }
//     }

//     return $items;
// }
// add_filter('wp_nav_menu_objects', 'masquer_lien_admin', 10, 2);


// function ajouter_lien_admin_dans_menu($items, $args) {
//     if (!is_user_logged_in()) {
//         return $items; // Ne pas ajouter le lien pour les utilisateurs non connectés
//     }

//     // Créez un nouvel objet d'élément de menu pour le lien "Admin"
//     $admin_link = array(
//         'title'            => 'Admin', // Texte affiché pour le lien
//         'url'              => admin_url(), // Lien vers le panneau d'administration
//         'menu_item_parent' => 0,
//         'ID'               => 9999, // Un ID unique pour l'élément de menu
//         'db_id'            => '',
    
//         'target'           => '',
        
//         'classes'          => array(),
//         'xfn'              => '',
//     );

//     // Définir la propriété "current" à false pour éviter l'avertissement
//     $admin_link['current'] = false;

//     // Ajoutez le nouvel élément de menu au début du tableau $items
//     array_unshift($items, (object) $admin_link);

//     return $items;
// }
// add_filter('wp_nav_menu_objects', 'ajouter_lien_admin_dans_menu', 10, 2);



// function ajouter_lien_admin_dans_menu($items, $args) {
//     if (!is_user_logged_in()) {
//         return $items; // Ne pas ajouter le lien pour les utilisateurs non connectés
//     }

//     // Créez un nouvel objet d'élément de menu pour le lien "Admin"
//     $admin_link = new stdClass();
//     $admin_link->title = 'Admin'; // Texte affiché pour le lien
//     $admin_link->url = admin_url(); // Lien vers le panneau d'administration
//     $admin_link->menu_item_parent = 0;
//     $admin_link->ID = 9999; // Un ID unique pour l'élément de menu

//     // Ajoutez le nouvel élément de menu au début du tableau $items
//     array_unshift($items, $admin_link);

//     return $items;
// }
// add_filter('wp_nav_menu_objects', 'ajouter_lien_admin_dans_menu', 10, 2);


// Fonction pour ajouter le lien "Admin" dans le menu
