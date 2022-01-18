<?php
/**
 * Post template
 * 
 * @package theminimal
 */

?>

<article id="<?php the_ID() ?>" class="theminimal-single-post">
    <?php
        get_template_part( 'template-parts/blog/components/entry-header' );
        get_template_part( 'template-parts/blog/components/entry-meta' );
        get_template_part( 'template-parts/blog/components/entry-content' );
        get_template_part( 'template-parts/blog/components/entry-footer' );
    ?>
</article>