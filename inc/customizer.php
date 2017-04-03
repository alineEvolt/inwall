<?php
/**
 * inwall Theme Customizer
 *
 * @package inwall
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function inwall_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'inwall_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function inwall_customize_preview_js() {
	wp_enqueue_script( 'inwall_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'inwall_customize_preview_js' );

//Traductions de chaînes
		//Header
pll_register_string('header', 'buy');
pll_register_string('header', 'close');
pll_register_string('header', 'log in');
pll_register_string('header', 'Join an existing wall');
pll_register_string('header', 'Enter your phone number');
pll_register_string('video', 'Your browser does not support the video tag.');
pll_register_string('pricing', 'Monthly');
pll_register_string('pricing', 'Yearly');
pll_register_string('pricing', 'HT/<br />an');
pll_register_string('pricing', 'HT/<br />mois');
pll_register_string('pricing', 'Engagement minimum d\'un an');