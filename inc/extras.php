<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package inwall
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function inwall_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'inwall_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function inwall_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'inwall_pingback_header' );

//Modification du walker de base [one page]
class mono_walker extends Walker_Nav_Menu {

 function start_el(&$output, $item, $depth, $args){
  global $wp_query;
  $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
  $class_names = $value = '';
  $classes = empty( $item->classes ) ? array() : (array) $item->classes;

  $class_names = join( ' ', apply_filters( 'item_ancre', array_filter( $classes ), $item ) );
  $class_names = ' class="'. esc_attr( $class_names ) . '"';

  $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

  $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
  $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
  $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';


  $parsedURL = parse_url( esc_attr( $item->url ));
  $cleanURL = substr_replace($parsedURL['path'],'',-1);//remove last '/';

  $pathTab = explode('/',$cleanURL);
  $pathTab[sizeof($pathTab)-1] = '#'.$pathTab[sizeof($pathTab)-1];
  $path = implode('/',$pathTab );

  $attributes .= ! empty( $item->url )        ? ' href="'   . $path .'"' : '';
  $attributes .= ! empty( $item->url )        ? ' data-title="'   .   apply_filters( 'the_title', $item->title, $item->ID ) .'"' : '';
  $attributes .= ! empty( $item->url )        ? ' id="item-'  .   sanitize_title($item->title) .'"' : '';
  $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

  if($depth != 0) $description = "";

  $item_output = $args->before;
  $item_output .= '<a'. $attributes .'>';
  $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
  $item_output .= $description.$args->link_after;
  $item_output .= '</a>';
  $item_output .= $args->after;

  $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
 }

}
/*
add_filter( 'wp_nav_menu_items', 'add_contact_btn', 10, 2 );

function add_contact_btn( $items, $args )
{
    $items .= '<li class="contact-btn"><a href="' . get_field('lien_contact', 'option') . '">Contact</a></li>';
    return $items;
}
*/


/*
* Ajout d'un bouton dans wysiwyg
*/
add_filter( 'mce_buttons_2', 'fb_mce_editor_buttons' );
function fb_mce_editor_buttons( $buttons ) {

    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}

/*
* Add Ajout de styles et classes dans wysiwyg
*/
add_filter( 'tiny_mce_before_init', 'fb_mce_before_init' );

function fb_mce_before_init( $settings ) {

    $style_formats = array(
        array(
            'title' => 'Button [Green]',
            'selector' => 'a',
            'classes' => 'btn',
            'styles' => array(
              'display' => 'inline-block',
              'height' => '40px',
              'line-height' => '40px',
              'text-align' => 'center',
              'padding' => '0 20px',
              'color' => '#50e2c1',
              'border' => 'solid 1px #50e2c1',
              'border-radius' => '100px',
              'font-size' => '16px',
              'text-decoration' => 'none'
            )
        ),
        array(
            'title' => 'Button [Orange]',
            'selector' => 'a',
            'classes' => 'btn orange',
            'styles' => array(
              'display' => 'inline-block',
              'height' => '40px',
              'line-height' => '40px',
              'text-align' => 'center',
              'padding' => '0 20px',
              'color' => '#FF8383',
              'border' => 'solid 1px #FF8383',
              'border-radius' => '100px',
              'font-size' => '16px',
              'text-decoration' => 'none'
            )
        ),
        array(
            'title' => 'Button [fleche]',
            'selector' => 'a',
            'classes' => 'btn-arrow',
            'styles' => array(
              'display' => 'inline-block',
              'color' => '#50E2C1',
              'font-size' => '16px',
              'text-transform' => 'uppercase',
              'font-weight' => '400',
              'text-decoration' => 'none'
            )
        ),
        array(
            'title' => 'Texte intro (normal / 18px)',
            'selector' => 'p',
            'classes' => 'intro',
            'styles' => array(
              'font-size' => '18px',
              'font-weight' => '400',
            )
        ),
        array(
            'title' => 'Texte intro (light / 24px)',
            'selector' => 'p',
            'classes' => 'intro',
            'styles' => array(
              'font-size' => '24px',
              'font-weight' => '300',
            )
        )
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}

//Ajout des options du thème [ACF]
if( function_exists('acf_add_options_page') ) {

  acf_add_options_page(array(
    'page_title'  => 'Theme Options',
    'menu_title'  => 'Theme Options',
    'menu_slug'   => 'theme-options',
    'capability'  => 'edit_posts',
    'parent_slug' => '',
    'position'    => false,
    'icon_url'    => false,
  ));
}

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
