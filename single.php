<?php
/**
 * Single post template.
 * 
 * @package theminimal
 */

get_header(); //Recupero header
?>

<div class="theminimal-single-post-page container-fluid page-margin">
    <?php
        if( have_posts() ) {
    ?>
            <div class="theminimal-single-title">
                <h1><?php single_post_title(); ?></h1>
            </div>
    <?php
            while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/blog/single-content' );
            endwhile;
        }
        
    //Post precedente e successivo
    ?>
    <div class="prev-next">
        <?php
            previous_post_link('%link');
            next_post_link('%link');
        ?>
    </div>
</div>

<?php
get_footer();
?>