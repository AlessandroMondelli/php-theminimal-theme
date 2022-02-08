<?php
/**
 * Classes file
 * 
 * @package theminimal 
 */

namespace THEMINIMAL_THEME\Inc;
use THEMINIMAL_THEME\Inc\Traits\Singleton;

class THEMINIMAL_THEME {
    use Singleton;

    protected function __construct() {
        //Carico classi
        Assets::get_instance();
        Menus::get_instance();
        Meta_Boxes::get_instance();
        Sidebars::get_instance();

        $this->set_hooks();
    }

    protected function set_hooks() {
        add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );
    }

    public function setup_theme() { 
        //Lista theme support
        add_theme_support('title-tag'); //Rendo disponibile la modifica del titolo da parte dell'utente
        add_theme_support('custom-logo', [
            'header-text' => [ 'site-title', 'site-description' ],
            'height' => 200,
            'width' => 400,
            'flex-height' => true,
            'flex-width' => true
        ]); //Rendo disponibile la possibilità di aggiungere un logo personalizzato
        
        add_theme_support( 'post-thumbnails' ); //Rendo disponibile il caricamento di thumbnails
        add_image_size( 'theminimal-thumbnail-size', 350, 233, true ); //Inserisco grandezza massima immagini in blog

        add_theme_support( 'customize-selective-refresh-widgets' ); //Rendo disponibile il caricamento di thumbnails
        add_theme_support( 'html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        ] ); //Rendo disponibile il caricamento di thumbnails
        add_theme_support( 'align-wide' ); //Aggiunge impostazioni di allineamento nell'editor
        
        //Aggiungo stile personalizzato ad editor @todo creare stile
        add_editor_style();

        //Aggiungo supporto a blocchi
        add_theme_support( 'wp-block-styles' );

        
    }
}