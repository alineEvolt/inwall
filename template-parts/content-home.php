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
					<div class="w60 medium-w100 flex-item-center">
						<p class="intro"><?php echo get_bloginfo('description'); ?></p>
					</div>
				</div>

        <div class="button large-hidden">
        	<form action="#" method="get">
          	<label for="wallLink" class="wall-link center">
          		<?php echo pll__('Join an existing wall'); ?>
          	</label>
          	<div class="input center">
          		<input type="text" class="inputLink" minlength="10" maxlength="10" id="wallLink" placeholder="<?php echo pll__('Enter your phone number'); ?>" name="wallLink" />
          		<div class="close"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/dist/images/<?php echo $langDos; ?>/close.svg" alt="<?php echo pll__('close'); ?>" widht="10" height="10" /></a></div>
        		</div>
        	</form>
        </div>
			</div>
			<div class="wrapper">
				<!--<div class="flex-container-v">-->
					<div class="phone">
							<img src="<?php echo get_template_directory_uri(); ?>/dist/images/<?php echo $langDos; ?>/phone.svg" alt="Iphone" />
							<div class="message1 message">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/images/<?php echo $langDos; ?>/message1.svg" alt="message" />
							</div>
							<div class="message2 message">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/images/<?php echo $langDos; ?>/message2.svg" alt="message" />
							</div>
							<div class="message3 message">
								<img src="<?php echo get_template_directory_uri(); ?>/dist/images/<?php echo $langDos; ?>/message3.svg" alt="message" />
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
