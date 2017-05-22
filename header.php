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
					<h1 class="logo"><a href="<?php echo get_bloginfo('url'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo.svg" alt="Inwall" width="70" height="21" /></a></h1>
				</div>
				<div class="direct_link txtright right">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-6', 'menu_id' => 'header-nav', 'container' => 'nav' ) ); ?>
				<?php
					$currentlang = get_bloginfo('language');
					if( $currentlang === 'fr-FR' ) {
						$buyLink = get_field('link_buy_options', 'option');
						$loginLink = get_field('link_login_options', 'option');
					}
					if( $currentlang === 'en-GB' ) {
						$buyLink = get_field('link_buy_options_en', 'option');
						$loginLink = get_field('link_login_options_en', 'option');
					}
				?>
          <div class="button small-hidden tiny-hidden join-wall">
          	<form action="https://inwall.evolt.io/getWall<?php echo htmlspecialchars($number); ?>" method="get" target="_blank">
	          	<label for="number" class="wall-link">
	          		<?php echo pll__('Join a wall'); ?>
	          	</label>
	          	<div class="input">
	          		<input type="text" class="inputLink" minlength="10" maxlength="14" id="number" placeholder="<?php echo pll__('Enter your phone number'); ?>" name="number" value="<?php echo htmlspecialchars($number); ?>" />
	          		<div class="close"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/close.svg" alt="<?php echo pll__('close'); ?>" widht="10" height="10" /></a></div>
	          		<input type="submit" class="submit" value="" />
          		</div>
          	</form>
          </div>
          <div class="button button-ipad join-wall">
          	<a href="#"><?php echo pll__('Join a wall'); ?></a>
          </div>
          <div class="login">
            <a href="<?php echo $loginLink; ?>" target="_blank"><?php echo pll__('log in'); ?></a>
          </div>
        </div>
        <button class="menu-phone right"><?php echo pll__('Menu'); ?></button>
				<div id="lang-selector">
					<ul>
						<li class="current">fr</li>
						<ul>
							<?php pll_the_languages(); ?>
						</ul>
					</ul>
				</div>
			</div>

		</div>
	</header>
	<main id="main">