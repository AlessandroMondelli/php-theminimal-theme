<?php
/**
 * Navigation bar.
 * 
 * @package theminimal
 */



$menu_class = \THEMINIMAL_THEME\Inc\Menus::get_instance(); //Prendo istanza della classe menu
$header_menu_id = $menu_class->get_menu_id( 'theminimal-header-menu' ); //Richiamo funzione presente nella classe, passando come parametro la location

$header_menu_list = wp_get_nav_menu_items( $header_menu_id ); //Prendo voci di menu tramite funzione wp
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <?php
    if( function_exists( 'the_custom_logo' ) && has_custom_logo() ) { //Stampo il logo se la funzione esiste e se il logo è settato
        the_custom_logo();
    } else {
    ?> <a class="navbar-brand" href="#">Navbar</a> 
    <?php
    }
    ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php
        if( !empty( $header_menu_list ) && is_array( $header_menu_list ) ) {
        ?>
        <ul class="navbar-nav mr-auto">
            <?php
            foreach( $header_menu_list as $menu_item ) { //Itero voci di menu
                if( !$menu_item->menu_item_parent ) { //Se è un valore padre
                    $child_menu_items = $menu_class->get_menu_child_items( $header_menu_list, $menu_item->ID ); //Richiamo funzione per recuperare figli
                    $has_children = !empty( $child_menu_items ) && is_array( $child_menu_items ); //Variabile booleana che controlla se ci sono figli

                    if(!$has_children) { //Se non ci sono figli
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo esc_url($menu_item->url) ?>"><?php echo esc_html($menu_item->title) ?></a>
                    </li>
                    <?php
                    } else {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="<?php echo esc_url($menu_item->url) ?>" data-bs-toggle="dropdown" aria-expanded="false"><?php echo esc_html($menu_item->title) ?></a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            foreach( $child_menu_items as $child_item ){
                            ?>
                            <li><a class="dropdown-item" href="<?php echo esc_url( $child_item->url ) ?>"><?php echo esc_html( $child_item->title ) ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                    }
                }
            } 
            ?>
        </ul>
        <?php 
        } 
        ?>
    </div>
</nav>