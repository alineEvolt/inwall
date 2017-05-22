<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package inwall
 */

?>
    <section class="wall-section">
      <div class="wrapper">
        <form action="https://inwall.evolt.io/getWall<?php echo htmlspecialchars($number); ?>" method="get" target="_blank">
          <div class="flex-container">
            <div class="w60 small-w100 medium-w50 tiny-w100">
              <label for="number" class="wall-link">
                <span><?php echo pll__('Vous souhaitez rejoindre un mur existant&nbsp;?'); ?></span>
              </label>
            </div>
            <div class="w40 small-w100 medium-w50 tiny-w100">
              <div class="input">
                <input type="text" class="inputLink" minlength="10" maxlength="14" id="number" placeholder="<?php echo pll__('Enter your phone number'); ?>" name="number" value="<?php echo htmlspecialchars($number); ?>" />
                <input type="submit" class="submit" value="" />
              </div>
            </div>
          </div>
        </form>
      </div>
  </section>
	</main><!-- end main -->

	<footer id="footer" class="section-grey">
    <div class="borb logo">
      <div class="wrapper">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo.svg" alt="inwall" />
    	</div>
    </div>
  	<div class="wrapper navfooter">
      <div class="grid-3-small-1 has-gutter-xl clearfix">

        <div class="one-third walker-footer">
          <?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'footer1','walker' => new mono_walker() ) ); ?>
        </div>
        <div class="one-quarter walker-footer">
          <?php wp_nav_menu( array( 'theme_location' => 'menu-3', 'menu_id' => 'footer2','walker' => new mono_walker() ) ); ?>
        </div>
        <div class="one-quarter push social-network">
          <h3><?php echo pll__('Réseaux sociaux'); ?></h3>
          <?php wp_nav_menu( array( 'theme_location' => 'menu-5', 'menu_id' => 'footer4' ) ); ?>
        </div>
      </div>
    </div>
  </footer>

</div><!-- end page -->
<div id="overlay"></div>

<?php wp_footer(); ?>

</body>
</html>
