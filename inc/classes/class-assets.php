<?php
/**
 * Classi assets
 * 
 * @package theminimal
 */

namespace THEMINIMAL_THEME\Inc;
use THEMINIMAL_THEME\Inc\Traits\Singleton;

class Assets {
    use Singleton;

    protected function __constructor() {
        $this->set_hooks();
    }

    protected function set_hooks() { //Funzione che setta Actions e Filters
        //Aggiungo azioni ad hook wp_enqueue_script, $this rende possibile l'utilizzo di funzioni presenti nella stessa classe
        add_action( 'wp_enqueue_scripts', [$this, 'register_styles'] );
        add_action( 'wp_enqueue_scripts', [$this, 'register_scripts'] );
    }

    public function register_styles() { //Funzione che registra stili
        //Registro stili
        wp_register_style( 'style-css', get_stylesheet_uri(), [], filemtime(THEMINIMAL_DIR_PATH . '/style.css'), 'all' );
        wp_register_style( 'bootstrap-css', THEMINIMAL_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all' );

        //enqueue stili
        wp_enqueue_style( 'style-css' );
        wp_enqueue_style( 'bootstrap-css' );
    }

    public function register_scripts() { //Funzione che registra scripts
        //Registro script
        wp_register_script( 'main-js', THEMINIMAL_DIR_URI . '/assets/main.js', [], filemtime(get_template_directory() . '/assets/main.js'), true );
        wp_register_script( 'bootstrap-js', THEMINIMAL_DIR_URI . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, true);

        //enqueue scripts
        wp_enqueue_script( 'main-js' );
        wp_enqueue_script( 'bootstrap-js' );
    }
}