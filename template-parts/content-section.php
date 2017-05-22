<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package inwall
 */
?>


<?php

$bkgColor = get_field('bkg_color');
$bkgImgQ = get_field('bkg_img_quest');
$bkgImgR = get_field('bkg_img');
$bkgImgUrl = $bkgImgR['url'];
$bkgLarg = get_field('bkg_img_size_larg');
$bkgHaut = get_field('bkg_img_size_haut');
$bkgPos = get_field('bkg_img_pos');
$slug = basename(get_permalink());
$suppMarges = get_field('supp_marge_sec');
$borderSec = get_field('add_border_sec');
$fullHeightSec = get_field('full_height_sec');

$supPad = '';
$addborder = 'border-width: 0 !important;';

$heightSec = '';

if( $bkgPos === 'top_left' ) { $posBkg = '0 0'; }
elseif( $bkgPos === 'top_center' ) { $posBkg = '50% 0'; }
elseif( $bkgPos === 'top_right' ) { $posBkg = '100% 0'; }
elseif( $bkgPos === 'bottom_left' ) { $posBkg = '0 100%'; }
elseif( $bkgPos === 'bottom_center' ) { $posBkg = '50% 100%'; }
elseif( $bkgPos === 'bottom_right' ) { $posBkg = '100% 100%'; }

if( $suppMarges === 'padTop' ) {
	$supPad = 'padding-top: 0 !important;';
}
elseif( $suppMarges === 'padBottom' ) {
	$supPad = 'padding-bottom: 0 !important;';
}
elseif( $suppMarges === 'padAll' ) {
	$supPad = 'padding: 0 !important;';
}

if( $borderSec === 'borderTop' ) {
	$supPad = 'border-width: 1px 0 0 !important;';
}
elseif( $borderSec === 'borderBot' ) {
	$supPad = 'border-width: 0 0 1px !important;';
}
elseif( $borderSec === 'borderAll' ) {
	$supPad = 'border-width: 1px 0 !important;';
}

if( $bkgLarg ) {
	$largBkg = $bkgLarg . '%';
} else {
	$largBkg = 'auto';
}

if( $bkgHaut ) {
	$hautBkg = $bkgHaut . '%';
} else {
	$hautBkg = 'auto';
}

if ( $fullHeightSec ) {
	$heightSec = 'full-height';
}

if( have_rows('section_row') ):

