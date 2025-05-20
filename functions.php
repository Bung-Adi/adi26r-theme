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
  add_theme_support( 'comments' );
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

// custom login logo
function adi26r_custom_login_logo() {
  echo '<style type="text/css">
    #login h1 a {
      background-image: url(' . get_stylesheet_directory_uri() . '/img/adi26r-logo-w.png);
      background-size: contain;
      width: 100%;
      height: 80px;
    }
    body.login {
      background-color: #2A2D32;
      font-family: "Play", sans-serif;
    }
  </style>';
}
add_action('login_head', 'adi26r_custom_login_logo');

function adi26r_login_logo_url() {
  return home_url();
}
add_filter('login_headerurl', 'adi26r_login_logo_url');

function adi26r_login_logo_url_title() {
  return get_bloginfo('name');
}
add_filter('login_headertext', 'adi26r_login_logo_url_title');

// Excerpt
function custom_excerpt_length($length) {
    return 15;
}
add_filter('excerpt_length', 'custom_excerpt_length');

function custom_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');
?>