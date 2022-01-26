<?php
/**
 * Post content template
 * 
 * @package theminimal
 */

?>

<div class="theminimal-post-content">
    <?php 
        if( is_single() ) {
            the_content(
                sprintf(
                    wp_kses(
                        __( 'Continua a leggere %s <span class="meta-nav">$rarr</span>', 'theminimal' ),
                        [
                            'span'=> [
                                'class'=>[]
                            ]
                        ]
                    ),
                    the_title( '<span class="screen-reader-text">', '</span>', false )
                )
            );
        } else {
            theminimal_the_excerpt( 150 ); //Richiamo funzione che taglia estratto
            theminimal_excerpt_more();
        }
    ?>
</div>