<?php
/**
 * Functions file.
 * 
 * @package theminimal
 */

if( !defined( 'THEMINIMAL_DIR_PATH' ) ) { //Se la costante con la path della directory non è ancora definito
    define( 'THEMINIMAL_DIR_PATH', untrailingslashit( get_template_directory() ) ); //Definisco costante
}

if( !defined( 'THEMINIMAL_DIR_URI' ) ) { //Se la costante con l'uri della directory non è ancora definito
    define( 'THEMINIMAL_DIR_URI', untrailingslashit( get_template_directory_uri() ) ); //Definisco costante
}

if( !defined( 'THEMINIMAL_BUILD_URI' ) ) { //Se la costante con l'uri della directory non è ancora definito
    define( 'THEMINIMAL_BUILD_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build' ); //Definisco costante
}

if( !defined( 'THEMINIMAL_BUILD_JS_URI' ) ) { //Se la costante con l'uri della directory non è ancora definito
    define( 'THEMINIMAL_BUILD_JS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/js' ); //Definisco costante
}

if( !defined( 'THEMINIMAL_BUILD_JS_DIR_PATH' ) ) { //Se la costante con la path della directory non è ancora definito
    define( 'THEMINIMAL_BUILD_JS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/js' ); //Definisco costante
}

if( !defined( 'THEMINIMAL_BUILD_IMG_URI' ) ) { //Se la costante con la path della directory non è ancora definito
    define( 'THEMINIMAL_BUILD_IMG_URI', untrailingslashit( get_template_directory() ) . '/assets/build/src/img' ); //Definisco costante
}

if( !defined( 'THEMINIMAL_BUILD_CSS_URI' ) ) { //Se la costante con la path della directory non è ancora definito
    define( 'THEMINIMAL_BUILD_CSS_URI', untrailingslashit( get_template_directory_uri() ) . '/assets/build/css' ); //Definisco costante
}

if( !defined( 'THEMINIMAL_BUILD_CSS_DIR_PATH' ) ) { //Se la costante con la path della directory non è ancora definito
    define( 'THEMINIMAL_BUILD_CSS_DIR_PATH', untrailingslashit( get_template_directory() ) . '/assets/build/css' ); //Definisco costante
}

require_once THEMINIMAL_DIR_PATH . '/inc/helpers/autoloader.php';
require_once THEMINIMAL_DIR_PATH . '/inc/helpers/template-tags.php';

function theminimal_get_theme_instance() { //Funzione che prende istanza classe da file class-theminimal-theme
    \THEMINIMAL_THEME\Inc\THEMINIMAL_THEME::get_instance();
}

theminimal_get_theme_instance();