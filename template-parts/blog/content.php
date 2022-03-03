<?php
/**
 * Post template
 * 
 * @package theminimal
 */

?>

<article id="<?php the_ID() ?>" class="theminimal-single-post">
    <div class="row">
        <div class="left-single-post col-lg-8 col-md-12 col-sm-12">
        <?php
            get_template_part( 'template-parts/blog/components/entry-header' );
            get_template_part( 'template-parts/blog/components/entry-meta' );
            get_template_part( 'template-parts/blog/components/entry-footer' );
        ?>
        </div>
        <div class="right-single-post col-lg-4 col-md-12 col-sm-12">
        <?php
            get_template_part( 'template-parts/blog/components/entry-content' );
        ?>
        </div>
    </div>
</article>