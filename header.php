<?php
/**
 *  Header file.
 * 
 *  @package theminimal
 */

?>

<!DOCTYPE html>
<html lang=" <?php language_attributes(); ?> ">
    <head>
        <meta charset=" <?php bloginfo('charset') ?> ">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> <?php wp_title(); ?> </title>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class() ?> id="theminimal-body">
        <?php 
        if( function_exists('wp_body_open') ) {
            wp_body_open(); 
        }
        ?>
        <header id="theminimal-header">
            <?php get_template_part( 'template-parts/header/nav' ); ?>
        </header>