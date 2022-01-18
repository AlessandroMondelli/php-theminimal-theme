<?php
/**
 * no-post template
 * 
 * @package theminimal
 */

?>

<div class="theminimal-no-post-header">
    <h2 class="no-post-single-header"> <?php esc_html_e( 'Non è stato trovato alcun post.', 'theminimal' ) ?></h2>
</div>

<div class="theminimal-no-post-body">
    <?php
        //Controllo se la pagina è il blog e se l'user ha i permessi di pubblicare post
        if( is_home() && current_user_can( 'publish_posts' ) ) {
    ?>
            <p>
            <?php
                printf( 
                    wp_kses( 
                        __( 'Vuoi creare un articolo? <a href="%s">Clicca qui per crearne uno</a>', 'theminimal' ),
                        [
                            'a' => [
                                'href' => []
                            ]
                        ]
                    ),
                    esc_url( admin_url( 'post-new.php' ) )
                );
            ?>
            </p>
        <?php
        }
    ?>
</div>