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
        <div class="col-lg-2 col-md-3 col-sm-12">
          <?php get_sidebar(); ?>
        </div>
        <div class="col-lg-10 col-md-9 col-sm-12">
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
      </div>
    </div> 
  <?php
    }

    theminimal_blog_pagination(); //Richiamo funzione paginazione blog
  ?>
</div>

<?php
get_footer();
