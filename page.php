<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package inwall
 */

get_header();


if ( have_posts() ) :
	while ( have_posts() ) : the_post();

		echo get_template_part('/template-parts/content', 'page');
		//echo get_template_part('/template-parts/content', 'section');

	 endwhile;
endif;


get_footer();
