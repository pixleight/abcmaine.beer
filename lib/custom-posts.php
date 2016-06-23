<?php

namespace Roots\Sage\CustomPosts;

use Roots\Sage\Assets;

/**
 * Custom post type -- Beer
 */
function register_custom_post_beer() {
	$labels = array(
		"name" => __( 'Beers', 'sage' ),
		"singular_name" => __( 'Beer', 'sage' ),
		"menu_name" => __( 'Beers', 'sage' ),
		"all_items" => __( 'All Beers', 'sage' ),
		"add_new" => __( 'Add New', 'sage' ),
		"add_new_item" => __( 'Add New Beer', 'sage' ),
		"edit_item" => __( 'Edit Beer', 'sage' ),
		"new_item" => __( 'New Beer', 'sage' ),
		"view_item" => __( 'View Beer', 'sage' ),
		"search_items" => __( 'Search Beer', 'sage' ),
		"not_found" => __( 'No Beer found', 'sage' ),
		"not_found_in_trash" => __( 'No Beer found in trash', 'sage' ),
		"parent" => __( 'Parent Beer', 'sage' ),
		"featured_image" => __( 'Featured image for this beer', 'sage' ),
		"set_featured_image" => __( 'Set featured image for this beer', 'sage' ),
		"remove_featured_image" => __( 'Remove featured image for this beer', 'sage' ),
		"use_featured_image" => __( 'Use as featured image for this beer', 'sage' ),
		"archives" => __( 'Beer archives', 'sage' ),
		"insert_into_item" => __( 'Insert into beer', 'sage' ),
		"uploaded_to_this_item" => __( 'Uploaded to this beer', 'sage' ),
		"filter_items_list" => __( 'Filter beers list', 'sage' ),
		"items_list_navigation" => __( 'Beers list navigation', 'sage' ),
		"items_list" => __( 'Beers list', 'sage' ),
		);

	$args = array(
		"label" => __( 'Beers', 'sage' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"exclude_from_search" => false,
		"capability_type" => "page",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "beer", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,"menu_icon" =>  Assets\asset_path('images/icon-beer_20x20.png'),
		"supports" => array( "title", "editor", "thumbnail", "revisions" ),
		"taxonomies" => array( "style" ),
	);
	register_post_type( "beer", $args );

// End of register_custom_post_beer()
}
add_action( 'init', __NAMESPACE__ . '\\register_custom_post_beer' );

/**
 * Custom taxonomy -- Beer Styles
 */
function register_custom_tax_styles() {
	$labels = array(
		"name" => __( 'Styles', 'sage' ),
		"singular_name" => __( 'style', 'sage' ),
		"menu_name" => __( 'Beer Styles', 'sage' ),
		"all_items" => __( 'All Beer Styles', 'sage' ),
		"edit_item" => __( 'Edit Beer Style', 'sage' ),
		"view_item" => __( 'View Beer Style', 'sage' ),
		"update_item" => __( 'Update Beer Style Name', 'sage' ),
		"add_new_item" => __( 'Add New Beer Style', 'sage' ),
		"new_item_name" => __( 'New Beer Style', 'sage' ),
		"parent_item" => __( 'Parent Beer Style', 'sage' ),
		"parent_item_colon" => __( 'Parent Beer Style:', 'sage' ),
		"search_items" => __( 'Search Beer Styles', 'sage' ),
		"popular_items" => __( 'Popular Beer Styles', 'sage' ),
		"separate_items_with_commas" => __( 'Separate Beer Styles with commas', 'sage' ),
		"add_or_remove_items" => __( 'Add or remove Beer Styles', 'sage' ),
		"choose_from_most_used" => __( 'Choose from the most used Beer Styles', 'sage' ),
		"not_found" => __( 'No Beer Styles found', 'sage' ),
		"no_terms" => __( 'No Beer Styles', 'sage' ),
		"items_list_navigation" => __( 'Beer Styles list navigation', 'sage' ),
		"items_list" => __( 'Beer Styles list', 'sage' ),
		);

	$args = array(
		"label" => __( 'Styles', 'sage' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => false,
		"label" => "Styles",
		"show_ui" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'style', 'with_front' => true ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "style", array( "beer" ), $args );

// End register_custom_tax_styles()
}
add_action( 'init', __NAMESPACE__ . '\\register_custom_tax_styles' );
