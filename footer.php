<?php
/**
 *  Footer File
 *  @package theminimal
 */


$menu_class = \THEMINIMAL_THEME\Inc\Menus::get_instance(); //Prendo istanza della classe menu
$footer_menu_id = $menu_class->get_menu_id( 'theminimal-footer-menu' ); //Richiamo funzione presente nella classe, passando come parametro la location

$footer_menu_list = wp_get_nav_menu_items( $footer_menu_id ); //Prendo voci di menu tramite funzione wp
?>

    <hr>
    <footer id="theminimal-footer" class="container-fluid page-margin">
        <div class="row">
            <div class="footer-brand-wrap col-lg-2 col-md-12 col-sm-12">
                <?php
                    if( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
                ?>
                        <a href="<?php echo get_home_url(); ?>"><?php the_custom_logo(); ?></a>
                <?php
                    } else {
                        ?> <a class="footer-brand" href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo('name'); ?></a> 
                        <?php
                    }   
                ?>
            </div>
            <div class="col-lg-10 col-md-12 col-sm-12">
                <div class="row footer-elements">
                <?php
                    $cont = 0;
                    foreach( $footer_menu_list as $menu_item ) {
                ?>
                            <div class="col-lg-4 col-md-6 col-sm-12 theminimal-footer-el">
                                <a href="<?php echo esc_url($menu_item->url) ?>"><?php echo $menu_item->title ?></a>
                            </div>
                <?php

                        $cont++;
                    }
                ?>
                </div>
            </div>
        </div>
        <?php wp_footer(); ?>
    </footer>
</body>