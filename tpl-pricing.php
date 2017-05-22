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

 Template Name: Pricing TPL
 */

get_header();


if ( have_posts() ) :
	while ( have_posts() ) : the_post();

if( have_rows('section_row') ):
	echo '<section class="section pricing-section">';

	while ( have_rows('section_row') ) : the_row();

		if( get_row_layout() == 'pricing_row' ): ?>

			<div class="wrapper pricing">
				<h1><?php the_sub_field('titre_pricing_row'); ?></h1>
				<p class="intro"><?php the_sub_field('subtitle_pricing_row'); ?></p>
				<div class="w40 medium-w100 small-w100 tiny-w100 center txtcenter toggle-pricing">
					<span class="label label1 checked"><?php echo pll__('Monthly'); ?></span>
					<div  class="center toggle_price">
						<div class="toggle">
						  <input type="checkbox" id="toggly">
						  <label for="toggly"><i></i></label>
						</div>
					</div>
					<span class="label label2"><?php echo pll__('Yearly'); ?></span>
				</div>
			</div>
			<div class="wrapper pricing-tables">
				<?php
				if( have_rows('pricing_table') ):

				echo '<div class="grid-2-small-1 has-gutter-xl">';

					while( have_rows('pricing_table') ): the_row();

						$features = get_sub_field('feature_pricing');

						echo '<div class="pricing-table">';
							echo '<div class="inner-table">';
								echo '<h3>' . get_sub_field('title_pricing') . '</h3>';
								echo '<div class="body">';
								echo '<div class="price">';
									echo '<span class="month">' . get_sub_field('price_month') . ' <small>' . pll__('€ HT') . '</small><br /><span>' . pll__('par mois') . ' *</span></span>';
									echo '<span class="year">' . get_sub_field('price_year') . ' <small>' . pll__('€ HT') . '</small><br /><span>' . pll__('par an') . ' *</span></span>';
								echo '</div>';
								echo '<div class="txtcenter"><a href="mailto:' . get_sub_field('link_pricing') . '" class="btn">' . get_sub_field('btn_pricing') . '</a></div>';
								echo '<ul class="features-pricing">';
									echo '<li class="feature-ok">' . pll__('Événements <strong>illimités</strong>') . '</li>';
									echo '<li class="feature-ok">' . pll__('Participants <strong>illimités</strong>') . '</li>';
									echo '<li class="feature-ok">' . pll__('Interactions <strong>illimitées</strong>') . '</li>';
									if ( $features && in_array('mod_brain', $features ) ) {
										echo '<li class="feature-ok">' . pll__('Module brainstorm') . '</li>';
									} else {
										echo '<li>' . pll__('Module brainstorm') . '</li>';
									}
									if ( $features && in_array('mod_sond', $features ) ) {
										echo '<li class="feature-ok">' . pll__('Module sondage') . '</li>';
									} else {
										echo '<li class="feature-no">' . pll__('Module sondage') . '</li>';
									}
									if ( $features && in_array('export_exc', $features ) ) {
										echo '<li class="feature-ok">' . pll__('Export excel') . '</li>';
									} else {
										echo '<li class="feature-no">' . pll__('Export excel') . '</li>';
									}
									if ( $features && in_array('moder', $features ) ) {
										echo '<li class="feature-ok">' . pll__('Modération') . '</li>';
									} else {
										echo '<li class="feature-no">' . pll__('Modération') . '</li>';
									}
									if ( $features && in_array('assis', $features ) ) {
										echo '<li class="feature-ok">' . pll__('Assistance') . '</li>';
									} else {
										echo '<li class="feature-no">' . pll__('Assistance') . '</li>';
									}
									if ( $features && in_array('person', $features ) ) {
										echo '<li class="feature-ok">' . pll__('Personnalisation') . '</li>';
									} else {
										echo '<li class="feature-no">' . pll__('Personnalisation') . '</li>';
									}

								echo '</ul>';

								echo '</div>';
							echo '</div>';
						echo '</div>';

					endwhile;
				echo '</div>';
				echo '<div class="w50 small-w100 tiny-w100 push info_price"><p>* ' . pll__('Engagement minimum de 2 mois') . '</p></div>';
				endif;
				?>
			</div>
			<div class="other_pricing">
					<?php
					if( have_rows('other_pricing') ):
						while( have_rows('other_pricing') ): the_row();

							echo '<div class="other_row">';
								echo '<div class="wrapper">';
									echo '<div class="flex-container ' . get_sub_field('color_otherprice') . '">';

										echo '<div class="title w20 small-w100 tiny-w100">';
											echo '<div class="picto">';
												echo '<img src="' . get_sub_field('picto_otherprice') . '" alt="" />';
											echo '</div>';
											echo '<h3>' . get_sub_field('title_otherprice') . '</h3>';
										echo '</div>';

										echo '<div class="w60 small-w100 tiny-w100 text flex-item-center">';

											if( get_sub_field('price_otherprice') ) {
												echo '<span class="price">' . get_sub_field('price_otherprice') . ' €<sup>HT</sup></span> ';
											}

											echo '<p>' . get_sub_field('text_otherprice') . '</p>';

										echo '</div>';

										echo '<div class="w20 small-w100 tiny-w100 button">';

											echo '<a href="mailto:' . get_sub_field('link_otherprice') . '" class="btn">' . get_sub_field('btn_otherprice') . '</a>';

										echo '</div>';

									echo '</div>';
								echo '</div>';
							echo '</div>';
						endwhile;
					endif;
					?>
			</div>
		<?php endif; // end pricing table

	endwhile; // End section_row
	echo '</section>';
endif; // End section_row

	 endwhile;
endif;


get_footer();
