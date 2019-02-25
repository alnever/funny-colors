<?php
/**
 * Functions for the Funny Colors Theme
 *
 * The file contains the definitions  of the theme features, menus, sidebars and custimizable options
 *
 * @package SWTK
 * @subpackage Funny_Colors
 * @since Funny Colors 1.0
 */

// define content width

if ( ! isset( $content_width ) ) {
	$content_width = 1024;
}

// textdomain

function funny_colors_register_textdomain() {
  load_theme_textdomain('funny-colors', get_template_directory()."/languages");
}

add_action('after_setup_theme','funny_colors_register_textdomain');

// add theme support

function funny_colors_setup() {
	add_theme_support('custom-header');
	add_theme_support('title-tag');
	add_theme_support('automatic-feed-links');
	add_theme_support('post-formats');
	add_theme_support('custom-logo', array(
	    'height'      => 200,
	    'width'       => 200,
	    'flex-height' => true,
	    'flex-width'  => true,
	    'header-text' => array( 'site-title', 'site-description' ),
	));

	add_theme_support( "post-thumbnails" );
	add_theme_support( "custom-background" );

}

add_action('after_setup_theme', 'funny_colors_setup');

// add editor style for old versions

add_editor_style();

// add editor style for Gutenberg

function funny_colors_block_editor_styles() {
    wp_enqueue_style(
		'funny-colors-block-editor-styles',
		get_theme_file_uri( 'editor-style.css' ),
		false
	);
}

add_action( 'enqueue_block_editor_assets', 'funny_colors_block_editor_styles' );

// enqueue styles and scripts

function funny_colors_enqueue_styles_scripts() {
	wp_enqueue_style('swtk-style', get_stylesheet_uri(), [], wp_get_theme()->get('Version') );
	wp_enqueue_style('swtk-style-all', get_theme_file_uri('/css/style.css'), ['swtk-style'], wp_get_theme()->get('Version') );

    wp_enqueue_script('swtk-jquery', get_theme_file_uri('/js/jquery-3.3.1.js'), [], null, true );
	wp_enqueue_script('swtk-script', get_theme_file_uri('/js/index.js'), ['swtk-jquery'], wp_get_theme()->get('Version'), true );

	if( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action('wp_enqueue_scripts', 'funny_colors_enqueue_styles_scripts');

// menus

function funny_colors_register_menus() {
  register_nav_menus(
    [
        'primary' => __('Primary Menu', 'funny-colors'),
        'secondary' => __('Secondary Menu', 'funny-colors'),
    ]
  );
}

add_action('init','funny_colors_register_menus');

function funny_colors_register_widget_areas() {
  register_sidebar([
    'name' => __('Right sidebar','funny-colors'),
    'id' => 'right-sidebar',
  ]);
  register_sidebar([
    'name' => __('Footer left sidebar','funny-colors'),
    'id' => 'footer-left-sidebar',
  ]);
  register_sidebar([
    'name' => __('Footer center sidebar','funny-colors'),
    'id' => 'footer-center-sidebar',
  ]);
  register_sidebar([
    'name' => __('Footer right sidebar','funny-colors'),
    'id' => 'footer-right-sidebar',
  ]);
  register_sidebar([
    'name' => __('Header sidebar','funny-colors'),
    'id' => 'header-sidebar',
  ]);
}

add_action('widgets_init', 'funny_colors_register_widget_areas');


// add footer text option

function funny_colors_register_footer_text_option ($wp_customize) {
    $wp_customize->add_setting('footer_text', [
        'default' => '',
        'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_section('footer_text_section', [
        'title' => __('Footer text','funny-colors'),
        'priority' => 100,
    ]);

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer_text',[
        'label' => __('Footer text','funny-colors'),
        'type'  => 'textarea',
        'section' => 'footer_text_section',
        'setting' => 'footer_text',
    ]));
}

add_action('customize_register', 'funny_colors_register_footer_text_option');

// add social buttons for footer

function funny_colors_sanitize_image_files($file, $setting) {
	$mimes = [
		'jpg|jpeg|jpe' => 'image/jpeg',
		'png'          => 'image/png',
	];

	//check file type from file name
	$file_ext = wp_check_filetype( $file, $mimes );

	//if file has a valid mime type return it, otherwise return default
	return ( $file_ext['ext'] ? $file : $setting->default );
}

function funny_colors_register_footer_socials($wp_customize) {
    $wp_customize->add_setting('social_link_1', [
        'default' => '',
        'transport' => 'refresh',
		'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_setting('social_icon_1', [
        'default' => '',
        'transport' => 'refresh',
		'sanitize_callback' => 'funny_colors_sanitize_image_files',
    ]);

    $wp_customize->add_setting('social_link_2', [
        'default' => '',
        'transport' => 'refresh',
		'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_setting('social_icon_2', [
        'default' => '',
        'transport' => 'refresh',
		'sanitize_callback' => 'funny_colors_sanitize_image_files',
    ]);

    $wp_customize->add_setting('social_link_3', [
        'default' => '',
        'transport' => 'refresh',
		'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_setting('social_icon_3', [
        'default' => '',
        'transport' => 'refresh',
		'sanitize_callback' => 'funny_colors_sanitize_image_files',
    ]);

    $wp_customize->add_section('footer_socials_section', [
        'title' => __('Footer social buttons','funny-colors'),
        'priority' => 110,
    ]);

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'social_link_1',[
        'label' => __('Social link 1','funny-colors'),
        'type'  => 'url',
        'section' => 'footer_socials_section',
        'setting' => 'social_link_1',
    ]));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'social_icon_1',[
        'label' => __('Social icon 1','funny-colors'),
        'section' => 'footer_socials_section',
        'setting' => 'social_icon_1',
    ]));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'social_link_2',[
        'label' => __('Social link 2','funny-colors'),
        'type'  => 'url',
        'section' => 'footer_socials_section',
        'setting' => 'social_link_2',
    ]));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'social_icon_2',[
        'label' => __('Social icon 2','funny-colors'),
        'section' => 'footer_socials_section',
        'setting' => 'social_icon_2',
    ]));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'social_link_3',[
        'label' => __('Social link 3','funny-colors'),
        'type'  => 'url',
        'section' => 'footer_socials_section',
        'setting' => 'social_link_3',
    ]));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'social_icon_3',[
        'label' => __('Social icon 3','funny-colors'),
        'section' => 'footer_socials_section',
        'setting' => 'social_icon_3',
    ]));
}

add_action('customize_register', 'funny_colors_register_footer_socials');


?>