if( $bkgImgQ ) {
	echo '<section class="section ' . $heightSec . ' ' . get_field('custom_sec') . '" id="' . $slug . '" style="background: ' . $bkgColor . ' url(' . $bkgImgUrl . ') no-repeat ' . $posBkg . ' / ' . $largBkg . ' ' . $hautBkg . '; ' . $supPad . '">';
} else {
	echo '<section class="section ' . $heightSec . ' ' . get_field('custom_sec') . '" id="' . $slug . '" style="background: ' . $bkgColor . '; ' . $supPad . '">';
}
	while ( have_rows('section_row') ) : the_row();

		if( get_row_layout() == 'bloc_contenu'):

			$blocContLarg = get_sub_field('bloc_contenu_larg');
			$blocContPos = get_sub_field('bloc_contenu_pos');
			$blocContText = get_sub_field('bloc_contenu_text');

			echo '<div class="wrapper">';
				echo '<div class="grid has-gutter-xl">';

					echo '<div class="' . $blocContLarg . ' ' . $blocContPos . '">';
						echo '<div class="contBloc">' . $blocContText . '</div>';
					echo '</div>';

				echo '</div>';
			echo '</div>';


		endif; // end Bloc de contenu

		if( get_row_layout() == 'bloc_contenu_img' ):

			$posText = get_sub_field('bloc_contenu_text_pos');
			$blocText = get_sub_field('bloc_contenu_text');

			echo '<div class="wrapper">';
				echo '<div class="flex-container text-visu">';

					if( $posText === 'left' ) {

						echo '<div class="flex-item-center w40 small-w100 tiny-w100 posLeft">';
							echo $blocText;
						echo '</div>';

					}

					if( $posText === 'right' ) {

						echo '<div class="flex-item-center w40 small-w100 tiny-w100 posRight">';
							echo $blocText;
						echo '</div>';

					}

					if( have_rows('bloc_contenu_imgs') ):
						$i = 1;
						echo '<div class="flex-item w50 small-w100 tiny-w100 img-pos">';
						while ( have_rows('bloc_contenu_imgs') ) : the_row();

							$visuPar = get_sub_field('bloc_contenu_img');
							$visuParS = 'large';
							$visuParT = $visuPar['sizes'][ $visuParS ];
							$width = $visuPar['sizes'][ $visuParS . '-width' ];
							$height = $visuPar['sizes'][ $visuParS . '-height' ];
							$margeLeft = '0';

							echo '<div class="visu visu-' . $i . '">';
								echo '<img src="' . $visuParT . '" alt="" width="' . $width . '" height="' . $height . '" data-rjs="3" />';
							echo '</div>';

						$i++;
						endwhile;
						echo '</div>';
					endif;

				echo '</div>';
			echo '</div>';


		endif; // end Bloc de contenu images

		if( get_row_layout() == 'bloc_video' ):

			$videoEmbed = get_sub_field('bloc_video_embed');

			//echo '<div class="wrapper">';
				echo '<div class="video-container" id="video">';
					echo '<div class="close"><a href="#"><img src="' . get_template_directory_uri() . '/dist/images/close.svg" alt="Fermer" /></a></div>';
					echo '<div class="inner">';
						//echo '<div class="play"><a href="#"><img src="' . get_template_directory_uri() . '/dist/images/play.svg" alt="Play" /></a></div>';
						//echo '<div class="pause"><a href="#"><img src="' . get_template_directory_uri() . '/dist/images/pause.svg" alt="pause" /></a></div>';
						echo '<video class="video" controls>';
							echo '<source src="' . get_template_directory_uri() . '/inwall-video.mp4" type="video/mp4">';
						  echo '<source src="' . get_template_directory_uri() . '/inwall-video.ogg" type="video/ogg">';
							echo pll__('Your browser does not support the video tag.');
						echo '</video>';
						//echo '<div class="loaded_bar"></div>';
					echo '</div>';
				echo '</div>';
			//echo '</div>';

		endif; // end video embed

		if( get_row_layout() == 'bloc_features' ):

			echo '<div class="wrapper features">';
				echo '<div class="grid-2">';

				if( have_rows('bloc_features_col') ):

					while ( have_rows('bloc_features_col') ) : the_row();

						$pictoF = get_sub_field('bloc_features_picto');
						$titleF = get_sub_field('bloc_features_title');
						$textF = get_sub_field('bloc_features_text');

						echo '<div class="bloc one-half">';
							echo '<div class="picto w10">';
								echo '<img src="' . $pictoF .'" alt="" />';
							echo '</div>';
							echo '<div class="text w90">';
								echo '<h3>' . $titleF . '</h3>';
								echo $textF;
							echo '</div>';
						echo '</div>';

					endwhile;
				endif;

				echo '</div>';
			echo '</div>';

		endif; // end Blocs features

		if( get_row_layout() == 'bloc_testi' ):

			echo '<div class="testimonials">';
				echo '<div class="wrapper">';
					echo '<div class="flex-container">';
						echo '<div class="w100 center">';

							if( have_rows('testi_rows') ):

							echo '<div class="swiper-container">';
								echo '<div class="swiper-wrapper">';

								while( have_rows('testi_rows') ): the_row();

								$photoTest = get_sub_field('photo_testi');
								$photoTestUrl = $photoTest['url'];
								$photoTestAlt = $photoTest['alt'];
								$photoTestSize = 'testi';
								$photoTestThumb = $photoTest['sizes'][$photoTestSize];
								$photoTestW = $photoTest['sizes'][$photoTestSize . '-width' ];
								$photoTestH = $photoTest['sizes'][$photoTestSize . '-height' ];


									echo '<div class="swiper-slide">';

										echo '<figure class="photo">';

											echo '<img src="' . $photoTestThumb . '" alt="' . $photoTestAlt . '" data-rjs="3" />';

										echo '</figure>';
										echo '<blockquote>';
											echo get_sub_field('text_testi');
											echo '<div class="caption">';
											echo get_sub_field('name_testi') . '<br />';
											echo '<span>' . get_sub_field('statut_testi') . '</span>';
											echo '</div>';
										echo '</blockquote>';

									echo '</div>';

								endwhile;

								echo '</div>';
								echo '<div class="swiper-pagination"></div>';
							echo '</div>';

							endif;

						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';

		endif; // end témoignages

		if( get_row_layout() == 'pricing_row' ): ?>

		<div class="wrapper pricing">
			<div class="w40 medium-w100 small-w100 tiny-w100 center txtcenter">
				<span class="label label1"><?php echo pll__('Monthly'); ?></span>
				<div  class="center toggle_price">
					<div class="toggle">
					  <input type="checkbox" id="toggly">
					  <label for="toggly"><i></i></label>
					</div>
				</div>
				<span class="label label2"><?php echo pll__('Yearly'); ?></span>
			</div>
			<h2><?php the_sub_field('titre_pricing_row'); ?></h2>
			<p class="intro"><?php the_sub_field('subtitle_pricing_row'); ?></p>
		</div>
		<div class="wrapper pricing-tables">
			<?php
			if( have_rows('pricing_table') ):

			echo '<div class="grid-2-small-1 has-gutter-xl">';

				while( have_rows('pricing_table') ): the_row();

					$features = get_sub_field('feature_pricing');
					$freeTrial = get_sub_field('free_trial_pricing');
					$freeTable = '';
					if( $freeTrial == 1 ) {
						$freeTable = 'free-table';
					}

					echo '<div class="pricing-table ' . $freeTable . '">';
						echo '<div class="inner-table">';
							echo '<div class="body">';

							echo '<h3>' . get_sub_field('title_pricing') . '</h3>';
							echo '<p class="subtitle">' . get_sub_field('subtitle_pricing') . '</p>';
							echo '<div class="price">';
								echo '<span class="month">' . get_sub_field('price_month') . ' <sup>' . pll__('HT/<br />mois') . '*</sup></span>';
								echo '<span class="year">' . get_sub_field('price_year') . ' <sup>' . pll__('HT/<br />an') . '*</sup></span>';
							echo '</div>';
							echo '<ul class="features">';
								echo '<li>' . pll__('Événements <strong>illimités</strong>') . '</li>';
								echo '<li>' . pll__('Participants <strong>illimités</strong>') . '</li>';
								echo '<li>' . pll__('Interactions <strong>illimitées</strong>') . '</li>';
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
							echo '<div class="txtcenter"><a href="mailto:' . get_sub_field('link_pricing') . '" class="btn">' . get_sub_field('btn_pricing') . '</a></div>';
						echo '</div>';
					echo '</div>';

				endwhile;
			echo '</div>';
			echo '<div class="w50 medium-w100 small-w100 tiny-w100 push info_price"><p>* ' . pll__('Engagement minimum d\'un an') . '</p></div>';
			endif;
			?>
		</div>
		<div class="other_pricing">
			<div class="wrapper">
				<?php
				if( have_rows('other_pricing') ):
					while( have_rows('other_pricing') ): the_row();

						echo '<div class="flex-container other_row ' . get_sub_field('color_otherprice') . '">';

							echo '<div class="title w20 medium-w100 small-w100 tiny-w100">';
								echo '<div class="picto">';
									echo '<img src="' . get_sub_field('picto_otherprice') . '" alt="" />';
								echo '</div>';
								echo '<h3>' . get_sub_field('title_otherprice') . '</h3>';
							echo '</div>';

							echo '<div class="w60 medium-w100 small-w100 tiny-w100 text flex-item-center">';

								if( get_sub_field('price_otherprice') ) {
									echo '<span class="price">' . get_sub_field('price_otherprice') . ' €<sup>HT</sup></span> ';
								}

								echo '<p>' . get_sub_field('text_otherprice') . '</p>';

							echo '</div>';

							echo '<div class="w20 medium-w100 small-w100 tiny-w100 button">';

								echo '<a href="mailto:' . get_sub_field('link_otherprice') . '" class="btn">' . get_sub_field('btn_otherprice') . '</a>';

							echo '</div>';

						echo '</div>';

					endwhile;
				endif;
				?>
			</div>
		</div>
		<?php endif; // end pricing table

	endwhile; // End section_row
	echo '</section>';
endif; // End section_row

?>
