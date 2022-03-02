<?php
/**
 * Sidebars template file
 * 
 * @package theminimal
 */

namespace THEMINIMAL_THEME\Inc;
use THEMINIMAL_THEME\Inc\Traits\Singleton;

class Sidebars {
    use Singleton;

    protected function __construct() {
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        add_action( 'widgets_init', [ $this, 'theminimal_register_sidebars' ] );
    }

    public function theminimal_register_sidebars() {
        //Registro sidebar principale
        register_sidebar(
            [
                'name' => __( 'Main Sidebar', 'theminimal' ),
                'id' => 'sidebar-1',
                'description' => __( 'Main sidebar', 'theminimal' ),
                'before_widget' => '<div id="%1$s" class="theminimal-sidebar-widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="theminimal-widget-title>',
                'after_title' => '</h3>',
            ]
        );

        register_sidebar(
            [
                'name' => __( 'Footer Sidebar 1', 'theminimal' ),
                'id' => 'sidebar-2',
                'description' => __( 'Footer sidebar 1', 'theminimal' ),
                'before_widget' => '<div id="%1$s" class="theminimal-footer-widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="theminimal-footer-widget-title>',
                'after_title' => '</h3>',
            ]
        );
    }
}