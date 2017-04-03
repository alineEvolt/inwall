<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package inwall
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page">

	<header id="masthead">

		<div class="wrapper">

			<div class="flex-container">
				<div class="w20">
					<h1 class="logo"><a href="<?php echo get_bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo.svg" alt="Inwall" width="100" height="30.7" /></a></h1>
				</div>
				<div class="w80 direct_link txtright">
				<?php
					$currentlang = get_bloginfo('language');
					if( $currentlang === 'fr-FR' ) {
						$buyLink = get_field('link_buy_options', 'option');
					}
					if( $currentlang === 'en-GB' ) {
						$buyLink = get_field('link_buy_options_en', 'option');
					}
				?>
					<div class="button">
						<a href="<?php echo $buyLink; ?>" class="buy">
							<?php echo pll__('buy'); ?>
						</a>
					</div>
          <div class="button medium-hidden small-hidden tiny-hidden join-wall">
          	<form action="#" method="get">
	          	<label for="wallLink" class="wall-link">
	          		<?php echo pll__('Join an existing wall'); ?>
	          	</label>
	          	<div class="input">
	          		<input type="text" class="inputLink" minlength="10" maxlength="10" id="wallLink" placeholder="<?php echo pll__('Enter your phone number'); ?>" name="wallLink" />
	          		<div class="close"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/close.svg" alt="<?php echo pll__('close'); ?>" widht="10" height="10" /></a></div>
          		</div>
          	</form>
          </div>
					<div id="lang-selector">
						<ul>
							<li class="current">fr</li>
							<ul>
								<?php pll_the_languages(); ?>
							</ul>
						</ul>
					</div>
					<div class="login">
            <a href="#"><?php echo pll__('log in'); ?></a>
          </div>
				</div>
			</div>

		</div>
	</header>
	<main id="main">