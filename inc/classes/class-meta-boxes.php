<?php
/**
 * Meta boxes Class file.
 * 
 * @package theminimal
 */

namespace THEMINIMAL_THEME\Inc;
use THEMINIMAL_THEME\Inc\Traits\Singleton;

Class Meta_Boxes {
    Use Singleton;

    protected function __construct() {
        
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        add_action( 'add_meta_boxes', [$this, 'hide_title_meta_box'] );
        add_action( 'save_post', [ $this, 'save_post_meta_data' ] );
    }

    public function hide_title_meta_box() { //Funzione che aggiunge metabox per nascondere titolo post
        $screens = ['post']; //post-type per il metabox

        foreach( $screens as $screen ) {
            add_meta_box(
                'hide-page-title', //id univoco
                __( 'Nascondi titolo', 'theminimal' ), //Titolo meta box
                [ $this, 'hide_title_meta_box_html' ], //Callback che inserisce il contenuto
                $screen, //Post type metabox
                'side' //Faccio apparire box nella parte destra dell'editor
            );
        }
    }

    public function hide_title_meta_box_html( $post ) {
        $value = get_post_meta( $post->ID, '_hide_page_title', true );
        wp_nonce_field( plugin_basename(__FILE__), 'hide_title_meta_box_nonce' ); //Definisco nonce per form
        ?>

        <p for="theminimal-hide-title-box"><?php esc_html_e( 'Nascondi titolo della pagina' , 'theminimal'); ?></p>
        <label for="theminimal-hide-title-radio-yes">Yes</label> 
        <input type="radio" id="theminimal-hide-title-radio-yes" name="theminimal-hide-title-radio" value="yes" <?php echo ($value =='yes') ?'checked':'' ?>>
        <label for="theminimal-hide-title-radio-no">No</label>
        <input type="radio" id="theminimal-hide-title-radio-no" name="theminimal-hide-title-radio" value="no" <?php echo ($value =='no' || $value == "") ?'checked':'' ?>>
    
    <?php
    }

    public function save_post_meta_data( $post_id ) {
        if( !current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
        
        $nonce_ver = wp_verify_nonce( $_POST['hide_title_meta_box_nonce'], plugin_basename(__FILE__) ); //verifico validità nonce

        if( array_key_exists( 'theminimal-hide-title-radio', $_POST ) ) {
            update_post_meta(
                $post_id,
                '_hide_page_title',
                $_POST['theminimal-hide-title-radio'],
            );
        }
    }
}