<?php
/**
 * Single post content.
 * 
 * @package theminimal
 */
?>

<article id="<?php the_ID() ?>" class="theminimal-single-post-content">
    <div class="theminimal-single-content-header theminimal-post-header-margin">
    <?php
        get_template_part( 'template-parts/blog/components/entry-meta' );
        get_template_part( 'template-parts/blog/components/entry-footer' );
    ?>
    </div>
    <div class="theminimal-single-content theminimal-post-margin">
        <?php
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
        ?>
    </div>
</article>
