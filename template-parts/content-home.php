<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package inwall
 */

$langDos = get_bloginfo('language');

?>

<section class="section bkg1" id="home">
	<div id="anim_home">
		<div class="inner">
			<div class="yellow-stick stick1 stick"></div>
			<div class="yellow-stick stick2 stick"></div>
			<div class="blue-stick stick1 stick"></div>
			<div class="blue-stick stick2 stick"></div>
			<div class="grey-stick stick1 stick"></div>
			<div class="grey-stick stick2 stick"></div>
			<div class="grey-stick stick3 stick"></div>
			<div class="grey-stick stick4 stick"></div>

			<div class="wrapper bloc-top">
				<div class="flex-container-v">
					<div class="w60 medium-w100 small-w100 tiny-w100 flex-item-center">
						<p class="intro"><?php echo pll__('Quand le texto révolutionne vos réunions, conférences, formations, cours...'); ?></p>
						<p class="button demo"><a href="mailto:contact@inwall.fr"><?php echo pll__('Demander une démo'); ?></a></p>
					</div>
				</div>

        <div class="button large-hidden medium-hidden join-wall">
        	<form action="https://inwall.evolt.io/getWall<?php echo htmlspecialchars($number); ?>" method="get" target="_blank">
          	<label for="number" class="wall-link">
          		<?php echo pll__('Join a wall'); ?>
          	</label>
          	<div class="input">
          		<input type="text" class="inputLink" minlength="10" maxlength="14" id="number" placeholder="<?php echo pll__('Enter your phone number'); ?>" name="number" value="<?php echo htmlspecialchars($number); ?>" />
          		<input type="submit" class="submit" value="" />
        		</div>
        	</form>
        </div>
			</div>
			<div class="wrapper">
				<!--<div class="flex-container-v">-->
					<div class="phone">
							<img src="<?php echo get_template_directory_uri(); ?>/dist/images/<?php echo $langDos; ?>/phone.svg" alt="Iphone" width="360" height="601" />
							<div class="message1 message">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/images/<?php echo $langDos; ?>/message1.svg" alt="message" width="290" height="57" />
							</div>
							<div class="message2 message">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/images/<?php echo $langDos; ?>/message2-1.svg" alt="message" width="240" height="122" />
							</div>
							<div class="message3 message">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/images/<?php echo $langDos; ?>/message3.svg" alt="message" width="240" height="103" />
							</div>
					</div>

					<div class="bloc1 bloc">
						<img src="<?php echo get_template_directory_uri(); ?>/dist/images/<?php echo $langDos; ?>/bloc1.svg" alt="message" />
						<div class="like"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/<?php echo $langDos; ?>/like.svg" alt="J'aime" /></div>
					</div>
					<div class="bloc2 bloc">
						<img src="<?php echo get_template_directory_uri(); ?>/dist/images/<?php echo $langDos; ?>/bloc2.svg" alt="message" />
						<div class="like"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/<?php echo $langDos; ?>/like.svg" alt="J'aime" /></div>
					</div>
					<div class="bloc3 bloc">
						<img src="<?php echo get_template_directory_uri(); ?>/dist/images/<?php echo $langDos; ?>/bloc3.svg" alt="message" />
					</div>
					<div class="bloc4 bloc">
						<img src="<?php echo get_template_directory_uri(); ?>/dist/images/<?php echo $langDos; ?>/bloc4.svg" alt="message" />
					</div>
				<!--</div>-->
			</div>
		</div>
	</div>

</section>
