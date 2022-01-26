<?php
/**
 * Post meta informations template
 * 
 * @package theminimal
 */

?>

<div class="theminimal-post-meta">
    <?php 
        //Richiamo funzioni che stampano data di creazione e autore post
        theminimal_posted_on(); 
        theminimal_posted_by();
    ?>
</div>