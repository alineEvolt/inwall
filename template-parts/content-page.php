<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package inwall
 */

$idFaq = pll_get_post(271);

?>

<section class="page">
	<?php
	if ( has_post_thumbnail() ) :
		echo '<header class="header" style="background: url(' . get_the_post_thumbnail_url() . ' ) no-repeat 50% / 100% auto;">';
	else:
		echo '<header class="header">';
	endif; ?>
		<div class="flex-container">
			<div class="w40 small-w100 flex-item-center">
				<h1><?php the_title(); ?></h1>
				<?php
				if( is_page( $idFaq ) ) :
					echo get_the_content();
				endif;
				?>
			</div>
		</div>
	</header>

	<?php
	if( have_rows('faq') ):
		echo '<dl class="faq">';
		while ( have_rows('faq') ) : the_row();
			echo '<dt><span class="wrapper">' . get_sub_field('quest_faq') . '</span></dt>';
			echo '<dd><span class="wrapper">' . get_sub_field('resp_faq') . '</span></dd>';
		endwhile;
		echo '</dl>';
	endif;
	?>
<?php
	if( !is_page( $idFaq ) ) : ?>
	<div class="wrapper body">
		<div class="flex-container">
			<div class="w100">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
<?php
	endif;
	wp_reset_postdata();
?>


</section>
<?php

$idContact = pll_get_post(45);
$idEvolt = pll_get_post(49);

$contact_pages = new WP_Query(
	array(
		'post_type' => 'page',
		'post__in' => array( $idContact, $idEvolt ),
		'orderby' => 'Id',
		'order' => 'ASC'
	)
);

if ( $contact_pages->have_posts() ) :
	while ( $contact_pages->have_posts() ) : $contact_pages->the_post();

		echo get_template_part('/template-parts/content', 'section');

	 endwhile;
	wp_reset_postdata();
endif;