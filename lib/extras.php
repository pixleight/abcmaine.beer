<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    // $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Replace permalink slug with #anchor on homepage
 */
function main_menu_links( $atts, $item, $args ) {
  if($item->classes[0] != 'no-anchor'){
    //if( strpos( $atts['href'], get_site_url() ) !== false ) {
      if( is_front_page() ) {
        $pattern = "/([^\/]+(?=\/$|$))(\/)/i";
        $replacement = "#$1";
        $atts['href'] = preg_replace($pattern, $replacement, $atts['href']);
      }
    //}
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', __NAMESPACE__ . '\\main_menu_links', 10, 3 );

function set_custom_edit_beer_columns($columns) {
  unset($columns['date']);
  $columns['on_tap'] = __( 'On Tap', 'sage' );
  $columns['date'] = __( 'Date', 'sage' );
  return $columns;
}

function custom_beer_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'on_tap':
			echo join(', ', get_post_meta( $post_id, 'on_tap', true ) );
			break;
	}
}

add_filter( 'manage_beer_posts_columns', __NAMESPACE__ . '\\set_custom_edit_beer_columns' );
add_action( 'manage_beer_posts_custom_column' , __NAMESPACE__ . '\\custom_beer_columns', 10, 2 );
