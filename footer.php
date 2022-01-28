<?php
/**
 *  Footer File
 *  @package theminimal
 */

?>

    <hr>
    <footer id="theminimal-footer">
        <h2>Footer Tema</h2>
        <?php
            if( is_active_sidebar( 'sidebar-2' ) ) {
        ?>
                <aside>
                    <?php dynamic_sidebar( 'sidebar-2' ); ?>
                </aside>
        <?php
            }
        ?>
        <?php wp_footer(); ?>
    </footer>
</body>