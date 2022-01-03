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

    protected function __constructor() {
        //Carico classi
        Assets::get_instance();

        $this->set_hooks();
    }

    protected function setup_hooks() {
        
    }
}