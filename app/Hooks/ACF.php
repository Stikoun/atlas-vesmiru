<?php 

/**
 * Remove paragraph tag from WYSIWYG editor
 */

add_action('acf/init', function() {
    remove_filter('acf_the_content', 'wpautop' );
});

