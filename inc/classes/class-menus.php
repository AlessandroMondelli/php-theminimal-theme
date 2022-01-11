<?php
/**
 * Menu class file
 * 
 * @package theminimal
 */

namespace THEMINIMAL_THEME\Inc;

use THEMINIMAL_THEME\Inc\Traits\Singleton;

class Menus {
    use Singleton;

    protected function __construct() {
        $this->set_hooks(); //Aggiungo funzione set_hooks a costruttore
    }

    protected function set_hooks() {
        add_action( 'init', [ $this, 'register_menus' ] ); //Aggiungo action ad hook init, che eseguirà la funzione per registrare i menu
    }

    public function register_menus() { //Funzione che contiene un'altra funzione Wordpress, che permette di registrare i menu 
        register_nav_menus([
            'theminimal-header-menu' => esc_html__( 'Menu Header', 'theminimal' ), //Registro menu header
            'theminimal-footer-menu' => esc_html__( 'Menu Footer', 'theminimal' ), //Registro menu footer
        ]);
    }

    public function get_menu_id( $location ) { //Funzione che prende l'id del menu
        $locations = get_nav_menu_locations(); //Prendo tutte le location
        
        if( isset($locations[$location]) ) { //Controllo se il menu è assegnato
            $menu_id = $locations[$location]; //Prendo l'id del menu tramite la location
        }

        return !empty( $menu_id ) ? $menu_id : ''; //Ritorno l'id del menu se non è un valore vuoto
    }

    public function get_menu_child_items( $menu_array, $parent_id ) { //Funzione che prende voci di menu figlie
        $child_menu_list = [];

        if( !empty( $menu_array ) && is_array( $menu_array) ) {
            foreach( $menu_array as $menu_item ) {
                if( intval( $menu_item->menu_item_parent ) === $parent_id ) { //Confronto valore parent id, è una voce di sottomenu se il valore coincide
                    array_push($child_menu_list, $menu_item); //Inserisco valore in array
                }
            }
        }

        return $child_menu_list;
    }
}