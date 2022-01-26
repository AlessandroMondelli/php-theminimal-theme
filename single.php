<?php
/**
 * Single post template.
 * 
 * @package theminimal
 */

get_header(); //Recupero header
?>

<div id="theminimal-single-post">
    <?php
        if( have_posts() ) {
            if( is_home() && !is_front_page()) {   
    ?>
                <div class="theminimal-single-title">
                    <h1><?php single_post_title(); ?></h1>
                </div>
    <?php
            }
            while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/blog/content' );
            endwhile;
        }
    ?>
</div>

<?php
get_footer();
?>