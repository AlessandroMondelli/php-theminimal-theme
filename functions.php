<?php
/**
 * Functions file.
 * 
 * @package theminimal
 */

if( !defined( 'THEMINIMAL_DIR_PATH' ) ) { //Se la costante con la path della directory non è ancora definito
    define( 'THEMINIMAL_DIR_PATH', untrailingslashit( get_template_directory() ) ); //Definisco costante
}

require_once THEMINIMAL_DIR_PATH . '\inc\helpers\autoloader.php';


if( !defined( 'THEMINIMAL_DIR_URI' ) ) { //Se la costante con l'uri della directory non è ancora definito
    define( 'THEMINIMAL_DIR_URI', untrailingslashit( get_template_directory_uri() ) ); //Definisco costante
}

function theminimal_get_theme_instance() { //Funzione che prende istanza classe da file class-theminimal-theme
    \THEMINIMAL_THEME\Inc\THEMINIMAL_THEME::get_instance();
}

theminimal_get_theme_instance();