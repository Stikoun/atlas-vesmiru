<?php

// Theme Settings
add_action('after_setup_theme', function () {

	// Support for <title>
	add_theme_support('title-tag');

	// Support for theme navigation
	add_theme_support('menus');

	register_nav_menus([
		'primary'   => 'Hlavní menu',
		'footer'  => 'Patička'
	]);
});
