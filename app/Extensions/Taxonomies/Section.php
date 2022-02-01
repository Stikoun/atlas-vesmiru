<?php

namespace App\Extensions\Taxonomies;

class Section
{

	public function __construct()
	{
		// Register Taxonomy Init WP action
		add_action('init', [$this, 'registerTaxonomy']);
	}

	/**
	 * Registers custom taxonomy
	 *
	 * @return void
	 */
	public function registerTaxonomy()
	{
		$labels = [
			'name'                  => 'Sekce',
			'singular_name'         => 'Sekce',
			'menu_name'             => 'Sekce',
			'parent_item_colon'     => 'Hlavní sekce',
			'all_items'             => 'Všechny sekce',
			'add_new_item'          => 'Přidat novou sekci',
			'add_new'               => 'Přidat sekci',
			'new_item'              => 'Nová sekce',
			'edit_item'             => 'Upravit sekci',
			'update_item'           => 'Aktualizovat sekci',
			'view_item'             => 'Zobrazit sekci',
			'view_items'            => 'Zobrazit sekci',
			'search_items'          => 'Vyhledat sekci',
			'insert_into_item'      => 'Vložit do sekce',
			'uploaded_to_this_item' => 'Nahrané k této sekci',
			'items_list'            => 'Seznam sekcí',
			'filter_items_list'     => 'Filtr',
		];

		$args = [
			'labels'              => $labels,
			'hierarchical'        => true,
			'public'              => false,
			'show_ui'             => true,
			'show_admin_column'   => false,
			'show_in_nav_menus'   => false,
			'show_tagcloud'       => false,
            'meta_box_cb'         => false,
		];

        /**
         * Slugs are always to be in english language
         * Use rewrite->slug to match language
         */
		register_taxonomy('section', ['issue'], $args);
	}
}
