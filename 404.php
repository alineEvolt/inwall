<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package inwall
 */

get_header(); ?>

	<section class="section">
		<div class="wrapper">
			<div class="flex-container">
				<div class="flex-item-center">
					<h1>404</h1>
					<p><strong><?php echo pll__('Oops, la page que vous cherchez est introuvable !'); ?></strong></p>
					<p><?php echo pll__('La page que vous avez demandée n\'a pas été trouvée.<br /> Il se peut que le lien que vous avez utilisé soit rompu.'); ?></p>
					<p class="btn"><a href="<?php echo get_bloginfo('url'); ?>"><?php echo ('revenir à la page d\'accueil'); ?></a></p>
				</div>
				<div class="flex-item-center">
					<img src="<?php echo get_template_directory_uri(); ?>/dist/images/mr-wall-404.svg" alt="Mr Wall" />
				</div>
			</div>
		</div>
	</section>

<?php
get_footer();
