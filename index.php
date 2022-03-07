<?php
/**
  *   Main template file
  *
  *   @package theminimal
  */


get_header();
?>

<div id="theminimal-blog-main" class="page-margin">
  <?php
    if( have_posts() ) {
  ?>
    <div class="container-fluid">
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
        <div id="theminimal-blog-sidebar" class="col-lg-2 col-md-12 col-sm-12">
          <?php get_sidebar(); ?>
        </div>
        <div id="theminimal-blog-posts" class="col-lg-10 col-md-12 col-sm-12">
      <?php
        if( have_posts() ) { //Se trovo post, con the loop mostro tutti i post
      ?>
          <div class="row">
      <?php
          $cont = 0;
          $new_col = false;
          while( have_posts() ) : the_post();
            if( $cont == 0 || $cont % 3 == 0) {
            ?>
              <div class="col-lg-4 col-md-12 col-sm-12">
            <?php
            }
                get_template_part( 'template-parts/blog/content' );
            
            if( ( $cont + 1 ) % 3 == 0 ) {
            ?>
              </div>
            <?php
            }

            $cont++;
          endwhile;
      ?>
          </div>
      <?php
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
