<?php
/**
 * Post footer template
 * 
 * @package theminimal
 */


$post_id = get_the_ID();
$post_terms = wp_get_post_terms( $post_id, ['category', 'post_tag']);

if( empty( $post_terms ) || !is_array( $post_terms ) ) { //Se non ci sono terms o se non si tratta di un array
    return; //esco
}
?>

<div class="theminimal-post-tags">
    <?php
        foreach( $post_terms as $key => $post_term ) { //Scorro terms trovati
    ?>
            <span class="post-term">
                <a href="<?php echo esc_url( get_term_link( $post_term ) ) ?>" class="post-term-link">
                    <?php
                        echo esc_html( $post_term->name );
                    ?>
                </a>
            </span>
    <?php
        }
    ?>
</div>
