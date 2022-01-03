<?php
/**
 * File per singleton
 * 
 * @package theminimal
 */

namespace THEMINIMAL_THEME\Inc\Traits;

trait Singleton {
    protected function __constructor() {
    }

    final protected function __clone() {}

    final public static function get_instance() { //funzione che ritorna istanza classe
        static $instance = []; //Array che contiene istanze
        $called_class = get_called_class();

        if( !isset( $instance[$called_class] )) {
            $instance[$called_class] = new $called_class();

            do_action( sprintf( 'theminimal_theme_singleton_init_$s', $called_class ) ); 
        }

        return $instance[$called_class];
    }
}