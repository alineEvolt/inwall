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

	</main><!-- end main -->

	<footer id="footer" class="section-grey">
    <div class="borb logo">
      <div class="wrapper">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo.svg" alt="inwall" />
    	</div>
    </div>
  	<div class="wrapper navfooter">
      <div class="grid has-gutter-xl clearfix">

        <div class="one-quarter walker-footer">
          <?php wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'footer1','walker' => new mono_walker() ) ); ?>
        </div>
        <div class="one-quarter walker-footer">
          <?php wp_nav_menu( array( 'theme_location' => 'menu-3', 'menu_id' => 'footer2','walker' => new mono_walker() ) ); ?>
        </div>
        <div class="one-quarter">
         <?php wp_nav_menu( array( 'theme_location' => 'menu-4', 'menu_id' => 'footer3' ) ); ?>
      	</div>
        <div class="one-quarter push">
          <?php wp_nav_menu( array( 'theme_location' => 'menu-5', 'menu_id' => 'footer4' ) ); ?>
        </div>
      </div>
    </div>
    <div class="copyright">
      <div class="wrapper">
        <p>Made with <img src="<?php echo get_template_directory_uri(); ?>/dist/images/heart.svg"  alt =""/> for InWall by évolt - &copy; <?php echo date('Y'); ?> Inwall All right Reserved</p>
      </div>
    </div>
  </footer>

</div><!-- end page -->

<?php wp_footer(); ?>

</body>
</html>
