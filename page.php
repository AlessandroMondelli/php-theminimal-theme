<?php
/**
 * Page template.
 * 
 * @package theminimal
 */

get_header(); //Recupero header
?>

<div id="theminimal-page" class="container-fluid page-margin">
    <?php
        get_template_part( 'template-parts/page/page-content' );
    ?>
</div>

<?php
get_footer();
?>