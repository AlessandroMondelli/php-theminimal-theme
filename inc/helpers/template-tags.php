<?php
/**
 * Various functions
 * 
 * @package theminimal
 */

function get_the_post_custom_thumbnail( $post_id, $size, $additional_attributes = [] ) {
    $custom_thumbnail = '';

    if( $post_id === null ) { //Se la variabile passata risulta null
        $post_id =get_the_ID(); //recupero ID del post
    }

    if( has_post_thumbnail($post_id) ) { //Se il post ha la thumbnail
        $default_attributes = [ //Creo array con stringhe che rappresentano il lazy load
            'loading' => 'lazy',
        ];
    
        $attributes = array_merge( $additional_attributes, $default_attributes ); //Unisco array degli attributi

        $custom_thumbnail = wp_get_attachment_image( 
            get_post_thumbnail_id( $post_id ),
            $size,
            false,
            $attributes
        );

        return $custom_thumbnail;
    }
}

function the_post_custom_thumbnail( $size, $additional_attributes = [] ) {
    echo the_post_thumbnail( $size, $additional_attributes );
}

function theminimal_posted_on() { //Funzione che prende la data in cui è stato pubblicato un post
    $posted_date = '<time class="theminimal-posted-date published" datetime="%1$s">%2$s</time>';

    if( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) { //Controllo se è presente una data di modifica
        $posted_date = '<time class="theminimal-posted-date published" datetime="%1$s">%2$s</time><time class="post-update-date" style="display:none" datetime="%3$s">%4$s</time>';
    }

    $posted_date = sprintf(
        $posted_date,
        esc_attr( get_the_date( DATE_W3C ) ),
        esc_attr( get_the_date() ),
        esc_attr( get_the_modified_date( DATE_W3C ) ),
        esc_attr( get_the_modified_date() ),
    );

    $posted_on = sprintf(
        esc_html_x( 'Pubblicato il %s', 'post date', 'theminimal' ),
        '<a href="' . esc_url( get_permalink() ). '" rel="bookmark">' . $posted_date . '</a>',
    );

    echo '<span class="theminimal-posted-on">' . $posted_on . '</span>';
}