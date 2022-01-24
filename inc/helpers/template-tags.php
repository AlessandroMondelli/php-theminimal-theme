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