<?php
/**
 * @package theminimal
 * 
 * Page content loop
 */

while ( have_posts() ) : the_post(); ?> 
    <div class="theminimal-content-page">
        <?php the_content(); ?> 
    </div>
<?php
endwhile; //resetting the page loop
?>