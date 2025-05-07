<?php
function adi26r_block_init() {
	if ( function_exists( 'wp_register_block_types_from_metadata_collection' ) ) {
		wp_register_block_types_from_metadata_collection( __DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php' );
		return;
	}
	if ( function_exists( 'wp_register_block_metadata_collection' ) ) {
		wp_register_block_metadata_collection( __DIR__ . '/build', __DIR__ . '/build/blocks-manifest.php' );
	}
	$manifest_data = require __DIR__ . '/build/blocks-manifest.php';
	foreach ( array_keys( $manifest_data ) as $block_type ) {
		register_block_type( __DIR__ . "/build/{$block_type}" );
	}
}
add_action( 'init', 'adi26r_block_init' );

function adi26r_theme_suport() {
  add_theme_support( 'title-tag' );
  add_theme_support( 'align-wide' );
  add_theme_support( 'editor-styles' );
  add_theme_support( 'wp-block-styles' );
  add_theme_support( 'responsive-embeds' );
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'gutenberg' );
  register_nav_menus(array(
  'nav-menu' => esc_html__('Nav Menu','adi26r'),
  'footer-menu' => esc_html__('Footer Menu','adi26r'),
  ));
}
add_action('after_setup_theme','adi26r_theme_suport');

function add_google_fonts() {
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Play:wght@400;700&display=swap', false);
}
add_action('wp_enqueue_scripts', 'add_google_fonts');
?>