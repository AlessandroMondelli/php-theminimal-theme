<?php
/**
 * Post header template
 * 
 * @package theminimal
 */

$post_id = get_the_ID(); //Recupero id del post
$post_thumbnail = get_the_post_thumbnail( $post_id ); //Recupero thumbnail post
?>

<div class="theminimal-post-header">
    <?php
        if( $post_thumbnail ) {
    ?>
            <div class="theminimal-post-thumbnail">
                <a href="<?php echo esc_url( get_permalink() ) ?>">
                    <?php
                        the_post_custom_thumbnail(
                            $post_id,
                            'theminimal-thumbnail-size',
                            [
                                'sizes' => '(max-width: 590px) 590px, 425px',
                                'class' => 'attachment-featured-large size-featured-image'
                            ]
                        )
                    ?>  
                </a>
            </div>
    <?php
        }    
    ?>
    <div class="theminimal-post-title">
        <h2><?php the_title(); ?></h2>
    </div>
</div>
