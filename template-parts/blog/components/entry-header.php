<?php
/**
 * Post header template
 * 
 * @package theminimal
 */

$post_id = get_the_ID(); //Recupero id del post
$post_thumbnail = get_the_post_thumbnail( $post_id ); //Recupero thumbnail post
$hide_title = get_post_meta( $post_id, '_hide_page_title', true ); //Verifico se il titolo è stato nascosto o meno
?>

<div class="theminimal-post-header">
    <div class="theminimal-post-thumbnail">
    <?php
        if( $post_thumbnail ) {
    ?> 
            <a href="<?php echo esc_url( get_permalink() ) ?>">
                <?php
                    the_post_custom_thumbnail(
                        'theminimal-thumbnail-size',
                        [
                            'class' => 'attachment-featured-large size-featured-image'
                        ]
                    )
                ?>  
            </a>
    <?php
        } else {
    ?>
            <div class="no-thumbnail">  
                <a href="<?php echo esc_url( get_permalink() ) ?>">
                    <img src="<?php echo THEMINIMAL_BUILD_IMG_URI . '/default_thumbnail.png'?>">  
                </a>
            </div>
    <?php
        }
    ?>  
    </div>

    <?php
        //Setto il titolo
        if( is_single() || is_page() ) { //Se è un post o pagina
            if( $hide_title != 'yes' ) {
    ?>
                <div class="theminimal-main-title">
                    <h1><a href="<?php echo esc_url( get_the_permalink() ) ?>" class="text-dark"><?php wp_kses_post( the_title() ); //Stampo titolo h1 ?></a></h1>
                </div>
    <?php
            }
        } else { //Se è titolo di un post nel blog
            if( $hide_title != 'yes' ) {
    ?>
                <div class="theminimal-post-title">
                    <h2><a href="<?php echo esc_url( get_the_permalink() ) ?>" class="text-dark"><?php wp_kses_post( the_title() ); //Stampo titolo h2 ?></a></h2>
                </div>
    <?php
            }
        }
    ?>
</div>  
