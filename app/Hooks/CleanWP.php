<?php

/*
|--------------------------------------------------------------------------
| Cleaning WordPress for the theme
|--------------------------------------------------------------------------
|
| WordPress is bloated with things from the start that are not needed
| by the theme. Therefore this file removes uneccessary items from WP
| to keep the clean look.
|
 */

// Remove Block Styles
add_action('wp_enqueue_scripts', function() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style');
    wp_deregister_style('woocommerce-inline');
});

// Removes RSD, WLW, XMLRPC, Generator, Emoji, Embed
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'rel_canonical', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

// Remove WP Embed script
add_action('wp_footer', function () {
    wp_dequeue_script('wp-embed');
});

// Disable XMLRPC
add_filter('xmlrpc_enabled', '__return_false');

// Disable WP-JSON
add_filter('rest_enabled', '__return_false');
add_filter('rest_jsonp_enabled', '__return_false');
