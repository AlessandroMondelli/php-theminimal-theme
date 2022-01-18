<?php
/**
  *   Main template file
  *
  *   @package theminimal
  */


get_header();
?>

<div id="theminimal-blog-main">
  <?php
    if( have_posts() ) {
  ?>
    <div class="container">
      <?php
        if( is_home() && !is_front_page() ) {
      ?>
          <div class="theminimal-page-title">
            <h1><?php single_post_title() ?></h1>
          </div>
      <?php
        }
      ?>
      <div class="row">
      <?php
        if( have_posts() ) { //Se trovo post, con the loop mostro tutti i post
          while( have_posts() ) : the_post();
      ?>
            <div class="col-lg-4 col-md-6 col-sm-12">
              <?php
              get_template_part( 'template-parts/blog/content' );
            
      ?>
            </div>
      <?php
          endwhile;
        } else { //Altrimenti richiamo template per nessun contenuto
          get_template_part( 'template-parts/blog/content-none' );  
        }
      ?>
      </div>
    </div> 
  <?php
    }
  ?>
</div>

<?php
get_footer();
