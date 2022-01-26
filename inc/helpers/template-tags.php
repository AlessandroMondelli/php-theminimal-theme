<?php

use MailPoetVendor\Symfony\Component\Validator\Constraints\Length;

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

    $posted_date = sprintf( //Aggiungo date a stringa
        $posted_date,
        esc_attr( get_the_date( DATE_W3C ) ),
        esc_attr( get_the_date() ),
        esc_attr( get_the_modified_date( DATE_W3C ) ),
        esc_attr( get_the_modified_date() ),
    );

    $posted_on = sprintf( //Aggiungo link e testo a stringa data
        esc_html_x( 'Pubblicato il %s', 'post date', 'theminimal' ),
        '<a href="' . esc_url( get_permalink() ). '" rel="bookmark">' . $posted_date . '</a>',
    );

    echo '<span class="theminimal-posted-on">' . $posted_on . '</span>'; //Stampo data
}

function theminimal_posted_by() { //Funzione che stampa autore del post
    $posted_by = sprintf( //Preparo stringa con autore
        esc_html_x( ' da %s', 'post author', 'theminimal' ),
        '<span class="theminimal-author"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
    );

    echo $posted_by; //Stampo stringa
}

function theminimal_the_excerpt( $trim_count = 0 ) { //Funzione che recupera estratto di un post
    $excerpt = wp_strip_all_tags( get_the_excerpt() ); //Recupero estratto eliminando link,ecc.

    if( strlen($excerpt) < $trim_count ) { //Se il valore rimane 0
        the_excerpt(); //Stampo estratto dal post
        return;
    }

    $excerpt = substr( $excerpt, 0, $trim_count ); //Taglio estratto in base al numero di lettere ricevuto tramite parametro
    $excerpt = substr( $excerpt, 0, strrpos( $excerpt, '' ) ); //Taglio estratto fino all'ultimo spazio (elimino parola tagliata)

    echo $excerpt . '...';
}

function theminimal_excerpt_more( $read_more = '' ) {
    if( !is_single() ) {
        $read_more = sprintf(
            '<span class="theminimal-read-more"><a href="%1$s">%2$s</a></span>',
            get_permalink( get_the_ID() ),
            __('Continua a leggere', 'theminimal'),
        );
    }

    echo $read_more;
}