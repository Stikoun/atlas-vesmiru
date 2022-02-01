<?php

namespace App\Extensions\CustomPostTypes;

class Example
{

	public function __construct()
	{
		// Register Post Type Init WP action
		add_action('init', [$this, 'registerPostType']);
	}

	/**
	 * Registers custom post type
	 *
	 * @return void
	 */
	public function registerPostType()
	{
		$labels = [
			'name'                  => 'Článek',
			'singular_name'         => 'Článek',
			'menu_name'             => 'Článek',
			'name_admin_bar'        => 'Článek',
			'archives'              => 'Archív',
			'attributes'            => 'Atributy',
			'parent_item_colon'     => 'Číslo',
			'all_items'             => 'Všechny články',
			'add_new_item'          => 'Přidat článek',
			'add_new'               => 'Přidat článek',
			'new_item'              => 'Nový článek',
			'edit_item'             => 'Upravit článek',
			'update_item'           => 'Aktualizovat článek',
			'view_item'             => 'Zobrazit článek',
			'view_items'            => 'Zobrazit článek',
			'search_items'          => 'Vyhledat článek',
			'insert_into_item'      => 'Vložit do stránky',
			'uploaded_to_this_item' => 'Nahrané k tomuto článku',
			'items_list'            => 'Seznam článků',
			'filter_items_list'     => 'Filtr',
		];

		$args = [
			'label'               => 'Článek',
			'description'         => '',
			'labels'              => $labels,
			'supports'            => ['title', 'editor', 'page-attributes'],
			'taxonomies'          => [],
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 1,
			'menu_icon'           => 'dashicons-media-document',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'rewrite'             => [
				'slug'       => 'clanek',
				'with_front' => false,
			],
		];

        /**
         * Slugs are always to be in english language
         * Use rewrite->slug to match language
         */
		register_post_type('article', $args);
	}
}
