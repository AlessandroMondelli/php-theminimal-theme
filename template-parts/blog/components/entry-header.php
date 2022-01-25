<?php
/**
 * Post header template
 * 
 * @package theminimal
 */

$post_id = get_the_ID(); //Recupero id del post
$post_thumbnail = get_the_post_thumbnail( $post_id ); //Recupero thumbnail post
$hide_title = get_post_meta( $post_id, '_hide_page_title', true );
?>

<div class="theminimal-post-header">
    <?php
        if( $post_thumbnail ) {
    ?>
            <div class="theminimal-post-thumbnail">
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
            </div>
    <?php
        }    
    ?>

    <?php
        if($hide_title != "yes") {
    ?>
            <div class="theminimal-post-title">
                <h2><?php the_title(); ?></h2>
            </div>
    <?php
        }
    ?>
</div>  
