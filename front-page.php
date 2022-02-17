<?php
/**
 * front page template
 * 
 * @package theminimal
 */

get_header(); //Recupero header
?>

<div id="theminimal-front-page" class="container-fluid page-margin">
    <?php
        get_template_part( 'template-parts/page/page-content' );
    ?>
</div>

<?php
get_footer();
?>