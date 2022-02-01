<?php

/*
|--------------------------------------------------------------------------
| Admin Interface
|--------------------------------------------------------------------------
|
| Here are global predefined actions, filters for admin interface
|
 */

/**
 * Redirects from Dashboard to post type Page edit screen
 */
add_action('load-index.php', function () {
    wp_redirect(admin_url('/edit.php?post_type=page'), $status = 302);
});

/**
 * Adds custom styles to login page
 */
add_action('login_enqueue_scripts', function() {
    wp_enqueue_style('core', dh_get_asset('sass/admin/css/login.css'), false);
});
  
/**
 * Adds favicon to admin/login pages
 */
add_action('login_head', 'add_site_favicon');
add_action('admin_head', 'add_site_favicon');
function add_site_favicon() {
    echo sprintf('<link rel="shortcut icon" href="%s" />', dh_get_asset('images/favicon/favicon.ico'));
}

// Hides footer info
add_action('admin_menu', function () {
	remove_filter('update_footer', 'core_update_footer');
	add_filter('admin_footer_text', '__return_false');
});

// Modifies admin pages
// add_action('admin_menu', function () {
// 	remove_menu_page('index.php');
// 	remove_menu_page('edit.php');
// 	remove_menu_page('edit-comments.php');
// 	remove_menu_page('link-manager.php');
// 	remove_menu_page('tools.php');
// 	remove_menu_page('themes.php');
// }, PHP_INT_MAX);

// Custom menu order
add_filter('custom_menu_order', '__return_true');
add_filter('menu_order', function () {
	return [
		'edit.php?post_type=page',
		'upload.php',
		'separator1',
		'options-general.php',
		'users.php',
		'plugins.php',
		'separator2',
	];
}, PHP_INT_MAX);

// Custom Admin Bar
add_action('admin_bar_menu', function ($wp_admin_bar) {
	global $post;

	if (is_admin()) {
		$screen = get_current_screen();
	}

	$homepage_href = get_home_url();

	$wp_admin_bar->remove_node('wp-logo');
	$wp_admin_bar->remove_node('site-name');
	$wp_admin_bar->remove_node('customize');
	$wp_admin_bar->remove_node('updates');
	$wp_admin_bar->remove_node('comments');
	$wp_admin_bar->remove_node('new-content');
	$wp_admin_bar->remove_node('search');
	$wp_admin_bar->remove_node('edit');
    $wp_admin_bar->remove_node('preview');
	$wp_admin_bar->remove_node('view');
	$wp_admin_bar->remove_node('w3tc');
	$wp_admin_bar->remove_node('wpss-cache-purge');
	$wp_admin_bar->remove_node('my-account');
	$wp_admin_bar->remove_node('archive');

	$wp_admin_bar->add_node([
		'id'     => 'logout',
		'title'  => sprintf('<span class="ab-icon dashicons-before dashicons-migrate" style="padding: 7px 0;"> </span> %s', __('Odhlásit se', 'theme')),
		'parent' => 'top-secondary',
		'href'   => wp_logout_url(),
	]);

	if (is_admin()){
		$wp_admin_bar->add_node([
			'id'    => 'go-home',
			'title' => sprintf('<span class="ab-icon dashicons-before dashicons-admin-home" style="padding: 7px 0;"> </span> %s', get_bloginfo('name')),
			'href'  => $homepage_href,
			'meta'  => ['class' => 'dh-toolbar-go-home'],
		]);

        if( ( isset($post->ID) ) && ( $screen->base == 'post' ) && ( $post->post_status == 'publish' ) ){
            $wp_admin_bar->add_node([
                'id'     => 'view-post',
                'title'  => '<span class="ab-icon dashicons-before dashicons-admin-post" style="padding: 7px 0;"> </span> Zobrazit článek',
                'href'   => get_permalink( $post->ID ),
                'meta'   => array( 'class' => 'dh-toolbar-admin' )
            ]);
        }

    } else {
		$wp_admin_bar->add_node([
			'id'    => 'go-home',
			'title' => sprintf('<span class="ab-icon dashicons-before dashicons-wordpress" style="padding: 7px 0;"> </span> %s', __('WP Administrace', 'theme')),
			'href'  => admin_url('index.php'),
			'meta'  => ['class' => 'dh-toolbar-admin'],
		]);

        if (is_singular()) {
            $wp_admin_bar->add_node([
                'id'    => 'edit-post',
                'title' => '<span class="ab-icon dashicons-before dashicons-edit" style="padding: 7px 0;"> </span> Upravit stránku',
                'href'  => get_edit_post_link($post->ID),
                'meta'  => ['class' => 'dh-toolbar-admin'],
            ]);
        }

    }

}, 999999);
