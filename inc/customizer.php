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
pll_register_string('header', 'buy');
pll_register_string('header', 'pricing');
pll_register_string('header', 'close');
pll_register_string('header', 'log in');
pll_register_string('footer', 'Vous souhaitez rejoindre un mur existant&nbsp;?');
pll_register_string('footer', 'Réseaux sociaux');
pll_register_string('header', 'Join a wall');
pll_register_string('header', 'Enter your phone number');
pll_register_string('slogan', 'Quand le texto révolutionne vos réunions, conférences, formations, cours...');
pll_register_string('video', 'Your browser does not support the video tag.');
pll_register_string('pricing', 'Monthly');
pll_register_string('pricing', 'Yearly');
pll_register_string('pricing', '€ HT');
pll_register_string('pricing', 'par mois');
pll_register_string('pricing', 'par an');
pll_register_string('pricing', 'Engagement minimum de 2 mois');
pll_register_string('pricing', 'Événements <strong>illimités</strong>');
pll_register_string('pricing', 'Participants <strong>illimités</strong>');
pll_register_string('pricing', 'Interactions <strong>illimitées</strong>');
pll_register_string('pricing', 'Module brainstorm');
pll_register_string('pricing', 'Module sondage');
pll_register_string('pricing', 'Export excel');
pll_register_string('pricing', 'Modération');
pll_register_string('pricing', 'Assistance');
pll_register_string('pricing', 'Personnalisation');
pll_register_string('bouton', 'Demander une démo');